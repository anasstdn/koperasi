<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Kabupaten
 * 
 * @property int $id
 * @property int|null $id_provinsi
 * @property string|null $kode_kabupaten
 * @property string|null $nama_kabupaten
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Provinsi $provinsi
 *
 * @package App\Models
 */
class Kabupaten extends Model
{
	protected $table = 'kabupaten';

	protected $casts = [
		'id_provinsi' => 'int'
	];

	protected $fillable = [
		'id_provinsi',
		'kode_kabupaten',
		'nama_kabupaten'
	];

	public function provinsi()
	{
		return $this->belongsTo(Provinsi::class, 'id_provinsi');
	}
}
