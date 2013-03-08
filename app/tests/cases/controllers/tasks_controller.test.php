<?php
/* Tasks Test cases generated on: 2013-03-07 03:30:10 : 1362623410*/
App::import('Controller', 'Tasks');

class TestTasksController extends TasksController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class TasksControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.task', 'app.user', 'app.positions', 'app.group');

	function startTest() {
		$this->Tasks =& new TestTasksController();
		$this->Tasks->constructClasses();
	}

	function endTest() {
		unset($this->Tasks);
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
