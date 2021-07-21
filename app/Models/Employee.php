<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 * 
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property int $user_id
 * @property int $companie_id
 * 
 * @property Company $company
 * @property User $user
 * @property Collection|Schedule[] $schedules
 * @property Collection|Service[] $services
 *
 * @package App\Models
 */
class Employee extends Model
{
	protected $table = 'employees';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'user_id' => 'int',
		'companie_id' => 'int'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'user_id',
		'companie_id'
	];

	public function company()
	{
		return $this->belongsTo(Company::class, 'companie_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function schedules()
	{
		return $this->hasMany(Schedule::class);
	}

	public function services()
	{
		return $this->hasMany(Service::class);
	}
}
