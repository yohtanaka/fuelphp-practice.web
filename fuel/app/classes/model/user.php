<?php

use Orm\Model;

class Model_User extends Model
{
	/**
	 * @var string  $_name
	 */
	public static $_name = 'user';

	/**
	 * @var array  $_properties
	 */
	protected static $_properties = [
		'id',
		'name',
		'email',
		'created_at',
		'updated_at',
	];

	/**
	 * @var array  $_observers
	 */
	protected static $_observers = [
		'Orm\Observer_CreatedAt' => [
			'events' => ['before_insert'],
			'mysql_timestamp' => false,
		],
		'Orm\Observer_UpdatedAt' => [
			'events' => ['before_save'],
			'mysql_timestamp' => false,
		],
	];

	/**
	 * @param  string  $factory
	 * @return Fuel\Core\Validation
	 */
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');

		return $val;
	}
}
