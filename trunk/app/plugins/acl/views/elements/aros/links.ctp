<div id="aros_link" class="acl_links">
<?php
$selected = isset($selected) ? $selected : $this->params['action'];

$links = array();
$links[] = $this->Html->link(__d('acl', 'Cập nhật phân quyền người dùng', true), '/acl/aros/check', array('class' => ($selected == 'check' )? 'selected' : null));
$links[] = $this->Html->link(__d('acl', 'Phân quyền nhóm người dùng', true), '/acl/aros/users', array('class' => ($selected == 'users' )? 'selected' : null));

if(Configure :: read('acl.gui.roles_permissions.ajax') === true)
{
    $links[] = $this->Html->link(__d('acl', 'Phân quyền theo nhóm', true), '/acl/aros/ajax_role_permissions', array('class' => ($selected == 'role_permissions' || $selected == 'ajax_role_permissions' )? 'selected' : null));
}
else
{
    $links[] = $this->Html->link(__d('acl', 'Phân quyền theo nhóm', true), '/acl/aros/role_permissions', array('class' => ($selected == 'role_permissions' || $selected == 'ajax_role_permissions' )? 'selected' : null));
}
$links[] = $this->Html->link(__d('acl', 'Phân quyền chi tiết cho người dùng', true), '/acl/aros/user_permissions', array('class' => ($selected == 'user_permissions' )? 'selected' : null));

echo $this->Html->nestedList($links, array('class' => 'acl_links'));
?>
</div>