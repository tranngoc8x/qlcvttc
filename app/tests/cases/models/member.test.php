<?php
/* Member Test cases generated on: 2013-03-28 10:35:56 : 1364463356*/
App::import('Model', 'Member');

class MemberTestCase extends CakeTestCase {
	var $fixtures = array('app.member', 'app.positions', 'app.groups');

	function startTest() {
		$this->Member =& ClassRegistry::init('Member');
	}

	function endTest() {
		unset($this->Member);
		ClassRegistry::flush();
	}

}
