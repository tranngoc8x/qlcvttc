<?php
class PositionsController extends AppController {

	var $name = 'Positions';
	//var $use = array('PositionsGroup','Group');
	
	function index() {
		//$this->Position->recursive = 1;
		$this->set('pos', $this->paginate());
		//debug($this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Không có chức vụ này', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('position', $this->Position->read(null, $id));
		//debug($this->Position->read(null, $id));
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
			$this->redirect(array('action' => 'index'));
		}
		//$this->redirect(array('action' => 'index'));
	}

	function edit($id = null) {
		$this->loadModel('PositionsGroup');
		$pos_group=$this->PositionsGroup->find('all',array('conditions'=>array('positions_id'=>$id)));
		
	    /*
		$this->Group->unbindModel(
			array('hasMany'=>array('User'),'hasAndBelongsToMany'=>array('Position'))
		);*/
		$this->loadModel('Group');
		$groups = $this->Group->find('list');
		$this->set(compact('groups','pos_group'));	
		debug($pos_group);
		//debug($groups);
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Không có chức vụ này', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->Position->create();
			$this->Position->id=$id;
			if ($this->Position->save($this->data)) {
				$this->Session->setFlash(__('Đã sửa!', true));
				
			} else {
				$this->Session->setFlash(__('Chưa sửa được. Hãy thử lại.', true));
			}			
			
			$ar = array();
			if(!empty($pos_group)){
				foreach($pos_group as $k) $ar[] = $k['PositionsGroup']['id']; 
				
				foreach($ar as $item){
					  $this->PositionsGroup->delete($item);
				 }
			}				 	
			$arr = $this->data['Position']['groups_id'];			
			for($i=0;$i<count($arr);$i++){
				$this->Position->PositionsGroup->create();
				$data['PositionsGroup']['groups_id'] = $arr[$i];
				$data['PositionsGroup']['positions_id'] = $id;
				$this->Position->PositionsGroup->save($data);
				/*
				có 2 cách giải quyết:1-chuyển group và position thành 2 bảng k liên quan
				***2- xóa bảng positions_group trước khi thêm
				*/
			}
			$this->redirect(array('action' => 'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Position->read(null, $id);
		}
		//debug($this->data);
		
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
	
	function mutildelete($str = null){

        if($str){
            $arrid=explode(',',$str);
        }else{
    		$this->Session->setFlash(__('Đã xóa.', true));
    		$this->redirect(array('action' => 'index'));
        }
         foreach($arrid as $item){
    		  $this->User->delete($item);
         }
		$this->Session->setFlash(__('Đã xóa.', true));
		$this->redirect(array('action' => 'index'));
    }
}
