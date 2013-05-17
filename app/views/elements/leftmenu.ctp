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
		case "aros":
		case "acos":
		case "users":
		case "groups":			$tab1 = 1; break;
		case "tasks":			$tab3 = 1; break;

		case "elecs":
		case "rooms":
		case "nuocs":
		case "customers":		$tab4 = 1; break;
		case "sworks":
		case "smembers":		$tab4 = 1; break;
		default: $tab3 = 1;break;
	}
?>


<div id="congviec">
 	<ul class="menu_left">
 		<li>
			<?php echo $this->Html->link(__('Thêm mới công việc', true), array('plugin'=>false,'admin'=>false,'controller'=>'tasks','action' => 'add')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Công việc cần xử lý', true), array('plugin'=>false,'admin'=>false,'controller'=>'tasks','action' => 'doing')); ?>
		</li>
		<li>
		<?php echo $this->Html->link(__('Công việc đã chuyển', true), array('plugin'=>false,'admin'=>false,'controller'=>'tasks','action' => 'done')); ?>
		</li>
		<li>
		<?php echo $this->Html->link(__('Công việc bị trả lại', true), array('plugin'=>false,'admin'=>false,'controller'=>'tasks','action' => 'fail')); ?>
		</li>

		<li>
		<?php echo $this->Html->link(__('Công việc đã hoàn thành', true), array('plugin'=>false,'admin'=>false,'admin'=>false,'controller'=>'tasks','action' => 'finish')); ?>
		</li>
		<li>
		<?php echo $this->Html->link(__('Tất cả công việc', true), array('plugin'=>false,'admin'=>false,'admin'=>false,'controller'=>'tasks','action' => 'index')); ?>
		</li>
		<li>
		<?php echo $this->Html->link(__('Loại công việc', true), array('plugin'=>false,'admin'=>false,'controller'=>'types','action' => 'index')); ?>
		</li>
		<li>
		<?php echo $this->Html->link(__('Lĩnh vực', true), array('plugin'=>false,'admin'=>false,'controller'=>'linhvucs','action' => 'index')); ?>
		</li>
	</ul>
</div>
<div id="score">
 	<ul class="menu_left">
 		<li>
			<?php echo $this->Html->link(__('Theo từng công việc', true), array('plugin'=>false,'admin'=>false,'controller'=>'sworks','action' => 'index')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Tổng hợp từng nhân viên', true), array('plugin'=>false,'admin'=>false,'controller'=>'smembers','action' => 'index')); ?>
		</li>
	</ul>
</div>
<div id="khach">
	<ul class="menu_left">
		<li>
			<?php echo $this->Html->link(__('Danh sách khách hàng', true), array('plugin'=>false,'admin'=>false,'controller'=>'customers','action' => 'index')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Thêm khách hàng', true), array('plugin'=>false,'admin'=>false,'controller'=>'customers','action' => 'add')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Danh sách các phòng', true), array('plugin'=>false,'admin'=>false,'controller'=>'rooms','action' => 'index')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Nhập thông tin dùng điện', true), array('plugin'=>false,'admin'=>false,'controller'=>'elecs','action' => 'add')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Bảng thống kê lượng điện tiêu thụ hàng tháng', true), array('plugin'=>false,'admin'=>false,'controller'=>'elecs','action' => 'listviewsdate')); ?>
		</li>		
		<li>
			<?php echo $this->Html->link(__('Nhập thông tin dùng nước', true), array('plugin'=>false,'admin'=>false,'controller'=>'nuocs','action' => 'add')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Bảng thống kê lượng nước tiêu thụ hàng tháng', true), array('plugin'=>false,'admin'=>false,'controller'=>'nuocs','action' => 'listviewsdate')); ?>
		</li>

	</ul>
</div>
<div id="nhansu">
	<ul class="menu_left">
		<li>
			<?php echo $this->Html->link(__('Danh sách phòng ban', true), array('plugin'=>false,'admin'=>false,'controller'=>'groups','action' => 'index')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Thêm mới phòng ban', true), array('plugin'=>false,'admin'=>false,'controller'=>'groups','action' => 'add')); ?>
		</li>

		<li>
		<?php echo $this->Html->link(__('Quản lý chức vụ', true), array('plugin'=>false,'admin'=>false,'controller'=>'positions','action' => 'index')); ?>
		</li>
		<li>
		<?php echo $this->Html->link(__('Thêm mới chức vụ', true), array('plugin'=>false,'admin'=>false,'controller'=>'positions','action' => 'add')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Danh sách nhân sự', true), array('plugin'=>false,'admin'=>false,'controller'=>'users','action' => 'index')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Thêm mới nhân sự', true), array('plugin'=>false,'admin'=>false,'controller'=>'users','action' => 'add')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Phân quyền người dùng', true), array('plugin'=>'acl','admin'=>true,'controller'=>'aros','action' => 'ajax_role_permissions')); ?>
		</li>
	</ul>
</div>
<script language="javascript">
Ext.onReady(function(){
	addAccordion('Quản lý công việc', 'congviec', <?php echo $tab3?>)
	addAccordion('Đánh giá công việc', 'score', <?php echo $tab4?>)

	addAccordion('Quản lý khách hàng', 'khach', <?php echo $tab2?>)
	addAccordion('Quản lý nhân sự', 'nhansu', <?php echo $tab1?>)


});
</script>

