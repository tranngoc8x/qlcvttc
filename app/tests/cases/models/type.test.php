<?php
/* Type Test cases generated on: 2013-03-11 03:19:25 : 1362968365*/
App::import('Model', 'Type');

class TypeTestCase extends CakeTestCase {
	var $fixtures = array('app.type', 'app.task', 'app.user', 'app.group', 'app.position', 'app.positions_group');

	function startTest() {
		$this->Type =& ClassRegistry::init('Type');
	}

	function endTest() {
		unset($this->Type);
		ClassRegistry::flush();
	}

}
