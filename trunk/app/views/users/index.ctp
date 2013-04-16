<?php echo $this->element('chucnang');?><?php //debug($this);?>
<form name="frmList" method="post" action="#">
	<table class="sort-table" cellspacing="0" width="100%">
		<thead>
		<tr>
			<th><input type="checkbox" name="checkall" value="" onClick="docheck(document.frmList.checkall.checked,0);" class="submit"/></th>
			<th><?php echo $this->Paginator->sort("Tên đăng nhập",'username'); ?></th>
			<th><?php echo $this->Paginator->sort("Họ tên",'name'); ?></th>
			<th><?php echo $this->Paginator->sort("Chức vụ",'positions_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
	<?php
	foreach ($users as $user): ?>
	<tr class='tbody'>
		<td class="center"><input type="checkbox" value="<?php echo h($user['User']['id']); ?>" name="checkid" class="checkbox"/></td>
		<td><?php echo $user['User']['username']; ?>&nbsp;</td>
		<td><?php echo $user['User']['name']; ?>&nbsp;</td>
		<td><?php echo $user['Position']['name']; ?>&nbsp;</td>
		<td>
				<?php echo $this->Html->link($this->Html->image("admin/view-item.png", array("alt" => "Xem","title"=>"Xem bản ghi")), array('action' => 'view', $user['User']['id']),array('escape'=>false)); ?>
				<?php echo $this->Html->link($this->Html->image("admin/edit-item.png", array("alt" => "Sửa","title"=>"Sửa bản ghi")), array('action' => 'edit', $user['User']['id']),array('escape'=>false)); ?>
				<?php
                        if ($this->Session->read('Auth.User.id')==$user['User']['id'])
							{
 						?>
                         <?php echo $this->Html->link(__('Đổi mật khẩu', true), array('action' => 'changepassword')); }?>

				<?php //echo $this->Html->link($this->Html->image("admin/delete-item.png", array("alt" => "Xóa","title"=>"Xóa bản ghi")), array('action' => 'delete', $user['User']['id']), array('escape'=>false), __('Bạn có chắc muốn xóa mục này',$user['User']['id'])); ?>
				</td>
	</tr>
<?php endforeach; ?>
</table>
</form>
 <script type="text/javascript">
	var title= "Quản lý nhân sự";
</script>