<?php

namespace App;

use App\Notifications\MailResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;


class User extends \TCG\Voyager\Models\User implements BannableContract
{
	use Notifiable;
	use Bannable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'identity', 'name', 'email', 'password', 'pseudo'
	];
	protected $guard_name = 'web';


	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function getFirstNameAttribute($value)
	{
		return ucfirst($value);
	}

	static function nameReturn($user_id){
		$user = DB::table('users')->where('id', '=', strip_tags(clean($user_id)))->select('name')->get();
		return $user;
	}




	/**
	 * Send the password reset notification.
	 *
	 * @param  string $token
	 * @return void
	 */
	public function sendPasswordResetNotification($token)
	{
//        dd($token);
		$this->notify(new MailResetPasswordNotification($token));
	}

}
