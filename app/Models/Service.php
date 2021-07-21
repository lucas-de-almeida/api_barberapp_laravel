<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 * 
 * @property int $id
 * @property string|null $name
 * @property float|null $const
 * @property int $employee_id
 * 
 * @property Employee $employee
 * @property Collection|Schedule[] $schedules
 *
 * @package App\Models
 */
class Service extends Model
{
	protected $table = 'services';
	public $timestamps = false;

	protected $casts = [
		'const' => 'float',
		'employee_id' => 'int'
	];

	protected $fillable = [
		'name',
		'const',
		'employee_id'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class);
	}

	public function schedules()
	{
		return $this->hasMany(Schedule::class);
	}
}
