<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Provinsi
 * 
 * @property int $id
 * @property string|null $kode_provinsi
 * @property string|null $nama_provinsi
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Kabupaten[] $kabupatens
 *
 * @package App\Models
 */
class Provinsi extends Model
{
	protected $table = 'provinsi';

	protected $fillable = [
		'kode_provinsi',
		'nama_provinsi'
	];

	public function kabupatens()
	{
		return $this->hasMany(Kabupaten::class, 'id_provinsi');
	}
}
