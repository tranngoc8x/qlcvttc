<?php
/* Usertask Test cases generated on: 2013-03-08 11:42:38 : 1362739358*/
App::import('Model', 'Usertask');

class UsertaskTestCase extends CakeTestCase {
	var $fixtures = array('app.usertask', 'app.users', 'app.tasks');

	function startTest() {
		$this->Usertask =& ClassRegistry::init('Usertask');
	}

	function endTest() {
		unset($this->Usertask);
		ClassRegistry::flush();
	}

}
