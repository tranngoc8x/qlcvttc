<?php
	echo $this->Form->submit(__('Lưu lại'),array('div'=>false));
	echo $this->Form->submit('Reset', array('type'=>'reset','div'=>false));
	echo $this->Form->end();
?>