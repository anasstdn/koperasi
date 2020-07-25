<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Golongan
 * 
 * @property int $id
 * @property string|null $golongan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Golongan extends Model
{
	protected $table = 'golongan';

	protected $fillable = [
		'golongan'
	];
}
