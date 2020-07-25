<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Kelurahan
 * 
 * @property int $id
 * @property int|null $id_kecamatan
 * @property string|null $kode_kelurahan
 * @property string|null $nama_kelurahan
 * @property string|null $kodepos
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Kecamatan $kecamatan
 *
 * @package App\Models
 */
class Kelurahan extends Model
{
	protected $table = 'kelurahan';

	protected $casts = [
		'id_kecamatan' => 'int'
	];

	protected $fillable = [
		'id_kecamatan',
		'kode_kelurahan',
		'nama_kelurahan',
		'kodepos'
	];

	public function kecamatan()
	{
		return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
	}
}
