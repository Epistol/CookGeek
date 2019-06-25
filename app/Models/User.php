<?php

namespace App;

use App\Jobs\CheckPicture;
use App\Notifications\MailResetPasswordNotification;
use App\Traits\HasLikes;
use App\Traits\HasMediaCDG;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 * @package App
 */
class User extends Authenticatable
{
    use  Notifiable, HasRoles, Bannable, SoftDeletes, HasLikes, HasMediaCDG;

    /**
     * @var array
     */
    public $additional_attributes = ['locale'];
    /**
     * @var string
     */
    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'identity', 'name', 'email', 'password', 'pseudo', 'img'
    ];
    /**
     * @var array
     */
    protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden
        = [
            'provider_name', 'provider_id', 'password', 'remember_token',
        ];


    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    /**
     * @param $value
     * @return string
     */
    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    /** Possède plusieurs notes
     */
    public function recipes()
    {
        return $this->hasMany(Recipe::class, 'id_user');
    }

    /**
     * @param $request
     * @param $first / Is it first picture ?
     * @return bool
     */
    public function insertPicture($request, $first = false)
    {
        $picture = isset($request->resume) ? $request->resume : null;
        if ($picture !== null) {
            if ($picture->getError() == 0) {
                $media = $this->addMedia($picture)
                    ->withCustomProperties(['first_picture' => $first, 'checked' => false])
                    ->withResponsiveImages()
                    ->toMediaCollection();
                // always attach media to user and recipe
                // todo : if first : order 0; else : increment
                $this->medias()->attach([$media->id]);
                $this->img = $media;
                $this->save();
                // then check if recipe is publishable, if not detach and delete
                CheckPicture::dispatch($media, $this);
            }
        }
    }

    /**
     * Send the password reset notification.
     *
     * @param string $token
     *
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
//        dd($token);
        $this->notify(new MailResetPasswordNotification($token));
    }
}
