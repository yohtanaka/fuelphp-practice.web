<?php

use Orm\Model;

class Model_License extends Model
{
	/**
	 * @var string  $_name
	 */
	public static $_name = 'license';

	/**
	 * @var string  $_properties
	 */
	protected static $_properties = [
		'id',
		'name',
		'description',
		'user_id',
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
	 * @var array  $_belongs_to
	 */
	protected static $_belongs_to = [
		'user',
	];

	/**
	 * @param  string  $factory
	 * @return Fuel\Core\Validation
	 */
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('description', 'Description', 'required');
		$val->add_field('user_id', 'User Id', 'required|valid_string[numeric]');

		return $val;
	}
}
