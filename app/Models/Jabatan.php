<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Jabatan
 * 
 * @property int $id
 * @property string|null $nama_jabatan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Jabatan extends Model
{
	protected $table = 'jabatan';

	protected $fillable = [
		'nama_jabatan'
	];
}
