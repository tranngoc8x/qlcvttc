<?php
/* Failtask Test cases generated on: 2013-03-20 09:09:24 : 1363766964*/
App::import('Model', 'Failtask');

class FailtaskTestCase extends CakeTestCase {
	var $fixtures = array('app.failtask', 'app.tasks', 'app.users');

	function startTest() {
		$this->Failtask =& ClassRegistry::init('Failtask');
	}

	function endTest() {
		unset($this->Failtask);
		ClassRegistry::flush();
	}

}
