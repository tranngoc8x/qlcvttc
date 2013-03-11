<?php
/* Tfile Test cases generated on: 2013-03-11 09:46:41 : 1362991601*/
App::import('Model', 'Tfile');

class TfileTestCase extends CakeTestCase {
	var $fixtures = array('app.tfile', 'app.tasks');

	function startTest() {
		$this->Tfile =& ClassRegistry::init('Tfile');
	}

	function endTest() {
		unset($this->Tfile);
		ClassRegistry::flush();
	}

}
