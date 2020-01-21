<?php

namespace Fuel\Migrations;

class Create_licenses
{
	public function up()
	{
		\DBUtil::create_table('licenses', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'name' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'description' => array('null' => false, 'type' => 'text'),
			'user_id' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('licenses');
	}
}