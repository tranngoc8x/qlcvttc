<?php
	 $tab1 = 0;
	 $tab2 = 0;
	 $tab3 = 0;
	 $tab4 = 0;
	 $tab5 = 0;
	 $tab6 = 0;
	 $tab7 = 0;

	switch (strtolower($this->name))
	{
		case "positions":
		case "users":
		case "groups":			$tab1 = 1; break;
		case "tasks":			$tab3 = 1; break;
		default: $tab3 = 1;break;
	}
?>


<div id="congviec">
 	<ul class="menu_left">
		<li>
			<?php echo $this->Html->link(__('Công việc cần xử lý', true), array('plugin'=>false,'controller'=>'tasks','action' => 'doing')); ?>
		</li>
		<li>
		<?php echo $this->Html->link(__('Công việc đã chuyển', true), array('plugin'=>false,'controller'=>'tasks','action' => 'done')); ?>
		</li>
		<li>
		<?php echo $this->Html->link(__('Công việc bị trả lại', true), array('plugin'=>false,'controller'=>'tasks','action' => 'fail')); ?>
		</li>

		<li>
		<?php echo $this->Html->link(__('Công việc đã hoàn thành', true), array('plugin'=>false,'controller'=>'tasks','action' => 'finish')); ?>
		</li>
	</ul>
</div>
<div id="nhansu">
	<ul class="menu_left">
		<li>
			<?php echo $this->Html->link(__('Danh sách phòng ban', true), array('plugin'=>false,'controller'=>'groups','action' => 'index')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Thêm mới phòng ban', true), array('plugin'=>false,'controller'=>'groups','action' => 'add')); ?>
		</li>

		<li>
		<?php echo $this->Html->link(__('Quản lý chức vụ', true), array('plugin'=>false,'controller'=>'positions','action' => 'index')); ?>
		</li>
		<li>
		<?php echo $this->Html->link(__('Thêm mới chức vụ', true), array('plugin'=>false,'controller'=>'positions','action' => 'add')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Danh sách nhân sự', true), array('plugin'=>false,'controller'=>'users','action' => 'index')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Thêm mới nhân sự', true), array('plugin'=>false,'controller'=>'users','action' => 'add')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Phân quyền người dùng', true), array('plugin'=>'acl','controller'=>'aros','action' => 'ajax_role_permissions')); ?>
		</li>
	</ul>
</div>

<script language="javascript">
Ext.onReady(function(){
	addAccordion('Quản lý công việc', 'congviec', <?php echo $tab3?>)
	addAccordion('Quản lý nhân sự', 'nhansu', <?php echo $tab1?>)



});
</script>

