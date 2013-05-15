<?php
/* Scores Test cases generated on: 2013-05-07 16:37:04 : 1367919424*/
App::import('Controller', 'Scores');

class TestScoresController extends ScoresController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ScoresControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.score', 'app.users', 'app.tasks');

	function startTest() {
		$this->Scores =& new TestScoresController();
		$this->Scores->constructClasses();
	}

	function endTest() {
		unset($this->Scores);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
