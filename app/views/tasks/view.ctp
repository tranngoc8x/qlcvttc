<table class='tblcontent' border=1 width=100% cellspacing=0 cellpadding=0>
	<tr>
		<td><?=$this->Html->link("Giao việc",array('action'=>'change',$task['Task']['id']));?></td>
		<td>Hủy</td>
	</tr>
	<tr>
		<td>Chi tiết công việc</td>
	</tr>
	<tr>
		<td><span class='text_tite'>Tên công việc:</span>&nbsp;&nbsp;&nbsp;<?php echo $task['Task']['name']; ?></td>
	</tr>	
	<tr>
		<td><span class="text_tite">Nội dung công việc</span>&nbsp;&nbsp;&nbsp;<?php echo $task['Task']['name']; ?></td>
	</tr>
	<tr>
		<td>
			<span class="text_tite">Ngày bắt đầu :</span>&nbsp;&nbsp;&nbsp;<?php echo date('d/m/Y',strtotime($task['Task']['start'])); ?><br>
			<span class="text_tite">Ngày kết thúc :</span>&nbsp;&nbsp;<?php echo date('d/m/Y',strtotime($task['Task']['end'])); ?>
		</td>
	</tr>
</table>





<script type="text/javascript">
	var title = "Quản lý công việc";
</script>