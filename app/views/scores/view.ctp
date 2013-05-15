<?php $idlastu = $this->requestAction('tasks/getfnNV/'.$score["Task"]["id"]);?>
<table class='tblcontent chitietcv' border=0 width=100% cellspacing=0 cellpadding=0>
	<tr class='tbody'>
		<td class=' ui-widget-header title' colspan=5>Thông tin công việc</td>
	</tr>
	<tr class='tbody'>
		<td class='tDtite'><span class='text_tite'>Mã công việc:</span></td>
		<td><?php echo $score['Task']['taskid']; ?></td>
		<td class='tDtite'><span class='text_tite'>Folder lưu trữ:</span></td>
		<td colspan=2><?php echo $score['Task']['folder']; ?></td>
	</tr>
	<tr class='tbody'>
		<td class='tDtite'><span class="text_tite">Tên công việc: </span></td>
		<td colspan><?php echo $score['Task']['name']; ?></td>
		<td class='tDtite'><span class="text_tite">Trạng thái: </span></td>
		<td colspan=2><?php if($score["Task"]["status"] ==1){echo "Khởi tạo";}else{?>
				<?php echo $this->requestAction('tasks/getNV/'.$idlastu["Usertask"]["users_id"]);?>
				<?php if($score["Task"]["done"] ==1){ echo "đang xử lý";}?>
			<?php }?></td>
	</tr>
	<tr class='tbody'>
		<td class='tDtite'><span class=" ">Ngày bắt đầu :</span></td>
		<td width=150><?php echo date('d/m/Y',strtotime($score['Task']['start'])); ?></td>
		<td class='tDtite'><span class=" ">Ngày kết thúc :</span></td>
		<td  colspan=2><?php echo date('d/m/Y',strtotime($score['Task']['end'])); ?></td>
	</tr>
	<tr class='tbody'>
		<td class='tDtite'><span class=" ">Người giao việc :</span></td>
		<td width=150><?php echo  $score['User']['name']; ?></td>
		<td class='tDtite'><span class=" ">Nhân viên được giao :</span></td>
		<td colspan=2>
			<?php foreach ($score['Usertask'] as $v) {
			  if($v['status'] == 2){
			  		$u = $this->requestAction('tasks/getNV/'.$v['users_id']);
			  		echo $u.', ';
			  }
			}
			?>
		</td>
	</tr>
	<tr class='tbody'>
		<td class='tDtite'><span class=" ">Loại công việc :</span></td>
		<td><?php echo $score['Type']['name']; ?></td>
		<td class='tDtite'><span class=" ">Lĩnh vực :</span></td>
		<td colspan=2><?php echo $score['Linhvuc']['name']; ?></td>
	</tr>
	<tr class='tbody'>
		<td class=' ui-widget-header title' colspan=5>Kết quả làm việc của nhân viên</td>
	</tr>

	</table>
<script type="text/javascript">var title="Chi tiết ";</script>