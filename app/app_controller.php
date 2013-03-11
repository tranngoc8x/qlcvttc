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
function stt($stt = null){

    switch($stt){
        case 1: echo "Khởi tạo"; break;
        case 2: echo "Chuyển nhân viên"; break;
        case 3: echo "Trình ban quản lý"; break;
        case 4: echo "Trình PGĐ kế hoach"; break;
        case 5: echo "Trình PGĐ tài chính"; break;
        case 6: echo "Chuyển kế toán"; break;
        case 7: echo "Trình giám đốc"; break;
        case 8: echo "Trả kế toán"; break;
        case 9: echo "Trả ban quản lý"; break;
        case 10: echo "Trả nhân sự"; break;
    }
}