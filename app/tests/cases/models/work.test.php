<?php
/* Work Test cases generated on: 2013-03-28 06:41:38 : 1364449298*/
App::import('Model', 'Work');

class WorkTestCase extends CakeTestCase {
	var $fixtures = array('app.work');

	function startTest() {
		$this->Work =& ClassRegistry::init('Work');
	}

	function endTest() {
		unset($this->Work);
		ClassRegistry::flush();
	}

}
