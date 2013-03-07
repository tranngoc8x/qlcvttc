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
		
		
		case "tasks":		$tab3 = 1; break;

 		

	}
?>
<div id="nhansu">
	<ul class="menu_left">
		<li>
			<?php echo $this->Html->link(__('Danh sách phòng ban', true), array('plugin'=>false,'controller'=>'groups','action' => 'index')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Thêm mới phòng ban', true), array('plugin'=>false,'controller'=>'groups','action' => 'add')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Danh sách nhân sự', true), array('plugin'=>false,'controller'=>'users','action' => 'index')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Thêm mới nhân sự', true), array('plugin'=>false,'controller'=>'users','action' => 'add')); ?>
		</li>
		<li>
		<?php echo $this->Html->link(__('Chức vụ', true), array('plugin'=>false,'controller'=>'positions','action' => 'index')); ?>
		</li>
		<li>
		<?php echo $this->Html->link(__('Thêm mới chức vụ', true), array('plugin'=>false,'controller'=>'positions','action' => 'add')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Quản lý quyền người dùng', true), array('plugin'=>'acl','controller'=>'aros','action' => 'ajax_role_permissions')); ?>
		</li>
	</ul>
</div>

<div id="congviec">
 	<ul class="menu_left">
		<li>
			<?php echo $this->Html->link(__('Danh sách công việc của tôi', true), array('plugin'=>false,'controller'=>'offices','action' => 'index')); ?>
		</li>
		<li>
		<?php echo $this->Html->link(__('Thêm mới phòng ban', true), array('plugin'=>false,'controller'=>'offices','action' => 'add')); ?>
		</li>
		<li>
		<?php echo $this->Html->link(__('Chức vụ', true), array('plugin'=>false,'controller'=>'positions','action' => 'add')); ?>
		</li>
		<li>
		<?php echo $this->Html->link(__('Thêm mới chức vụ', true), array('plugin'=>false,'controller'=>'positions','action' => 'add')); ?>
		</li>
	</ul>
</div>


<script language="javascript">
Ext.onReady(function(){
	addAccordion('Quản lý công việc', 'congviec', <?php echo $tab3?>)
	addAccordion('Quản lý nhân sự', 'nhansu', <?php echo $tab1?>)
	
	
	
});
</script>

