<?php echo $this->element('chucnang');?>
<form name="frmList" method="post" action="#">
	<table class="sort-table" cellspacing="0" width="100%"> 
		<thead> 
		<tr>
			<th><input type="checkbox" name="checkall" value="" onClick="docheck(document.frmList.checkall.checked,0);" class="submit"/></th>
			<th><?php echo $this->Paginator->sort('Loại công việc','name'); ?></th>			
			<th><?php echo $this->Paginator->sort('Chú thích','note'); ?></th>			
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
	
	<?php
	foreach ($types as $type): ?>
 
	<tr class='tbody'>
 
		<td class="center"><input type="checkbox" value="<?php echo h($type['Type']['id']); ?>" name="checkid" class="checkbox"/></td>
		<td><?php echo $type['Type']['name']; ?>&nbsp;</td>	
		<td><?php echo $type['Type']['note']; ?>&nbsp;</td>		
		<td>
				<?php echo $this->Html->link($this->Html->image("admin/view-item.png", array("alt" => "Xem","title"=>"Xem bản ghi")), array('action' => 'view', $type['Type']['id']),array('escape'=>false)); ?>
				<?php echo $this->Html->link($this->Html->image("admin/edit-item.png", array("alt" => "Sửa","title"=>"Sửa bản ghi")), array('action' => 'edit', $type['Type']['id']),array('escape'=>false)); ?>
				<?php echo $this->Html->Link($this->Html->image("admin/delete-item.png", array("alt" => "Xóa","title"=>"Xóa bản ghi")), array('action' => 'delete', $type['Type']['id']), array('escape'=>false), __('Bạn có chắc muốn xóa mục này',$type['Type']['id'])); ?>
				</td>
	</tr>
<?php endforeach; ?>

</table>
</form>
<script>var title = "Quản lý loại công việc";</script>