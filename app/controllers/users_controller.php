<?php
class UsersController extends AppController {

	var $name = 'Users';
	function login(){
		if($this->Auth->user()){}
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
	function logout(){}
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
	function changepassword($id = null){
		if (!$id && empty($this->data)) {
        			$this->Session->setFlash(__('Không tìm thấy người đùng', true));
        			$this->redirect(array('action' => 'index'));
        	}
        if(!empty($this->data)){
           $oldpass = $this->data['User']['password'];
           $newpass = $this->data['User']['newpassword'];
           $confnewpass = $this->data['User']['confirmnewpassword'];
           $UserInfo = $this->Auth->user();
           $pas = $this->User->find('first',array('conditions'=>array('User.id'=>$UserInfo['User']['id'])));
           if($this->Auth->password($oldpass)!=trim($pas['User']['password'])){
			  $this->Session->setFlash(__('Mật khẩu cũ không đúng!', true));
              //$this->redirect(array('action' => 'index'));
           }
		   else {
				if($newpass!=$confnewpass){
					$this->Session->setFlash(__('Chưa sửa được. Mật khẩu mới và nhập lại mật khẩu mới không khớp. Hãy nhập lại!', true));
					//$this->redirect(array('action' => 'index'));
					}

				else{
					$this->User->query("update users set password='".$this->Auth->password($newpass)."' where id='".$UserInfo['User']['id']."'");
					$this->Session->setFlash(__('Mật khẩu được thay đổi', true));
					$this->redirect(array('controller' => 'users','action' => 'index'));
			   }
			}
        }
    }
}
