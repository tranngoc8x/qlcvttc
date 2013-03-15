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
		if($this->Auth->user())
        {
            $idus = $this->Auth->user('id');
            $los  = $this->User->query("SELECT * FROM logs where users_id = '{$idus}'");
            $ssid = $this->Auth->user();
        }	
        $this->Auth->allow('login');
		$this->set(compact('los','ssid'));
	}
}
function stt($id = null){
    $stt = base64_decode($id);
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
function work($id=null){
    $stt = base64_decode($id);
        switch($stt){
        case 1: echo "Khởi tạo công việc"; break;
        case 2: echo "Nhân viên xử lý chính"; break;
        case 3: echo "Ban quản lý duyệt"; break;
        case 4: echo "PGĐ kế hoach duyệt"; break;
        case 5: echo "PGĐ tài chính duyệt"; break;
        case 6: echo "Kế toán chuyển cho giám đốc"; break;
        case 7: echo "Giám đốc duyệt"; break;
        case 8: echo "Kế toán trả cho ban quản lý"; break;
        case 9: echo "Ban quản lý thông báo nhân viên"; break;
        case 10: echo "Kết thúc công việc"; break;
    }
}