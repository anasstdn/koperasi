<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Profile
 * 
 * @property int $id
 * @property string|null $nama_depan
 * @property string|null $nama_belakang
 * @property string|null $nik
 * @property int|null $id_jenis_kelamin
 * @property int|null $id_agama
 * @property int|null $id_kelurahan_domisili
 * @property int|null $id_kelurahan_ktp
 * @property string|null $alamat_domisili
 * @property string|null $alamat_ktp
 * @property string|null $tempat_lahir
 * @property Carbon|null $tgl_lahir
 * @property string|null $foto
 * @property int|null $id_status_perkawinan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $no_telp
 * 
 * @property Agama $agama
 * @property JenisKelamin $jenis_kelamin
 * @property Kelurahan $kelurahan
 * @property StatusPerkawinan $status_perkawinan
 * @property Collection|Pegawai[] $pegawais
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Profile extends Model
{
	protected $table = 'profile';

	protected $casts = [
		'id_jenis_kelamin' => 'int',
		'id_agama' => 'int',
		'id_kelurahan_domisili' => 'int',
		'id_kelurahan_ktp' => 'int',
		'id_status_perkawinan' => 'int'
	];

	protected $dates = [
		'tgl_lahir'
	];

	protected $fillable = [
		'nama_depan',
		'nama_belakang',
		'nik',
		'id_jenis_kelamin',
		'id_agama',
		'id_kelurahan_domisili',
		'id_kelurahan_ktp',
		'alamat_domisili',
		'alamat_ktp',
		'tempat_lahir',
		'tgl_lahir',
		'foto',
		'id_status_perkawinan',
		'no_telp'
	];

	public function agama()
	{
		return $this->belongsTo(Agama::class, 'id_agama');
	}

	public function jenis_kelamin()
	{
		return $this->belongsTo(JenisKelamin::class, 'id_jenis_kelamin');
	}

	public function kelurahan()
	{
		return $this->belongsTo(Kelurahan::class, 'id_kelurahan_ktp');
	}

	public function status_perkawinan()
	{
		return $this->belongsTo(StatusPerkawinan::class, 'id_status_perkawinan');
	}

	public function pegawais()
	{
		return $this->hasMany(Pegawai::class, 'id_profile');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'id_profile');
	}
}
