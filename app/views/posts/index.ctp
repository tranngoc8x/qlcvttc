<h3>Danh sách bài viết</h3>
<br>
<table>
	<tr>
		<td>ID</td>
		<td>name</td>
		<td>desc</td>
		<td>Chức năng</td>
	</tr>
<?php
foreach($posts as $items){
?>
	<tr>
		<td><?php echo $items['Post']['id'];?></td>
		<td><?php echo $items['Post']['name'];?></td>
		<td><?php echo $items['Post']['desc'];?></td>
		<td>
			<?php echo $this->Html->link("Xem",array('controller'=>'posts','action'=>'detail',$items['Post']['id']));?>
			<?php echo $this->Html->link("Sửa",array('controller'=>'posts','action'=>'edit',$items['Post']['id']));?>
			<?php echo $this->Html->link("Xóa",array('controller'=>'posts','action'=>'delete',$items['Post']['id']));?>
		</td>
	</tr>
	<?php }?>
</table>