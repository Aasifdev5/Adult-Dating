<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class City extends Model
{

	protected $table = 'cities';


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'id',
		'country_code',
		'name',
		'latitude',
		'longitude',
		'subadmin1_code',
		'subadmin2_code',
		'population',
		'time_zone',
		'active',
	];



}
