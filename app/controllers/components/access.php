<?php
class AccessComponent extends Object{
    var $components = array('Acl', 'Auth');

    // Aro dalam format User:$id
    function check($aco, $action='*'){
        if(!empty($this->user) && $this->Acl->check('User::'.$this->Auth->user('id'), $aco, $action)){
            return true;
        } else {
            return false;
        }
    }
}
?>