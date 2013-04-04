<?php
	echo $this->Form->create('Member');
	echo $this->Form->input('username');
	echo $this->Form->input('password');
	echo $this->Form->submit('submit');
	echo $this->element('sql_dump');
?>