<?php

namespace App;

use App\Notifications\MailResetPasswordNotification;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class User extends \TCG\Voyager\Models\User implements BannableContract
{
    use Notifiable, Bannable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'identity', 'name', 'email', 'password', 'pseudo',
    ];
    protected $guard_name = 'web';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'provider_name', 'provider_id', 'password', 'remember_token',
    ];

    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

    public function likes()
    {
        return $this->morphMany('App\Like', 'likeable');
    }

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

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    public static function nameReturn($user_id)
    {
        $user = DB::table('users')->where('id', '=', strip_tags(clean($user_id)))->select('name')->get();

        return $user;
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
