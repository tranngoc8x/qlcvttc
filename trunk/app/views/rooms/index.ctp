<?php echo $this->element('chucnang');?>
<form name="frmList" method="post" action="#">
	<table class="sort-table" cellspacing="0" width="100%">
		<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('Tên khách hàng','name'); ?></th>
			<th><?php echo $this->Paginator->sort('Người đại diện','agent'); ?></th>
			<th><?php echo $this->Paginator->sort('Số điện thoại','phone'); ?></th>			
			<th col><?php echo $this->Paginator->sort('Phòng','room'); ?></th>
			<th col><?php echo $this->Paginator->sort('Mã công tơ điện','mactodien'); ?></th>
			<th col><?php echo $this->Paginator->sort('Mã công tơ nước','mactonuoc'); ?></th>
			<th col><?php echo $this->Paginator->sort('Chỉ số điện đầu','firstdien'); ?></th>
			<th col><?php echo $this->Paginator->sort('Chỉ số nước đầu','firstnuoc'); ?></th>
			<th col><?php echo $this->Paginator->sort('Ghi chú','ghichu'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach($cus as $c){?>
		<tr class='tbody'>
			<td rowspan=<?php echo count($c['Room']); ?>><?php echo $c['Customer']['name'];?></td>
			<td rowspan=<?php echo count($c['Room']); ?>><?php echo $c['Customer']['agent'];?></td>
			<td rowspan=<?php echo count($c['Room']); ?>><?php echo $c['Customer']['phone'];?></td>
			<?php if($c['Room']!=NULL){foreach($c['Room'] as $r){?>
			<td><?php echo $r['room'];?></td>
			<td><?php echo $r['mactodien'];?></td>
			<td><?php echo $r['mactonuoc'];?></td>
			<td><?php echo $r['firstdien'];?></td>
			<td><?php echo $r['firstnuoc'];?></td>
			
			<td><?php echo $r['ghichu'];?></td>
			<td>
				<?php echo $this->Html->link($this->Html->image("admin/view-item.png", array("alt" => "Xem","title"=>"Xem bản ghi")), array('action' => 'view', $r['id']),array('escape'=>false)); ?>
				<?php echo $this->Html->link($this->Html->image("admin/edit-item.png", array("alt" => "Sửa","title"=>"Sửa bản ghi")), array('action' => 'edit', $r['id']),array('escape'=>false)); ?>
				<?php echo $this->Html->Link($this->Html->image("admin/delete-item.png", array("alt" => "Xóa","title"=>"Xóa bản ghi")), array('action' => 'delete', $r['id']), array('escape'=>false), __('Bạn có chắc muốn xóa mục này',$r['id'])); ?>
			</td>
			</tr><tr class='tbody'>
			<?php }}else{?>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<?php }?>
		</tr>
		<?php }?>
	</table>
<?php echo $this->element("padding");?>
</form>
<script> var title= "Danh sách phòng";</script>