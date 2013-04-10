<?php
class CustomersController extends AppController {

	var $name = 'Customers';

	function index() {
		$this->Customer->recursive = 0;
		$this->set('customers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid customer', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('customer', $this->Customer->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Customer->create();
			if ($this->Customer->save($this->data)) {
				$this->Session->setFlash(__('Đã lưu', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Chưa lưu được. Hãy thử lại.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Không có khách hàng này', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Customer->save($this->data)) {
				$this->Session->setFlash(__('Đã sửa', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Chưa sửa được. Hãy thử lại', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Customer->read(null, $id);
			//debug($this->data);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for customer', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Customer->delete($id)) {
			$this->Session->setFlash(__('Customer deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Customer was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
