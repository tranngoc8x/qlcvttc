<?php
/* Usertask Fixture generated on: 2013-03-08 11:42:38 : 1362739358 */
class UsertaskFixture extends CakeTestFixture {
	var $name = 'Usertask';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'users_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'tasks_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'status' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 2),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'users_id' => 1,
			'tasks_id' => 1,
			'status' => 1
		),
	);
}
