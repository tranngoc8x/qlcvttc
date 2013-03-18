<?php
class TasksController extends AppController {

	var $name = 'Tasks';
 
	function index($id=null) {
		$this->Task->recursive = -1;
		$user = $this->viewVars['ssid'];
		$cond1=array();
		$this->Usertask->recursive = 1;
		
		switch ($id) {
			case 'cong-viec-chua-xu-ly':
				$tuid = $this->Task->Usertask->find('list',array('fields'=>array('tasks_id'),'conditions'=>array('Usertask.users_id'=>$user['User']['id'],'Usertask.done'=>1),'group' => 'tasks_id'));
				$cond= array('or'=>array(array('Task.users_id'=>$user['User']['id'],'Task.status'=>1),'Task.id'=>$tuid));
				break;
			case 'cong-viec-da-chuyen':
				//$tuid = $this->Task->Usertask->find('list',array('joins'=> array(array('table' => 'tasks', 'alias' => 'Task',  'type' => 'right', 'conditions' => array( 'Usertask.tasks_id = Task.id'))),'fields'=>array('tasks_id'),'conditions'=>array('Usertask.users_chuyen'=>$user['User']['id'],'Usertask.done'=>2,'Task.status <>'=>1),'group' => 'tasks_id'));
				$tuid = $this->Task->Usertask->find('list',array('joins'=> array(array('table' => 'tasks', 'alias' => 'Task',  'type' => 'right', 'conditions' => array( 'Usertask.tasks_id = Task.id'))),'fields'=>array('tasks_id'),'conditions'=>array('or'=>array(array('Usertask.users_chuyen'=>$user['User']['id']),array('Task.status <>'=>1,'Task.users_id'=>$user['User']['id']))),'group' => 'tasks_id'));
				$cond= array('Task.id'=>$tuid);
				break;
			case 'cong-viec-bi-tra-lai':
				$cond= array( );
				break;
			case 'cong-viec-da-hoan-thanh':
				$cond= array( );
				break;
			default:
				$cond= array( );
				break;
		}
	  
		$this->paginate = array('conditions'=>$cond);
		$this->set('tasks', $this->paginate());
		
		
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid task', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('task', $this->Task->read(null, $id));
		$user = $this->viewVars['ssid'];
		$this->loadModel('Group');
		$this->Group->recursive = -1;
		$grs = $this->Group->find('first',array('fields'=>array('magroup'),'conditions'=>array('Group.id'=>$user['User']['groups_id'])));
		$gr= $grs['Group']['magroup'];
		$this->set(compact('gr'));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Task->create();
			$this->data['Task']['start'] = date('Y-m-d h:i:s',strtotime($this->data['Task']['start'])) ;
			$this->data['Task']['end'] = date('Y-m-d h:i:s',strtotime($this->data['Task']['end'])) ;
			$this->data['Task']['status']  = 1;
			$uid = $this->Auth->user();
			$this->data['Task']['users_id'] = $uid['User']['id'];
			
			if ($this->Task->save($this->data)) {
				$lastid = $this->Task->getLastInsertId();
				$dir = "files/documents/".date('m-Y');
		 		if(!is_dir($dir)) mkdir($dir,0777);
		 		$fre = date('dmyhis_');
		 		$err=0;
			 	foreach ($_FILES['files']['name'] as $key => $value) {
			 		$data = array();
			 	 	move_uploaded_file( $_FILES["files"]["tmp_name"][$key],$dir.'/'.$fre.$_FILES['files']['name'][$key]);
			 	 	$data['Tfile']['name'] = $fre.$value;
			 	 	$data['Tfile']['type'] = 1;
					$data['Tfile']['tasks_id'] = $lastid;
					$data['Tfile']['folder'] = date('m-Y');
			 	 	$this->Task->Tfile->create();
			 	 	$this->Task->Tfile->save($data);
			 	 	$data = array();
			 	 	if($files['error'][$key] !=0 || $files['error'][$key] !='0') $err ++;
			 	}
			 	$this->redirect(array('action' => 'index'));
				$this->Session->setFlash(__('The task has been saved', true),'default',array('class'=>'success'));
				 
			} else {
				$this->Session->setFlash(__('The task could not be saved. Please, try again.', true),'default',array('class'=>'error'));
			}
		}
		$types = $this->Task->Type->find('list');
		$linhvucs = $this->Task->Linhvuc->find('list');
		$this->set(compact(array('types','linhvucs')));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid task', true),'default',array('class'=>'notice'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			//debug($this->data);
			$this->data['Task']['start'] = date('Y-m-d h:i:s',strtotime($this->data['Task']['start'])) ;
			$this->data['Task']['end'] = date('Y-m-d h:i:s',strtotime($this->data['Task']['end'])) ;
			//$this->data['Task']['status']  = 1;
			//$uid = $this->Auth->user();
			//$this->data['Task']['users_id'] = $uid['User']['id'];
			 if ($this->Task->save($this->data)) {
			 	$this->Session->setFlash(__('The task has been saved', true),'default',array('class'=>'success'));
			 	$this->redirect(array('action' => 'index'));
			 } else {
			 	$this->Session->setFlash(__('The task could not be saved. Please, try again.', true),'default',array('class'=>'error'));
			 }
		}
		if (empty($this->data)) {
			$this->data = $this->Task->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for task', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Task->delete($id)) {
			$this->Session->setFlash(__('Task deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Task was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}


	function listns($id=null){
		$this->layout = 'ajax';
		$this->loadModel("User");
		$this->User->recursive = 0;
		$listussers = $this->User->find('all',array(
				'fields'=>array('User.id','User.name','Position.name'),
				'conditions'=>array('User.groups_id'=>$id)
			));
		if (!empty($this->params['requested'])) {
		      return $listussers;
		}else {
		  $this->set(compact('listussers'));
		}
	}

	function listPB($id=null){
		$this->layout = 'ajax';
		$this->loadModel("Group");
		$this->Group->recursive = 0;
		$groups = $this->Group->find('all',array('fields'=>array('Group.id','Group.name')));
		if (!empty($this->params['requested'])) {
		      return $groups;
		}else {
		  $this->set(compact('groups'));
		}
		//debug($groups);
	}
	function listPBgv($id=null){
		$this->layout = 'ajax';
		switch ($id) {
			case '1': $ar = array('Group.magroup '=>"NS"); break;
			case '2': $ar = array('Group.magroup '=>"BQL");break;
			case '3': $ar = array('Group.magroup '=>"PGD"); break;
			case '4': $ar = array('Group.magroup '=>"KT"); break;
			case '5': $ar = array('Group.magroup '=>"GD"); break;
			case '6': $ar = array('Group.magroup '=>"BQL"); break;
			default:  $ar = array();break;
		}
		$this->loadModel("Group");
		$this->Group->recursive = 0;
		$groups = $this->Group->find('all',array('fields'=>array('Group.id','Group.name'),'conditions'=>$ar));
		if (!empty($this->params['requested'])) {
		      return $groups;
		}else {
		  $this->set(compact('groups'));
		}
		//debug($groups);
	}
	function change($cvs,$st,$str){
		$this->autoRender = false;
		if(empty($cv) or !is_numeric($cv) or empty($str)) return 1;
		else{
			$user = $this->viewVars['ssid'];
			$this->loadModel("Usertask");
			$ar = explode(',', $str);
			$s = base64_decode($st);
			$cv = base64_decode($cvs);
			$this->Task->id = $cv;
			$this->Task->saveField('status',$s);
			foreach($ar as $r):
				if(!is_numeric($r)) return 1;
				$this->Usertask->create();
				$data['Usertask']['users_id'] = $r;
				$data['Usertask']['tasks_id'] = $cv;
				$data['Usertask']['status'] = $s;
				$data['Usertask']['users_chuyen'] = $user['User']['id'];
				$data['Usertask']['done'] = 1;
				$this->Usertask->save($data);
			endforeach;
			//debug($data);
			
			//cap nhat da lam xong
			$user = $this->viewVars['ssid'];
			$this->Usertask->recursive = -1;
			$ids = $this->Usertask->find('first',array('conditions'=>array('Usertask.users_id'=>$user['User']['id'],'Usertask.tasks_id'=>$cv)));
			//debug($ids);
			if(!empty($ids)){
				$this->Usertask->id = $ids['Usertask']['id'];
				$this->Usertask->saveField('done','2');
			}
			return 2;
		}
	}
	function getNV($id){
		$this->autoRender = false;
		if(empty($id) || $id== null) return "Không rõ";
		else{
			$this->loadModel("User");
			$this->User->recursive = -1;
			$u=$this->User->find('first',array(
										'fields'=>array('name'),
										'conditions'=>array('User.id'=>$id)
								));
			if (!empty($this->params['requested'])) return $u;
			else  $this->set(compact('u'));
		}
	}
	function download($id){
		$did = base64_decode($id);
		$this->loadModel('Tfile');
		$this->Tfile->recursive = -1;
		$fil = $this->Tfile->find('first',array('conditions'=>array('Tfile.id'=>$did)));
		if(isset($fil['Tfile']['name']) && $fil['Tfile']['name'] !=''){
			$fl = "files/documents/".$fil['Tfile']['folder']."/".$fil['Tfile']['name'];
			header('Content-Description: File Transfer');
	        header('Content-Disposition: attachment; filename='.basename($fl));
	        header('Content-Transfer-Encoding: binary');
	        header('Expires: 0');
	        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	        header('Pragma: public');
	        header('Content-Length: ' . filesize($fl));
	        ob_clean();
	        flush();
	        readfile($fl);
	    }else{
	    	echo "File không tồn tại !";
	    }
        exit;
	}
	function addfile($id,$type){

		$did = base64_decode($id);
		$tp = base64_decode($type);
		$this->autoRender = false;
	 	$files = $_FILES['fileid'];
	 	$this->loadModel('Tfile');
 		$dir = "files/documents/".date('m-Y');
 		if(!is_dir($dir)) mkdir($dir,0777);
 		$fre = date('dmyhis_');
 		$err=0;
	 	foreach ($files['name'] as $key => $value) {
	 		$data = array();
	 		move_uploaded_file( $_FILES["fileid"]["tmp_name"][$key],$dir.'/'.$fre.$_FILES['fileid']['name'][$key]);
	 		$data['Tfile']['name'] = $fre.$value;
	 		$data['Tfile']['type'] = $tp;
			$data['Tfile']['tasks_id'] = $did;
			$data['Tfile']['folder'] = date('m-Y');
	 		$this->Tfile->create();
	 		$this->Tfile->save($data);
	 		$data = array();
	 		if($files['error'][$key] !=0 || $files['error'][$key] !='0') $err ++;
	 	}
	 	if($err>0) return 1;
	 	else return 2;
	}
}
