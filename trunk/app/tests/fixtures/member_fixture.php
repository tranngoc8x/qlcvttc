<?php
/* Member Fixture generated on: 2013-03-28 10:35:56 : 1364463356 */
class MemberFixture extends CakeTestFixture {
	var $name = 'Member';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'username' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'password' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'positions_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'groups_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'gioitinh' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 4),
		'datestart' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'dateend' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'birth' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'address' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'email' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'nghiviec' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'username' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'positions_id' => 1,
			'groups_id' => 1,
			'gioitinh' => 1,
			'datestart' => '2013-03-28',
			'dateend' => '2013-03-28',
			'birth' => '2013-03-28',
			'address' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'email' => 'Lorem ipsum dolor sit amet',
			'nghiviec' => 1
		),
	);
}
