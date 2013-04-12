<?php
class AppController extends Controller {
	var $helpers = array('Html', 'Form', 'Session','Javascript','Time','Link','Js','Ajax','Access');
	var $components = array('Acl', 'Auth', 'Session','RequestHandler');
    function beforeFilter(){
		parent::beforeFilter();
        $this->Auth->authorize = 'actions';
        $this->Auth->actionPath = 'controllers/';
        //$this->Auth->autoRedirect = false;
        $this->Auth->loginRedirect = array('admin'=>false,'controller' => 'tasks', 'action' => 'doing');
        $this->Auth->logoutRedirect = array('admin'=>false,'controller' => 'users', 'action' => 'logout');
        // $this->Auth->loginAction = array('admin'=>false,'controller' => 'users', 'action' => 'login');
        // $this->Auth->deny('*');
        $this->Auth->allow('login','logout');
		if($this->Auth->user())
        {
            $idus = $this->Auth->user('id');
            $this->loadModel("User",array('recursive'=>-1));
            $los  = $this->User->query("SELECT * FROM logs where users_id = '{$idus}'");
            $ssid = $this->Auth->user();
        }
        if(isset($this->params['requested'])) {
            $this->Auth->allow($this->action);
        }
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

function nhuan($nam = null){
	$mom=array(0,31,28,31,30,31,30,31,31,30,31,30,31);
	if((($nam%4==0)&& ($nam%100!=0))||($nam%400==0))

	$mom=array(0,31,29,31,30,31,30,31,31,30,31,30,31);
	return $mom;


}

function word($id = null,$g = null){
    switch ($id) {
        case 1:
            $s = 'Giao việc';
            break;
        case 2:
            $s = 'Trả lại';
            break;
        case 3:
            $s = 'Hoàn thành công việc';
            break;
        case 4:
            $s = 'Chuyển cấp trên';
            break;
        case 5:
            $s = 'Chuyển phòng tài chính';
            break;
        case 6:
            $s = 'Chuyển kế toán';
            break;
        default:
            $s = "Chuyển công việc";
            break;
    }
    return $s;

}