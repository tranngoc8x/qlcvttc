<?php
class GroupsController extends AppController {

	var $name = 'Groups';

	function index() {
		$this->Group->recursive = 0;
		$this->set('groups', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid group', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('group', $this->Group->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Group->create();
			if ($this->Group->save($this->data)) {
				$this->Session->setFlash(__('The group has been saved', true),'default',array('class'=>'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.', true),'default',array('class'=>'error'));
			}
		}
	}

	function edit($id = null) {
		$this->Group->recursive = 0;
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Không có phòng ban này !','default',array('class'=>'notice'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Group->save($this->data)) {
				$this->Session->setFlash('Lưu thành công !','default',array('class'=>'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Thông tin chưa được lưu. Hãy thử lại !','default',array('class'=>'error'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Group->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for group', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Group->delete($id)) {
			$this->Session->setFlash(__('Group deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Group was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
