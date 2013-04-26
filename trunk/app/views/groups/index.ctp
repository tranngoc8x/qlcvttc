<?php echo $this->element('chucnang');?>	
<form name="frmList" method="post" action="#">
	<table class="sort-table" cellspacing="0" width="100%"> 
		<tr class='thead'>
			<th><input type="checkbox" name="checkall" value="" onClick="docheck(document.frmList.checkall.checked,0);" class="submit"/></th>
			<th><?php echo $this->Paginator->sort('Tên phòng ban','name');?></th>
			<th><?php echo $this->Paginator->sort('Ghi chú','note');?></th>
			<th><?php echo $this->Paginator->sort('Thứ tự','order');?></th>
			<th class="actions"><?php __('Chức năng');?></th>
	</tr>
	<?php foreach ($groups as $group): ?>
	<tr class='tbody'> 
		<td class="center"><input type="checkbox" value="<?php echo  $group['Group']['id']; ?>" name="checkid" class="checkbox"/></td>
		<td><?php echo $group['Group']['name']; ?>&nbsp;</td>
		<td><?php echo $group['Group']['note']; ?>&nbsp;</td>
		<td><?php echo $group['Group']['order']; ?>&nbsp;</td>
		<td class="actions">
		 
			<?php echo $this->Html->link("Xem",array('plugin'=>false,'controller'=>'groups','action'=>'view',$group['Group']['id']));?>
			<?php echo $this->Html->link("Sửa",array('plugin'=>false,'controller'=>'groups','action'=>'edit',$group['Group']['id']));?>
			<?php echo $this->Html->link("Xóa",array('plugin'=>false,'controller'=>'groups','action'=>'delete',$group['Group']['id']), null, sprintf(__('Bạn có chắc muốn xóa bản ghi này ?', true), $group['Group']['id']));?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element("padding");?>
</form>
 <script type="text/javascript">
	var title = "Quản lý phòng ban";
 </script>

