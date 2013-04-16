<?php echo $this->element('chucnang');?>
<form name="frmList" method="post" action="#">
	<table class="sort-table" cellspacing="0" width="100%">
		<thead>
		<tr>
			<th><input type="checkbox" name="checkall" value="" onClick="docheck(document.frmList.checkall.checked,0);" class="submit"/></th>

			<th><?php echo $this->Paginator->sort('Tên khách hàng','name'); ?></th>
			<th><?php echo $this->Paginator->sort('Tên viết tắt','code'); ?></th>
			<th><?php echo $this->Paginator->sort('Địa chỉ','add'); ?></th>
			<th><?php echo $this->Paginator->sort('Email','email'); ?></th>
			<th><?php echo $this->Paginator->sort('Điện thoại','phone'); ?></th>
			<th><?php echo $this->Paginator->sort('Người đại diện','agent'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>

	<?php
	foreach ($customers as $customer): ?>

	<tr class='tbody'>

		<td class="center"><input type="checkbox" value="<?php echo h($customer['Customer']['id']); ?>" name="checkid" class="checkbox"/></td>
		<td><?php echo $customer['Customer']['name']; ?>&nbsp;</td>
		<td><?php echo $customer['Customer']['code']; ?>&nbsp;</td>
		<td><?php echo $customer['Customer']['add']; ?>&nbsp;</td>
		<td><?php echo $customer['Customer']['email']; ?>&nbsp;</td>
		<td><?php echo $customer['Customer']['phone']; ?>&nbsp;</td>
		<td><?php echo $customer['Customer']['agent']; ?>&nbsp;</td>
		<td>
				<?php echo $this->Html->link($this->Html->image("admin/view-item.png", array("alt" => "Xem","title"=>"Xem bản ghi")), array('action' => 'view', $customer['Customer']['id']),array('escape'=>false)); ?>
				<?php echo $this->Html->link($this->Html->image("admin/edit-item.png", array("alt" => "Sửa","title"=>"Sửa bản ghi")), array('action' => 'edit', $customer['Customer']['id']),array('escape'=>false)); ?>
				<?php echo $this->Html->Link($this->Html->image("admin/delete-item.png", array("alt" => "Xóa","title"=>"Xóa bản ghi")), array('action' => 'delete', $customer['Customer']['id']), array('escape'=>false), __('Bạn có chắc muốn xóa mục này',$customer['Customer']['id'])); ?>
				</td>
	</tr>
<?php endforeach; ?>

</table>
</form>
<script> var title= "Quản lý danh sách khách hàng";</script>