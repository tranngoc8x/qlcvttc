<?php
class TasksController extends AppController {

	var $name = 'Tasks';
	var $components = array('Uploader.Uploader');

	function beforeFilter(){
		parent:: beforeFilter();
        $this->Uploader->uploadDir = 'files/documents/'; //thu muc chua file upload
        $this->Uploader->enableUpload = true;
        $this->Uploader->maxFileSize = '10M'; // quy dinh dung luong duoc upload len toi da la 2 Megabytes
        $this->Uploader->maxNameLength = 25;//do dai cua ten file
        $this->Uploader->tempDir = TMP;
    }

	function index() {
		$this->Task->recursive = 0;
		$this->set('tasks', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid task', true));
			$this->redirect(array('action' => 'index'));
		}
		//$this->set('nv',$this->Task->Usertask->find('all',array('Usertask.tasks_id'=>$id)));
		$this->set('task', $this->Task->read(null, $id));
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
				$this->Session->setFlash(__('The task has been saved', true),'default',array('class'=>'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The task could not be saved. Please, try again.', true),'default',array('class'=>'error'));
			}
		}
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
			case '1': $ar = array('Group.magroup <>'=>"GD"); break;
			case '2': $ar = array("NOT"=>array('Group.magroup'=>array("GD","PGD")));break;
			case '3': $ar = array('Group.magroup '=>"PGD"); break;
			case '4': $ar = array('Group.magroup '=>"KT"); break;
			case '5': $ar = array('Group.magroup '=>"GD"); break;
			case '6': $ar = array('Group.magroup '=>"BQL"); break;
			case '7': $ar = array('Group.magroup '=>"NS"); break;
			default:
				$ar= array();
				break;
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
	function change($cv,$st,$str){
		$this->autoRender = false;
		if(empty($cv) or !is_numeric($cv) or empty($str)) return 1;
		else{
			$this->loadModel("Usertask");
			$ar = explode(',', $str);
			$s = base64_decode($st);
			foreach($ar as $r):
				if(!is_numeric($r)) return 1;
				$this->Usertask->create();
				$data['Usertask']['users_id'] = $r;
				$data['Usertask']['tasks_id'] = $cv;
				$data['Usertask']['status'] = $s;
				$this->Usertask->save($data);
			endforeach;
			//debug($data);
			$this->Task->id = $cv;
			$this->Task->saveField('status',$s);
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
