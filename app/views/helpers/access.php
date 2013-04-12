<?php
class AccessHelper extends Helper{
    var $helpers = array("Session");
    var $Access;
    var $Auth;
    var $user;

    function beforeRender(){
        App::import('Component', 'Access');
        $this->Access = new AccessComponent();

        App::import('Component', 'Auth');
        $this->Auth = new AuthComponent();
        $this->Auth->Session = $this->Session;
    }

    function check($aco, $action='*'){
        if(empty($this->user)) return false;
        return $this->Access->check('User::'.$this->Auth->user("id"), $aco, $action);
    }
}
?>
<?php
// class AccessHelper extends AppHelper {

//     var $helpers = array('Session');

//     function check($path){
//         // assuming that allow('controllers') grands access to all actions
//         if($this->Session->check('Permissions.controllers')
//         && $this->Session->read('Permissions.controllers') === true){
//             return true;
//         }
//         if($this->Session->check('Permissions'.$path)
//         && $this->Session->read('Permissions'.$path) === true){
//             return true;
//         }
//         return false;
//     }
// }