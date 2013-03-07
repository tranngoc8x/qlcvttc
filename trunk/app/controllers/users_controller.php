<?php
class UsersController extends AppController {

	var $name = 'Users';
	function login(){
		if($this->Auth->user()){
          //  $this->Auth->redirect();
		}
		Configure::write('debug',0);
		$this->layout = 'login';
		if($this->data){
			//debug($this->data);
            $this->autoRender = false;
            if($this->Auth->login($this->Auth->user())){
                if($this->Auth->user()){
                    $this->User->query("Update logs set ipadr='".$_SERVER['REMOTE_ADDR']."',time='".date('Y-m-d h:i:s')."' where id='".$this->Auth->user('id')."'");
                }
                echo  "{success: true}";
            }else{
            	//echo $this->Auth->password('123');
            	//echo $this->data['User']['password'];
                echo "{ success: false, errors: { reason: 'Đăng nhập không thành công. Xin vui lòng thử lại.' }}";
            }
        }
	}
	function login2(){$this->layout = 'login';}
        public function logout(){
		$this->redirect($this->Auth->logout());//tu dong chuyen trang sau khi logout
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

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	  

	function mdelete($str = null) {
		if($str){
            $arrid=explode(',',$str);
        }else{
    		$this->Session->setFlash(__('Có lỗi xảy ra khi xóa. Hãy thử lại', true),'default',array('class'=>'error'));
    		$this->redirect(array('action' => 'index'));
        }
         foreach($arrid as $item){
			$this->User->delete($item);
         }
		$this->Session->setFlash(__('Đã xóa người dùng', true),'default',array('class'=>'success'));
		$this->redirect(array('action' => 'index'));
	}
}
