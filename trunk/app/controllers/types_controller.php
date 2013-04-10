<?php
class TypesController extends AppController {

	var $name = 'Types';
	// function beforeFilter(){
	// 	parent::beforeFilter();
	// }
	function index() {
		$this->Type->recursive = 0;
		$this->set('types', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Không tồn tại kiểu công việc này', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('type', $this->Type->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Type->create();
			if ($this->Type->save($this->data)) {
				$this->Session->setFlash(__('Đã lưu', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Chưa lưu được. Hãy thử lại!', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Không có kiểu công việc này', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Type->save($this->data)) {
				$this->Session->setFlash(__('Đã sửa được.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Chưa sửa được. Hãy thử lại!', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Type->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Không có kiểu công việc này.', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Type->delete($id)) {
			$this->Session->setFlash(__('Đã xóa', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Chưa xóa được', true));
		$this->redirect(array('action' => 'index'));
	}
}
