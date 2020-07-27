<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Anggotum
 * 
 * @property int $id
 * @property int|null $id_profile
 * @property Carbon|null $tgl_bergabung
 * @property string|null $flag_keaktifan
 * @property string|null $keterangan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Profile $profile
 *
 * @package App\Models
 */
class Anggotum extends Model
{
	protected $table = 'anggota';

	protected $casts = [
		'id_profile' => 'int'
	];

	protected $dates = [
		'tgl_bergabung'
	];

	protected $fillable = [
		'id_profile',
		'tgl_bergabung',
		'flag_keaktifan',
		'keterangan'
	];

	public function profile()
	{
		return $this->belongsTo(Profile::class, 'id_profile');
	}
}
