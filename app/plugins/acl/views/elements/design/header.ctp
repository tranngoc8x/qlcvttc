<?php
echo $this->Html->css('/acl/css/acl.css');
?>
<div id="plugin_acl">

	<?php
	echo $this->Session->flash('plugin_acl');
	?>

	<?php

	if(!isset($no_acl_links))
	{
	    $selected = isset($selected) ? $selected : $this->params['controller'];

        $links = array();
        $links[] = $this->Html->link(__d('acl', 'Permissions', true), '/admin/acl/aros/index', array('class' => ($selected == 'aros' )? 'selected' : null));
      //  $links[] = $this->Html->link(__d('acl', 'Actions', true), '/admin/acl/acos/index', array('class' => ($selected == 'acos' )? 'selected' : null));

        echo $this->Html->nestedList($links, array('class' => 'acl_links'));
	}
	?>