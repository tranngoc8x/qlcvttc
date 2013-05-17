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
	<tr class="tbody">
		<td><b>Tên nhân viên</b></td>
		<td><b>Độ khó công việc</b></td>
		<td><b>Mức độ hoàn thành</b></td>
		<td><b>Đánh giá</b></td>
		<td><b>Thay đổi</b></td>
	</tr>
	<?php //debug($score['Score']);?>
	<?php foreach ($score['Score'] as $key => $value):?>
	<tr class="tbody" id="tr<?php echo $key;?>">
		<td><?php echo $this->requestAction('tasks/getNV/'.$value['users_id']);?></td>
		<td><?php echo $value['level'];?></td>
		<td><?php echo $value['percent'];?></td>
		<td><?php echo $value['mark'];?></td>
		<td><a href="#" id="<?=$value['id']?>" class="suadiem">Sửa</a></td>
	</tr>
<?php endforeach;?>
	</table>
	<div id="dialog-sua" title="Đánh giá nhân viên">

	</div>
<script type="text/javascript">var title="Chi tiết ";</script>
<table></table>

<script>
//văn bản lienquan
	var thisid = "";
	$(".suadiem").click(function( event ) {
			$("#dialog-sua").dialog("open");
			event.preventDefault();
			thisid = this.id;
			var returnhtml = "<?php echo $this->requestAction('scores/getscore/"+thisid+"');?>";
			//console.log(returnhtml);
			$("#dialog-sua").html(returnhtml);
	});
	$("#dialog-sua").dialog({
		autoOpen: false,
		width: 400,
		buttons: [
			{
				text: "Lưu lại",
				click: function() {
					// var item = $('#tr'+thisid+" td");
					// var formData = new FormData();
    				//formData.append('data[Score][level]', item[1].outerText);
					// formData.append('data[Score][percent]', item[2].outerText);
					// formData.append('data[Score][mark]', item[3].outerText);
					// formData.append('data[Score][id]', thisid);
					//formData.append('data[Score][id]', item[0].firstElementChild.outerText);
					//console.log(item[0].outerText);
					//console.log(item[0].firstElementChild.outerText);
					$.ajax({
						url: "<?=$this->webroot;?>scores/suadiem",
						type: "POST",
						data: formData,
						processData: false,
						contentType: false,
						success: function (res) {
							console.log(res);
						}
					});
				}
			},
			{
				text: "Đóng lại",
				click: function() {
					$( this ).dialog( "close");
				}
			}
		]
	});
</script>