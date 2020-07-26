<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $email
 * @property bool|null $status_aktif
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $id_profile
 * 
 * @property Profile $profile
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';

	protected $casts = [
		'status_aktif' => 'bool',
		'id_profile' => 'int'
	];

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'username',
		'email',
		'status_aktif',
		'email_verified_at',
		'password',
		'remember_token',
		'id_profile'
	];

	public function profile()
	{
		return $this->belongsTo(Profile::class, 'id_profile');
	}

	public function roleUser(){
        return $this->hasOne('App\Models\RoleUser','user_id');
    }
}
