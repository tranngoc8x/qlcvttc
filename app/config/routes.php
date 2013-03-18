<?php
 
	Router::connect('/', array('controller' => 'tasks', 'action' => 'index'));
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));

	Router::connect('/task/*', array('controller' => 'tasks', 'action' => 'index'));
