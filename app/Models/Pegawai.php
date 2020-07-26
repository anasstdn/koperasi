<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pegawai
 * 
 * @property int $id
 * @property int|null $id_profile
 * @property int|null $id_jabatan
 * @property int|null $id_golongan
 * @property int|null $id_departement
 * @property string|null $nip
 * @property Carbon|null $tgl_bergabung
 * @property Carbon|null $tgl_resign
 * @property string|null $flag_resign
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Departement $departement
 * @property Golongan $golongan
 * @property Jabatan $jabatan
 * @property Profile $profile
 *
 * @package App\Models
 */
class Pegawai extends Model
{
	protected $table = 'pegawai';

	protected $casts = [
		'id_profile' => 'int',
		'id_jabatan' => 'int',
		'id_golongan' => 'int',
		'id_departement' => 'int'
	];

	protected $dates = [
		'tgl_bergabung',
		'tgl_resign'
	];

	protected $fillable = [
		'id_profile',
		'id_jabatan',
		'id_golongan',
		'id_departement',
		'nip',
		'tgl_bergabung',
		'tgl_resign',
		'flag_resign'
	];

	public function departement()
	{
		return $this->belongsTo(Departement::class, 'id_departement');
	}

	public function golongan()
	{
		return $this->belongsTo(Golongan::class, 'id_golongan');
	}

	public function jabatan()
	{
		return $this->belongsTo(Jabatan::class, 'id_jabatan');
	}

	public function profile()
	{
		return $this->belongsTo(Profile::class, 'id_profile');
	}
}
