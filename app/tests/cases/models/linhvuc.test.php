<?php
/* Linhvuc Test cases generated on: 2013-03-11 03:18:53 : 1362968333*/
App::import('Model', 'Linhvuc');

class LinhvucTestCase extends CakeTestCase {
	var $fixtures = array('app.linhvuc', 'app.task', 'app.user', 'app.group', 'app.position', 'app.positions_group');

	function startTest() {
		$this->Linhvuc =& ClassRegistry::init('Linhvuc');
	}

	function endTest() {
		unset($this->Linhvuc);
		ClassRegistry::flush();
	}

}
