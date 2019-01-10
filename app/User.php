<?php

namespace App;

use App\Notifications\MailResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;


class User extends \TCG\Voyager\Models\User
{
	use Notifiable;
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
	 * @param $id
	 * @param $admin
	 * @param $days
	 * @param  $definitive
	 * @param $reason
	 * @return mixed
	 */
	static function ban($id, $admin, $days, $definitive, $reason)
	{
		$ban = DB::table('bans')->insertGetId(
			['user_id' => $id, 'admin_id' => $admin, "days" => $days, "reason" => $reason, "definitive" => $definitive, "created_at" => now(), "updated_at" => now()]
		);
		return $ban;
	}

	static function unban($id, $admin, $reason)
	{
		$ban = DB::table('bans')->insertGetId(
			['user_id' => $id, 'admin_id' => $admin, "days" => 0, "reason" => $reason, "created_at" => now(), "updated_at" => now()]
		);
		return $ban;
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
