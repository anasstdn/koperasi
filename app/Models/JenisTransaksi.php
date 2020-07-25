<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JenisTransaksi
 * 
 * @property int $id
 * @property int|null $id_kategori_transaksi
 * @property string|null $jenis_transaksi
 * @property string|null $flag_pemasukan
 * @property string|null $flag_pengeluaran
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property KategoriTransaksi $kategori_transaksi
 *
 * @package App\Models
 */
class JenisTransaksi extends Model
{
	protected $table = 'jenis_transaksi';

	protected $casts = [
		'id_kategori_transaksi' => 'int'
	];

	protected $fillable = [
		'id_kategori_transaksi',
		'jenis_transaksi',
		'flag_pemasukan',
		'flag_pengeluaran'
	];

	public function kategori_transaksi()
	{
		return $this->belongsTo(KategoriTransaksi::class, 'id_kategori_transaksi');
	}
}
