<?php
class AppController extends Controller {
	var $helpers = array('Html','Form','Javascript','Session','Time','Link');
	var $components = array('Session','Auth','Acl');
    function beforeFilter(){
		parent::beforeFilter();
        $this->Auth->userModel = 'User';
        $this->Auth->fields = array('username' => 'username', 'password' => 'password');
        $this->Auth->loginRedirect = array('controller' => 'pages', 'action' => 'display');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'logout');
        $this->Auth->loginAction = array( 'controller' => 'users', 'action' => 'login');
        $this->Auth->loginError = 'Thông tin đăng nhập không đúng';
        $this->Auth->authError = 'Truy cập bị từ chối';
		if($this->Auth->user())
        {
            $idus = $this->Auth->user('id');
            $this->loadModel("User",array('recursive'=>-1));
            $los  = $this->User->query("SELECT * FROM logs where users_id = '{$idus}'");
            $ssid = $this->Auth->user();
        }
        $this->Auth->allow('login');
		$this->set(compact('los','ssid'));
	}
}
function stt($id = null,$d=null){
    $stt = base64_decode($id);
    switch($stt){
        case 1: echo "Khởi tạo"; break;
        case 2: echo "Đã chuyển nhân viên xử lý"; break;
        case 3:
        if($d !=0) echo "Đang chờ ban quản lý duyệt";
        else echo "Yêu cầu nhân viên làm lại"; break;
        case 4: echo "Đang chờ PGĐ kế hoach duyệt"; break;
        case 5: echo "Đang chờ PGĐ tài chính duyệt"; break;
        case 6: echo "Đã chuyển kế toán"; break;
        case 7: echo "Đang chờ giám đốc"; break;
        case 8: echo "Đã trả lại kế toán"; break;
        case 9: echo "Đã trả ban quản lý"; break;
        case 10: echo "Đã trả nhân sự"; break;
        case 11:
        if($d==2)echo "Công việc đã hoàn thành";
        else echo "Chờ ban quản lý xác nhận hoàn thành công việc";
         break;
        case 0: echo "Bị trả lại"; break;
    }
}
function work($id=null,$d=null){
    $stt = base64_decode($id);
        switch($stt){
        case 0: echo "Không duyệt"; break;
        case 1: echo "Khởi tạo công việc"; break;
        case 2: echo "Nhân viên xử lý chính"; break;
        case 3:
        if($d !=0) echo "Duyệt";
        else echo "Trả lại nhân viên"; break;
        case 4: echo "PGĐ kế hoach duyệt"; break;
        case 5: echo "PGĐ tài chính duyệt"; break;
        case 6: echo "Kế toán chuyển cho giám đốc"; break;
        case 7: echo "Giám đốc duyệt"; break;
        case 8: echo "Kế toán trả cho ban quản lý"; break;
        case 9: echo "Ban quản lý thông báo nhân viên"; break;
        case 10: echo "Chuyển ban quản lý xác nhận hoàn thành công việc"; break;
        case 11: echo "Kết thúc công việc"; break;
    }
}