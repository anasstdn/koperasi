<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Kecamatan
 * 
 * @property int $id
 * @property int|null $id_kabupaten
 * @property string|null $kode_kecamatan
 * @property string|null $nama_kecamatan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Kabupaten $kabupaten
 * @property Collection|Kelurahan[] $kelurahans
 *
 * @package App\Models
 */
class Kecamatan extends Model
{
	protected $table = 'kecamatan';

	protected $casts = [
		'id_kabupaten' => 'int'
	];

	protected $fillable = [
		'id_kabupaten',
		'kode_kecamatan',
		'nama_kecamatan'
	];

	public function kabupaten()
	{
		return $this->belongsTo(Kabupaten::class, 'id_kabupaten');
	}

	public function kelurahans()
	{
		return $this->hasMany(Kelurahan::class, 'id_kecamatan');
	}
}
