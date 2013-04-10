<?php
class LinhvucsController extends AppController {

	var $name = 'Linhvucs';
	// function beforeFilter(){
	// 	parent::beforeFilter();
	// }
	function index() {
		$this->Linhvuc->recursive = 0;
		$this->set('linhvucs', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid linhvuc', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('linhvuc', $this->Linhvuc->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Linhvuc->create();
			if ($this->Linhvuc->save($this->data)) {
				$this->Session->setFlash(__('The linhvuc has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The linhvuc could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid linhvuc', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Linhvuc->save($this->data)) {
				$this->Session->setFlash(__('The linhvuc has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The linhvuc could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Linhvuc->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for linhvuc', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Linhvuc->delete($id)) {
			$this->Session->setFlash(__('Linhvuc deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Linhvuc was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
