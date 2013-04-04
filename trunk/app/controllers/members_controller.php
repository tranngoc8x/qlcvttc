<?php
class MembersController extends AppController {

	var $name = 'Members';

	function index() {
		$this->Member->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Member', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->Member->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Member->create();
			if ($this->Member->save($this->data)) {
				$idu = $this->Member->getInsertID();
				$this->Member->query("insert into logs (Members_id,ipadr,time) values('".$idu."','".$_SERVER['REMOTE_ADDR']."','".date('Y-m-d h:i:s')."')");
				$this->Session->setFlash(__('The Member has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Member could not be saved. Please, try again.', true));
			}
		}
		$groups = $this->Member->Group->find('list');
		$positions  = $this->Member->Position->find('list');
		$this->set(compact('groups','positions'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Member', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if($this->data['Member']['nghiviec'] == 0){
				 $this->data['Member']['dateend'] = null;
			}
			//debug($this->data);
			if ($this->Member->save($this->data)) {
				$this->Session->setFlash(__('The Member has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Member could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Member->read(null, $id);
		}
		$groups = $this->Member->Group->find('list');
		$positions  = $this->Member->Position->find('list');
		$this->set(compact('groups','positions'));
	}
	function changepassword(){
		if (empty($this->data)) {
        			$this->Session->setFlash(__('Không tìm thấy người dùng', true));
        			$this->redirect(array('action' => 'index'));
        	}
        if(!empty($this->data)){
           $oldpass = $this->data['Member']['password'];
           $newpass = $this->data['Member']['newpassword'];
           $confnewpass = $this->data['Member']['confirmnewpassword'];
           $MemberInfo = $this->Auth->Member();
           $pas = $this->Member->find('first',array('conditions'=>array('Member.id'=>$MemberInfo['Member']['id'])));
           if($this->Auth->password($oldpass)!=trim($pas['Member']['password'])){
			  $this->Session->setFlash(__('Mật khẩu cũ không đúng!', true));
              //$this->redirect(array('action' => 'index'));
           }
		   else {
				if($newpass!=$confnewpass){
					$this->Session->setFlash(__('Mật khẩu mới và nhập lại mật khẩu mới không khớp. Hãy nhập lại!', true));
					//$this->redirect(array('action' => 'index'));
					}

				else{
					//$this->Member->query("update Members set password='".$this->Auth->password($newpass)."' where id='".$MemberInfo['Member']['id']."'");
					$this->Member->id = $this->viewVars['ssid']['Member']['id'];
					$this->Member->saveField("password",$this->Auth->password($newpass));
					$this->Session->setFlash(__('Mật khẩu được thay đổi', true));
					$this->redirect(array('controller' => 'Members','action' => 'index'));
			   }
			}
        }
    }
    function login(){
		if($this->Auth->user()){
			$this->redirect(array('controller' => 'tasks', 'action' => 'index' ));
		}
		Configure::write('debug',1);
		$this->layout = 'login';
		if($this->data){
            $this->autoRender = false;
            if($this->Auth->login($this->Auth->user())){
               // if($this->Auth->user()){
                   // $this->Member->query("updatedate logs set ipadr='".$_SERVER['REMOTE_ADDR']."',time='".date('Y-m-d h:i:s')."' where id='".$this->Auth->Member('id')."'");
              //  }
                echo  "{success: true}";
            }else{
                echo "{ success: false, errors: { reason: 'Đăng nhập không thành công. Xin vui lòng thử lại.' }}";
                //debug($this->data);
                echo $this->Auth->password($this->data['Member']['password']);
            }
        }
	}
	function logout(){$this->redirect($this->Auth->logout());}

}
