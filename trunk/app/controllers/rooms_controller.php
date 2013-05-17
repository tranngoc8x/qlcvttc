<?php
class RoomsController extends AppController {

	var $name = 'Rooms';
	var $paginate = array(
		'Customer'=> array('limit' => 10)
	);

	function index() {		
		$this->loadModel('Customer');		
		$cus = $this->paginate('Customer');
		$this->set(compact('cus'));
		
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid room', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('room', $this->Room->read(null, $id));
	}

	function add() {		
		if (!empty($this->data)) {
			$this->Room->create();
			if ($this->Room->save($this->data)) {
				$this->Session->setFlash(__('Đã lưu', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Chưa lưu được. Hãy thử lại', true));
			}
		}
		$customers = $this->Room->Customer->find('list');
		$this->set(compact('customers'));
		
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid room', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Room->save($this->data)) {
				$this->Session->setFlash(__('The room has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The room could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Room->read(null, $id);
		}
		$customers = $this->Room->Customer->find('list');
		$this->set(compact('customers'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for room', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Room->delete($id)) {
			$this->Session->setFlash(__('Room deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Room was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
