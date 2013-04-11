<?php
class AccessHelper extends AppHelper {
    var $components = array('Acl', 'Auth');
    var $user;
    function startup(){
        $this->user = $this->Auth->user();
    }
    function check($aco, $action='*'){
	    if(!empty($this->user) && $this->Acl->check('User::'.$this->user['User']['id'], $aco, $action)){
	        return true;
	    } else {
	        return false;
	    }
	}
	function group($aco, $action='*'){
	    if(!empty($this->user) && $this->Acl->check('Group::'.$this->user['User']['groups_id'], $aco)){
	        return true;
	    } else {
	        return false;
	    }
	}
}
?>