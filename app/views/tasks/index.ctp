<?php echo $this->element('chucnang');?>
<form name="frmList" method="post" action="#">
	<table class="sort-table" cellspacing="0" width="100%">
		<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('Mã công việc','taskid');?></th>
			<th><?php echo $this->Paginator->sort('Tên công việc','name');?></th>
			<th><?php echo $this->Paginator->sort('Người tạo','users_id');?></th>
			<th><?php echo $this->Paginator->sort('Ngày tạo','start');?></th>
			<th><?php echo $this->Paginator->sort('Ngày kết thúc','end');?></th>
			<th><?php echo $this->Paginator->sort('Lĩnh vực','linhvucs_id');?></th>
			<th><?php echo $this->Paginator->sort('Trạng thái','status');?></th>
			<th class="actions"><?php __('Chức năng');?></th>
	</tr>
	<?php
	foreach ($tasks as $item):
		//debug($item);
	?>
	
	<tr class='tbody'>
		<td align=center><?php echo $item['Task']['taskid']; ?>&nbsp;</td>
		<td><?php echo $item['Task']['name']; ?>&nbsp;</td>
		<td><?php  echo $this->requestAction('tasks/getNV/'.$item['Task']['users_id']);?>&nbsp;</td>
		<td><?php echo date('d/m/Y',strtotime($item['Task']['start'])); ?>&nbsp;</td>
		<td><?php echo date('d/m/Y',strtotime($item['Task']['end'])); ?>&nbsp;</td>
		<td><?php echo $item['Linhvuc']['name'] ; ?>&nbsp;</td>
		<td>
			<?php if($item["Task"]["status"] ==1){echo "Khởi tạo";}else{?>
				<?php $idlastu = $this->requestAction('tasks/getfnNV/'.$item["Task"]["id"]);?>
				<?php echo $this->requestAction('tasks/getNV/'.$idlastu["Usertask"]["users_id"]);?>
				<?php if($item["Task"]["done"] ==1){ echo "đang xử lý";}?>
			<?php }?>
			&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link($this->Html->image("admin/view-item.png", array("alt" => "Xem","title"=>"Xem bản ghi")), array('action' => 'view', $item['Task']['id']),array('escape'=>false)); ?>
			<?php if($item['Task']['status'] ==1 && $item['Task']['users_id']==$this->Session->read('Auth.User.id')):?>
				<?php echo $this->Html->link($this->Html->image("admin/edit-item.png", array("alt" => "Sửa","title"=>"Sửa bản ghi")), array('action' => 'edit', $item['Task']['id']),array('escape'=>false)); ?>

				<?php echo $this->Html->link($this->Html->image("admin/delete-item.png", array("alt" => "Xóa","title"=>"Xóa bản ghi")), array('action' => 'delete', $item['Task']['id']), array('escape'=>false), __('Bạn có chắc muốn xóa mục này',$item['Task']['id'])); ?>
			<?php endif;?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php //echo $this->element('sql_dump');?>
	<script>var title = "Quản lý công việc";</script>