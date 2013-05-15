<?php
/* Score Test cases generated on: 2013-05-07 16:34:12 : 1367919252*/
App::import('Model', 'Score');

class ScoreTestCase extends CakeTestCase {
	var $fixtures = array('app.score', 'app.users', 'app.tasks');

	function startTest() {
		$this->Score =& ClassRegistry::init('Score');
	}

	function endTest() {
		unset($this->Score);
		ClassRegistry::flush();
	}

}
