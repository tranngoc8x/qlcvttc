<?php
class AppController extends Controller {

	var $helpers = array('Html', 'Form', 'Session','Javascript','Time','Link','Js','Ajax');
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
        $this->set(compact('los','ssid'));
        if(isset($this->params['requested'])) {
            $this->Auth->allow($this->action);
        }
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