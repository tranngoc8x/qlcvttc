<?php
class UsersController extends AppController {

	var $name = 'Users';
	 function beforeFilter(){
	   	$this->Auth->allow('login','logout');
	  }
	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$idu = $this->User->getInsertID();
				$this->User->query("insert into logs (users_id,ipadr,time) values('".$idu."','".$_SERVER['REMOTE_ADDR']."','".date('Y-m-d h:i:s')."')");
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		$groups = $this->User->Group->find('list');
		$positions  = $this->User->Position->find('list');
		$this->set(compact('groups','positions'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if($this->data['User']['nghiviec'] == 0){
				 $this->data['User']['dateend'] = null;
			}
			//debug($this->data);
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$positions  = $this->User->Position->find('list');
		$this->set(compact('groups','positions'));
	}

    function login(){
		if($this->Auth->user()){
			$this->redirect(array('controller' => 'tasks', 'action' => 'index' ));
		}
		Configure::write('debug',0);
		$this->layout = 'login';
		if($this->data){
            $this->autoRender = false;
            if($this->Auth->login($this->Auth->user())){
                if($this->Auth->user()){
                    $this->User->query("Update logs set ipadr='".$_SERVER['REMOTE_ADDR']."',time='".date('Y-m-d h:i:s')."' where id='".$this->Auth->user('id')."'");
                }
                echo  "{success: true}";
            }else{
                echo "{ success: false, errors: { reason: 'Đăng nhập không thành công. Xin vui lòng thử lại.' }}";
            }
        }
	}

	function logout(){$this->Session->delete('Auth.Permissions');$this->redirect($this->Auth->logout());}

}
