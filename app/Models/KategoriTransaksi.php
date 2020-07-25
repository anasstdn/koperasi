<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KategoriTransaksi
 * 
 * @property int $id
 * @property string|null $nama_kategori
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|JenisTransaksi[] $jenis_transaksis
 *
 * @package App\Models
 */
class KategoriTransaksi extends Model
{
	protected $table = 'kategori_transaksi';

	protected $fillable = [
		'nama_kategori'
	];

	public function jenis_transaksis()
	{
		return $this->hasMany(JenisTransaksi::class, 'id_kategori_transaksi');
	}
}
