<?php
class PositionsController extends AppController {

	var $name = 'Positions';
	
	function index() {
		//$this->Position->recursive = 0;
		$this->set('pos', $this->paginate());
		//debug($this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid position', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('position', $this->Position->read(null, $id));
	}

	function add() {
		$groups = $this->Position->Group->find('list');
		$this->set(compact('groups'));	
		$data = array();
		if (!empty($this->data)) {		
			$this->Position->create();
			if ($this->Position->save($this->data)) {
				$this->Session->setFlash(__('Đã thêm chức vụ!', true));
				$id = $this->Position->getInsertID();
				//
			} else {
				$this->Session->setFlash(__('Chưa thêm được. Hãy thử lại.', true));
			}
			
			$arr = $this->data['Position']['groups_id'];
			
			for($i=0;$i<count($arr);$i++){
				$this->Position->PositionsGroup->create();
				$data['PositionsGroup']['groups_id'] = $arr[$i];
				$data['PositionsGroup']['positions_id'] = $id;
				$this->Position->PositionsGroup->save($data);
			}
		}
<<<<<<< .mine
		
		$this->redirect(array('action' => 'index'));
=======
		$groups = $this->Position->Group->find('list');
		$this->set(compact('groups'));
		 
>>>>>>> .r17
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Không có chức vụ này', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Position->save($this->data)) {
				$this->Session->setFlash(__('Đã sửa', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Chưa sửa được.Hãy thử lại.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Position->read(null, $id);
		}
		//debug($this->data);
		$groups = $this->Position->Group->find('list');
		$this->set(compact('groups'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Không có chức vụ này', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Position->delete($id)) {
			$this->Session->setFlash(__('Đã xóa', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Chưa xóa được', true));
		$this->redirect(array('action' => 'index'));
	}
}
