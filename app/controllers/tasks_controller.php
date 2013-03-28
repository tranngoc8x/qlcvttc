<?php
class TasksController extends AppController {

	var $name = 'Tasks';
	function index(){
		$this->_pref();
		$this->set('tasks', $this->paginate());
	}
	function _pref(){
		$user = $this->viewVars['ssid'];
		$this->loadModel('Group');
		$this->Group->recursive = -1;
		$grs = $this->Group->find('first',array('fields'=>array('magroup'),'conditions'=>array('Group.id'=>$user['User']['groups_id'])));
		$gr= $grs['Group']['magroup'];
		$this->set(compact('gr'));
	}
	function doing() {
		$this->_pref();//ban trang bát ghi chú
		$user = $this->viewVars['ssid'];
		$this->Task->recursive = -1;
		$this->Usertask->recursive = 1;
		$cond = array('Task.done'=>1,'or'=>array(array('Usertask.done'=>1,'Usertask.users_id'=>$user['User']['id'],'Usertask.status <>'=>0),array('Task.users_id'=>$user['User']['id'],'Task.status '=>1)));
		$this->paginate = array('fields'=>array('Task.*,Usertask.done'),'joins'=> array(array('table' => 'usertasks', 'alias' => 'Usertask',  'type' => 'Left', 'conditions' => array( 'Usertask.tasks_id = Task.id'))),'conditions'=>$cond,'group'=>array('Task.id'));
		$this->set('tasks', $this->paginate());
		$this->render('/tasks/index');
	}
	function done() {
		$this->_pref();
		$user = $this->viewVars['ssid'];
		$this->Task->recursive = -1;
		$this->Usertask->recursive = 1;
		//$cond = array('Task.done'=>1,'Usertask.done'=>2,'or'=>array('Usertask.users_chuyen'=>$user['User']['id'],array('Task.status <>'=>1,'Task.users_id'=>$user['User']['id'])));
		//$cond = array('Task.done'=>1,'or'=>array('Usertask.users_chuyen'=>$user['User']['id'],array('Usertask.done '=>2,'Usertask.users_id'=>$user['User']['id'])));
		$cond = array('Task.done'=>1,'or'=>array(array('Task.users_id'=>$user['User']['id'],'Task.status >'=>1,'Usertask.users_id <>'=>$user['User']['id'],'Usertask.done'=>1,'Usertask.status >'=>0),array('Usertask.done '=>2,'Usertask.users_id'=>$user['User']['id'])));
		$this->paginate = array('fields'=>array('Task.*,Usertask.done'),'joins'=> array(array('table' => 'usertasks', 'alias' => 'Usertask',  'type' => 'Left', 'conditions' => array( 'Usertask.tasks_id = Task.id'))),'conditions'=>$cond,'group'=>array('Task.id'));
		$this->set('tasks', $this->paginate());
		$this->render('/tasks/index');
	}
	function finish() {
		$this->_pref();
		$user = $this->viewVars['ssid'];
		$this->Task->recursive = -1;
		$this->Usertask->recursive = 1;
		$cond = array('Task.done'=>2 ,'or'=>array('Usertask.users_chuyen'=>$user['User']['id'],'Task.users_id'=>$user['User']['id'],'Usertask.users_id'=>$user['User']['id']));
		$this->paginate = array('fields'=>array('Task.*,Usertask.done'),'joins'=> array(array('table' => 'usertasks', 'alias' => 'Usertask',  'type' => 'Left', 'conditions' => array( 'Usertask.tasks_id = Task.id'))),'conditions'=>$cond,'group'=>array('Task.id'));
		$this->set('tasks', $this->paginate());
		$this->render('/tasks/index');
	}
	function fail(){
		$this->_pref();
		$user = $this->viewVars['ssid'];
		$this->Task->recursive = -1;
		$this->Usertask->recursive = 1;
		$cond = array('Usertask.done'=>0,'or'=>array(array('Usertask.users_chuyen'=>$user['User']['id']),array('Task.status <>'=>1,'Task.users_id'=>$user['User']['id'],'Task.done'=>1)));
		$this->paginate = array('fields'=>array('Task.*,Usertask.done'),'joins'=> array(array('table' => 'usertasks', 'alias' => 'Usertask',  'type' => 'Left', 'conditions' => array( 'Usertask.tasks_id = Task.id'))),'conditions'=>$cond,'group'=>array('Task.id'));
		$this->set('tasks', $this->paginate());
		$this->render('/tasks/index');
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
		 		if(!empty($_FILES['files']['name'])){
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
		$check = $this->Task->find('first',array('conditions'=>array('Task.id'=>$id),'recursive'=>-1));
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid task', true),'default',array('class'=>'notice'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->Task->id = $id;
			if(!empty($this->data['Task']['start'])){
				$dstart = explode('/',$this->data['Task']['start']);
				$ds = $dstart[1].'/'.$dstart[0].'/'.$dstart[2];
				$this->data['Task']['start'] = date('Y-m-d h:i:s',strtotime($ds));
			}
			if(!empty($this->data['Task']['end'])){
				$dend = explode('/',$this->data['Task']['end']);
				$de = $dend[1].'/'.$dend[0].'/'.$dend[2];
				$this->data['Task']['end'] = date('Y-m-d h:i:s',strtotime($de));
			}
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
		$types = $this->Task->Type->find('list');
		$linhvucs = $this->Task->Linhvuc->find('list');
		$this->set(compact(array('types','linhvucs')));
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
				'conditions'=>array('User.groups_id'=>$id,'User.nghiviec'=>0)
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
	function fntask($id,$u){
		$this->autoRender = false;
		$user = $this->viewVars['ssid']['User']['id'];
		if($u != $user) return "Bạn không có quyền thực hiện thao tác này";
		else{
			$this->Task->id = $id;
			$this->Task->saveField('done',2);
			$ids = $this->Task->Usertask->find('first',array('conditions'=>array('Usertask.users_id'=>$u,'Usertask.tasks_id'=>$id,'Usertask.status '=>11)));
			$this->Task->Usertask->id = $ids['Usertask']['id'];
			$this->Task->Usertask->saveField('done',2);
		}
	}
	function getfnNV($id){
		$ids = $this->Task->Usertask->find('first',array('conditions'=>array('Usertask.tasks_id'=>$id,'Usertask.status '=>11),'orer id'=>'desc'));
		if (!empty($this->params['requested'])) {
		      return $ids;
		}else {
		  $this->set(compact('ids'));
		}
	}
	function change($cvs,$st,$str,$nd){
		$this->autoRender = false;
		if(empty($cvs) or empty($st) or empty($str)) return 1;
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
				$data['Usertask']['noidung'] = $nd;
				$this->Usertask->save($data);
			endforeach;
			//debug($data);

			//cap nhat da lam xong
			$user = $this->viewVars['ssid'];
			$this->Usertask->recursive = -1;
			$ids = $this->Usertask->find('first',array('conditions'=>array('Usertask.users_id'=>$user['User']['id'],'Usertask.tasks_id'=>$cv,'Usertask.status <>'=>0)));
			//debug($ids);
			if(!empty($ids)){
				$this->Usertask->id = $ids['Usertask']['id'];
				$this->Usertask->saveField('done','2');
			}
			return 2;
		}
	}
	function failtask($idu,$cvs,$stt,$str){
		$this->autoRender = false;
		if(empty($cvs) or empty($stt) or empty($idu)) return 1;
		else{
			$user = $this->viewVars['ssid'];
			$this->loadModel("Failtask");
			//debug($str);
			$s = base64_decode($stt);
			$cv = base64_decode($cvs);
			$this->Task->id = $cv;
			$this->Failtask->create();
			$data['Failtask']['users_id'] = $idu;
			$data['Failtask']['tasks_id'] = $cv;
			$data['Failtask']['status'] = $s;
			$data['Failtask']['lydo'] = $str;
			$this->Failtask->save($data);

			//debug($data);
			$this->loadModel("Usertask");
			$this->Usertask->create();
			$data['Usertask']['users_id'] = $idu;
			$data['Usertask']['tasks_id'] = $cv;
			$data['Usertask']['status'] = 0;//bij trar laij
			$data['Usertask']['users_chuyen'] = $user['User']['id'];
			$data['Usertask']['done'] = 1;
			$this->Usertask->save($data);
			//cap nhat da lam xong
			$this->Usertask->recursive = -1;
			$ids = $this->Usertask->find('first',array('conditions'=>array('Usertask.users_id'=>$user['User']['id'],'Usertask.tasks_id'=>$cv,'Usertask.status <>'=>0)));
			//debug($ids);
			if(!empty($ids)){
				$this->Usertask->id = $ids['Usertask']['id'];
				$this->Usertask->saveField('done','0');
			}
			$this->Task->id = $cv;
			$this->Task->saveField('status',0);
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
	function getNVFail($task,$stt){
		$this->autoRender = false;
		$id = $this->viewVars['ssid']['User']['id'];
		$this->loadModel("Usertask");
		$this->Usertask->recursive = -1;
		$us=$this->Usertask->find('first',array(
									'fields'=>array('users_chuyen'),
									'conditions'=>array('Usertask.users_id'=>$id,'Usertask.tasks_id'=>$task,'Usertask.status'=>$stt)
							));
		$u = $us['Usertask']['users_chuyen'];
		if (!empty($this->params['requested'])) return $u;
		else  $this->set(compact('u'));
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
