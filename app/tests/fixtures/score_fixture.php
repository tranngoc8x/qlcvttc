<?php
/* Score Fixture generated on: 2013-05-07 16:34:12 : 1367919252 */
class ScoreFixture extends CakeTestFixture {
	var $name = 'Score';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'users_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'tasks_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'scores' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'percent' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'users_id' => 1,
			'tasks_id' => 1,
			'scores' => 'Lorem ipsum dolor sit amet',
			'percent' => 1
		),
	);
}
