<?php
/* Works Test cases generated on: 2013-03-28 06:41:49 : 1364449309*/
App::import('Controller', 'Works');

class TestWorksController extends WorksController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class WorksControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.work', 'app.user', 'app.group', 'app.position', 'app.positions_group', 'app.task', 'app.type', 'app.linhvuc', 'app.usertask', 'app.tasks', 'app.users', 'app.tfile');

	function startTest() {
		$this->Works =& new TestWorksController();
		$this->Works->constructClasses();
	}

	function endTest() {
		unset($this->Works);
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
