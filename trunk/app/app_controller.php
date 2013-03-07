<?php
class AppController extends Controller {
	var $helpers = array('Html','Form','Javascript','Session','Time','Link');
	var $components = array(
            'Session',
            'Auth' => array(
                'loginRedirect' => array('controller' => 'pages', 'action' => 'display'),
                'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
                'loginAction' => array( 'controller' => 'users', 'action' => 'login'),
                'loginError' => 'Thông tin đăng nhập không đúng',
                'authError' => 'Truy cập bị từ chối'
            ),
            'Acl'
        );
	var $uses = array('User');
    function beforeFilter(){		
		parent::beforeFilter();
		$idus = 0;
		if($this->Auth->user()) $idus = $this->Auth->user('id');
		$los  = $this->User->query("SELECT * FROM logs where users_id = '{$idus}'");
        $ssid = $this->User->find('first',array('fields'=>array('id','username','name'),'conditions'=>array('User.id'=>$idus)));
		$this->Auth->allow('login');
		$this->set(compact('los','ssid'));
	}
}
