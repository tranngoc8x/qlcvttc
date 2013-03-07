<?php echo $this->element('chucnang');?>	
<form name="frmList" method="post" action="#">
	<table class="sort-table" cellspacing="0" width="100%"> 
		<thead> 
		<tr>
			<th><input type="checkbox" name="checkall" value="" onClick="docheck(document.frmList.checkall.checked,0);" class="submit"/></th>
			<th><?php echo $this->Paginator->sort('Tên chức vụ','name'); ?></th>
			<th><?php echo $this->Paginator->sort('Thuộc phòng ban','groups_id'); ?></th>
			<th><?php echo $this->Paginator->sort('Chú thích','note'); ?></th>			
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($pos as $pos): ?>
	<tr>
		<td class="center"><input type="checkbox" value="<?php echo h($pos['Position']['id']); ?>" name="checkid" class="checkbox"/></td>
		<td><?php echo $pos['Position']['name']; ?>&nbsp;</td>
		<td><?php echo $pos['Group']['name']; ?>&nbsp;</td>		
		<td><?php echo $pos['Position']['note']; ?>&nbsp;</td>		
		<td>
				<?php echo $this->Html->link($this->Html->image("admin/view-item.png", array("alt" => "Xem","title"=>"Xem bản ghi")), array('action' => 'view', $pos['Position']['id']),array('escape'=>false)); ?>
				<?php echo $this->Html->link($this->Html->image("admin/edit-item.png", array("alt" => "Sửa","title"=>"Sửa bản ghi")), array('action' => 'edit', $pos['Position']['id']),array('escape'=>false)); ?>
				<?php echo $this->Html->Link($this->Html->image("admin/delete-item.png", array("alt" => "Xóa","title"=>"Xóa bản ghi")), array('action' => 'delete', $pos['Position']['id']), array('escape'=>false), __('Bạn có chắc muốn xóa mục này',$pos['Position']['id'])); ?>
				</td>
	</tr>
<?php endforeach; ?>
</tbody>
</table>
 <script type="text/javascript">
	var title= "Bảng chức vụ";
</script>