<style>
	#dialog img.as{ display: inline-table; vertical-align: top;}
	.parent{cursor:pointer;}
	.block{padding: 5px 0 0;border-bottom: 1px dotted #ddd; }
</style>
<?php $idlastu = $this->requestAction('tasks/getfnNV/'.$task["Task"]["id"]);?>

<?php //lấy người dùng  ?>
<table class='tblcontent chitietcv' border=0 width=100% cellspacing=0 cellpadding=0>
	<tr class=''>
		<td colspan=2>
			<?php  $ws = $task['Task']['status'];?>


			<?php if($task['Task']['done'] !=2){?>
				<?php if($idlastu['Usertask']['users_id'] == $this->Session->read('Auth.User.id')){?>
					<?=$this->Form->button("Chuyển việc",array('class'=>'btnlink','id'=>'dialog-link'));?>
					<?php if($ws!=1 && $task['Task']['done']==1 && $gr != "NS"){?>
						<?=$this->Form->button("Không duyệt",array('class'=>'btnlink','id'=>'khongduyet'));?>
						<?=$this->Form->button("Hoàn thành",array('class'=>'btnlink','id'=>'dialog-fn'));?>
					<?php }?>
				<?php }?>
			<?php }?>
				<?php if($task['Task']['done'] == 2){?>
					<p><?=$this->Html->link("Khởi tạo công việc mới",array('action'=>'add',$task['Task']['id']),array('class'=>'btnlink','id'=>'dialog'));?>
					</p>
				<?php }?>
		</td>
		<td colspan=2>
			Công việc liên quan
				

		</td>
	</tr>
	<tr class='tbody'>
		<td class=' ui-widget-header title' colspan=4>Chi tiết công việc</td>
	</tr>
	<tr class='tbody'>
		<td class='tDtite'><span class='text_tite'>Tên công việc:</span></td>
		<td><?php echo $task['Task']['name']; ?></td>
		<td class='tDtite'><span class='text_tite'>Folder lưu trữ:</span></td>
		<td><?php echo $task['Task']['folder']; ?></td>
	</tr>
	<tr class='tbody'>
		<td class='tDtite'><span class="text_tite">Nội dung công việc: </span></td>
		<td colspan=3><?php echo $task['Task']['name']; ?></td>
	</tr>
	<tr class='tbody'>
		<td class='tDtite'><span class=" ">Ngày bắt đầu :</span></td>
		<td width=150><?php echo date('d/m/Y',strtotime($task['Task']['start'])); ?></td>
		<td class='tDtite'><span class=" ">Ngày kết thúc :</span></td>
		<td><?php echo date('d/m/Y',strtotime($task['Task']['end'])); ?></td>
	</tr>
	<tr class='tbody'>
		<td class='tDtite'><span class=" ">Người giao việc :</span></td>
		<td width=150><?php echo  $task['User']['name']; ?></td>
		<td class='tDtite'><span class=" ">Nhân viên được giao :</span></td>
		<td>
			<?php foreach ($task['Usertask'] as $v) {

				  if($v['status'] == 2){
				  		$u = $this->requestAction('tasks/getNV/'.$v['users_id']);
				  		echo $u;
				  }
			}
			?>
		</td>
	</tr>
	<tr class='tbody'>
		<td class='tDtite'><span class=" ">Loại công việc :</span></td>
		<td><?php echo $task['Type']['name']; ?></td>
		<td class='tDtite'><span class=" ">Lĩnh vực :</span></td>
		<td><?php echo $task['Linhvuc']['name']; ?></td>
	</tr>
	<tr class='tbody'>

		<td class='tDtite'><span class=" ">Trạng thái :</span></td>
		<td><?php if($task["Task"]["status"] ==1){echo "Khởi tạo";}else{?>
				<?php echo $this->requestAction('tasks/getNV/'.$idlastu["Usertask"]["users_id"]);?>
				<?php if($task["Task"]["done"] ==1){ echo "đang xử lý";}?>
			<?php }?></td>
		<td class='tDtite'><span class="">Yêu cầu cần làm</span></td>
		<td width><font color="red">
			<?php
			if(!empty($task['Usertask']))
				{echo $task['Usertask'][count($task['Usertask'])-1]['noidung'];}
			?>

		</font></td>
	</tr>
	<tr class='tbody'>
		<td class='tDtite' colspan=4><span class=" ">Nội dung công việc</span></td>
	</tr>
	<tr class='tbody'>
		<td colspan=4><span class=" "><?php echo $task['Task']['content'];?></span></td>
	</tr>
	<tr class='tbody'>
		<td class=' ui-widget-header title' colspan=4>Văn bản</td>
	</tr>
	<tr class='tbody'>
		<td colspan=4>
			<table width=100% cellspacing=0 cellpadding=0>
				<tr class='tbody'>
					<td class="tDtite">Văn bản gốc</td>
					<td>
						<?php if(isset($task['Tfile']) && count($task['Tfile'])>0){
							foreach($task['Tfile'] as $fis):
								if($fis['type']==1){
									echo '- '.$this->Html->link($fis['name'],array('controller'=>'tasks','action'=>'download',base64_encode($fis['id']))).'<br>';
								}
							endforeach;
						}?>

					</td>
				</tr>
				<tr class='tbody'>
					<td class="tDtite">Văn bản dự thảo
						<?php if($idlastu['Usertask']['users_id'] == $this->Session->read('Auth.User.id') && $ws ==1){?>
						<li class="ui-state-default ui-corner-all addvbdt" id="vbdt" title=".ui-icon-circle-plus"><span class="ui-icon ui-icon-circle-plus"></span></li>
						<?php  }?>
					</td>
					<td>
						<?php if(isset($task['Tfile']) && count($task['Tfile'])>0){
							foreach($task['Tfile'] as $fis):
								if($fis['type']==2){
									echo '- '.$this->Html->link($fis['name'],array('controller'=>'tasks','action'=>'download',base64_encode($fis['id']))).'<br>';
								}
							endforeach;
						}?>
					</td>
				</tr>
				<tr class='tbody'>
					<td class="tDtite">Văn bản liên quan
						<?php if($idlastu['Usertask']['users_id'] == $this->Session->read('Auth.User.id') && $ws ==1){?>
						<li class="ui-state-default ui-corner-all addvbdt" id='vblq' title=".ui-icon-circle-plus"><span class="ui-icon ui-icon-circle-plus"></span></li>
						<?php }?>
					</td>
					<td>
						<?php if(isset($task['Tfile']) && count($task['Tfile'])>0){
							foreach($task['Tfile'] as $fis):
								if($fis['type']==3){
									echo '- '.$this->Html->link($fis['name'],array('controller'=>'tasks','action'=>'download',base64_encode($fis['id']))).'<br>';
								}
							endforeach;
						}?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr class='tbody'>
		<td class=' ui-widget-header title' colspan=4>Nhân sự tham gia xử lý</td>
	</tr>
	<tr align=center style='border-bottom: 1px solid #ace;'>
		<td class="tDtite" style='border-bottom: 1px solid #ace;'>Nhân sự</td>
		<td class="tDtite" style='border-bottom: 1px solid #ace;'>Nội dung chuyển</td>
		<td class="tDtite" style='border-bottom: 1px solid #ace;'>Ngày chuyển</td>
		<td class="tDtite" style='border-bottom: 1px solid #ace;'>Ngày xem</td>
	</tr>
	<?php foreach ($task['Usertask'] as $v) {
	  		$ud = $this->requestAction('tasks/getNV/'.$v['users_id']);
	  		$uc = $this->requestAction('tasks/getNV/'.$v['users_chuyen']);?>
	  		<tr class='tbody'>
				<td><?php echo $uc.'   <font color=red>&minus;&minus;> </font>  '. $ud;?></td>
				<td><?php echo $v['noidung'];?></td>
				<td align=center><?php
				if(!empty($v['ngay']) && $v['ngay'] !="0000-00-00 00:00:00")
				 	echo date('h:i:s  d/m/Y',strtotime($v['ngay']));
				else echo '--';
				?></td>
				<td align=center><?php
					if(!empty($v['datexem']) && $v['datexem'] !="0000-00-00 00:00:00")
				 		echo date('h:i:s  d/m/Y',strtotime($v['datexem']));
					else echo '--';
				?></td>
			</tr>
	<?php
	}
	?>
</table>


<!-- dialog -->
<?php if($task['Task']['done'] !=2){?>
<div id="dialog" title="Chuyển việc cho nhân viên">
	<?php $groups =  $this->requestAction("tasks/listPBgv");?>
	<form method="post" action="dochange">
		<?php $i=0; foreach($groups as $group):$i++;?>
		<div class='block'>
		<div id="parent<?=$i;?>" onclick="show(<?=$i;?>)" class="parent">
				<?php echo $this->Html->image('add.png',array('id'=>'img'.$i,'class'=>'as'));?>

				<?php echo $this->Html->tag('span',$group['Group']['name'], array('class' => 'welcome'));?>
				<?php //echo $group['Group']['name'];?>
		</div>
		<div class="child" id='child<?=$i;?>' style='display:none;'>
				<?php $listNSs =  $this->requestAction("tasks/listns/".$group['Group']['id']);?>
				<?php foreach($listNSs as $listNS):?>
					<p>
						<?php echo $this->Html->image('elbow.gif',array('class'=>'as last'.$i));?>
						<?php echo $this->Html->image('sub.png',array('class'=>'as'));?>
						<?php echo $this->Form->input('idu',array('type'=>'checkbox','value'=>$listNS['User']['id'],'label'=>$listNS['User']['name'],'div'=>false));?>
					</p>
					<?php endforeach;?>
		</div>
		</div>
		<?php endforeach;?>
		<div class="block"><textarea name="noidungcv" placeholder="Nội dung chuyển" id="noidungcv"></textarea></div>
</form>
</div>
<?php  }?>

<?php if($idlastu['Usertask']['users_id'] == $this->Session->read('Auth.User.id') && $ws ==1){?>

<div id="dialog_vbdt" title="Thêm văn bản dự thảo">
<form method="post" name='fform' enctype="multipart/form-data">
	<input type="file" name="fileid" id="fileid" multiple />
</form>
<div id='response' style='font-size: 12px;'></div>
</div>
<div id="dialog-vblq" title="Thêm văn bản liên quan">
 <form method="post" enctype="multipart/form-data">
	<input type="file" name="filek" id="filek" multiple />
</form>
<div id='response1' style='font-size: 12px;'></div>
</div>
<?php }?>
<?php if($idlastu['Usertask']['users_id'] == $this->Session->read('Auth.User.id')){?>
<div id="dialog-fail" title="Yêu cầu làm lại công việc">
	<?php $nsfail = $this->requestAction('tasks/getNVFail/'.$task['Task']['id'].'/'.$ws);?>
	<form method='post' name='ffail'>
		<label for="">Lý do làm lại</label>
		<textarea name="lydo" id="lydoID" cols="30" rows="10"></textarea>
	</form>

</div>
<?php  }?>
<script type="text/javascript">
	var title = "Quản lý công việc";
	<?php if($task['Task']['done'] !=2){?>
	$( "#dialog-link" ).click(function( event ) {
			$( "#dialog" ).dialog( "open" );
			event.preventDefault();
	});
	$( "#dialog" ).dialog({
		autoOpen: false,
		width: 400,
		buttons: [
			{
				text: "Chuyển việc",
				click: function() {
					var $rthis = $(this);
					var $obj = $('.child input[type=checkbox]');
					var ndvn = $("#noidungcv").val();
					//alert(ndvn);
					if($obj.filter(':checked').length <=0) return alert("Bạn chưa chọn nhân viên");
					if(confirm("Bạn có chắc muốn chuyển giao công việc cho nhân viên vừa chọn ?")){
					 	var str = "";
						for(d=0;d<$obj.length;d++){
							if($obj[d].checked == true) str+=$obj[d].value+',';
						}
						str = str.substr(0,str.length-1);
						$.get("<?php echo $this->webroot;?>tasks/change/<?=base64_encode($task['Task']['id']);?>/"+"<?=base64_encode(2);?>"+"/"+str+"/"+ndvn, function(data){
						   if(data == 2) {

						   window.location.reload();
						   alert('Đã chuyển việc thành công !');
						   $rthis.dialog("close");
						}
						   else alert("Có lỗi xảy ra. Hãy thử lại!");
						 });
					}
				}
			},
			{
				text: "Đóng lại",
				click: function() {
					$( this ).dialog( "close" );
				}
			}
		]

	});
<?PHP }?>
</script>

<script type='text/javascript'>
	function show(id){
		var x = $('#child'+id).css('display');
		if(x !='none'){
			$('#child'+id).css('display','none');
			$('#img'+id).attr('src', '../../img/add.png' );
		}else{
			$('#child'+id).css('display','block');
			$('#img'+id).attr('src', '../../img/sub.png' );
		}
	}

	$(document).ready(function () {
 		 var u = $('.parent').size();
			for(g=1;g<=u;g++){
				$('img.last'+g+':last').attr('src', '../../img/elbow-end.gif' );
			}
	});
</script>
<?php if($idlastu['Usertask']['users_id'] == $this->Session->read('Auth.User.id') && $ws ==1){?>
<script>
//văn bản dự thảo
	$( "#vbdt" ).click(function( event ) {
			$( "#dialog_vbdt" ).dialog( "open" );
			event.preventDefault();
	});
	$( "#dialog_vbdt" ).dialog({
		autoOpen: false,
		width: 400,
		buttons: [
			{
				text: "Upload",
				click: function() {
					var fileInput = document.getElementById('fileid');
					if(fileInput.value == "") return alert('Bạn chưa chọn file');
					if(confirm("Bạn có chắc muốn upload các file vừa chọn không ?")){
						document.getElementById("response").innerHTML = "Đang upload file. Hãy chờ...";
						var formData = new FormData();
						for(i=0;i<fileInput.files.length;i++){
							formData.append('fileid[]', fileInput.files[i]);
						}
						$.ajax({
							url: "<?=$this->webroot;?>tasks/addfile/<?=base64_encode($task['Task']['id']);?>/<?=base64_encode(2);?>",
							type: "POST",
							data: formData,
							processData: false,
							contentType: false,
							success: function (res) {
								document.getElementById("response").innerHTML = "Đã upload xong!";
								if(res==1) alert('Có lỗi xảy ra trong quá trình upload. Hãy kiểm tra lại');
								else{alert("Upload thành công!");window.location.reload();$( this ).dialog( "close");}
							}
						});
					}
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



<script>
//văn bản lienquan
	$( "#vblq" ).click(function( event ) {
			$( "#dialog-vblq" ).dialog( "open" );
			event.preventDefault();
	});
	$( "#dialog-vblq" ).dialog({
		autoOpen: false,
		width: 400,
		buttons: [
			{
				text: "Upload",
				click: function() {
					var fileInput = document.getElementById('filek');
					if(fileInput.value == "") return alert('Bạn chưa chọn file');
					if(confirm("Bạn có chắc muốn upload các file vừa chọn không ?")){

						document.getElementById("response").innerHTML = "Đang upload file. Hãy chờ...";
						var formData = new FormData();
						for(i=0;i<fileInput.files.length;i++){
							formData.append('fileid[]', fileInput.files[i]);
						}
						$.ajax({
							url: "<?=$this->webroot;?>tasks/addfile/<?=base64_encode($task['Task']['id']);?>/<?=base64_encode(3);?>",
							type: "POST",
							data: formData,
							processData: false,
							contentType: false,
							success: function (res) {
								document.getElementById("response1").innerHTML = "Đã upload xong!";
								if(res==1) alert('Có lỗi xảy ra trong quá trình upload. Hãy kiểm tra lại');
								else{alert("Upload thành công!");window.location.reload();$( this ).dialog( "close");}
							}
						});
					}
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
<?php }?>



<script>
//trả lại nhân viên làm sai
	$( "#khongduyet" ).click(function( event ) {
			$( "#dialog-fail" ).dialog( "open" );
			event.preventDefault();
	});
	$( "#dialog-fail" ).dialog({
		autoOpen: false,
		width: 400,
		buttons: [
			{
				text: "Đồng ý",
				click: function() {
					//var $rthis = $(this);
					var obj = window.document.ffail.lydo.value;
					if(confirm("Bạn có chắc muốn trả lại công việc này ?")){
						$.get("<?php echo $this->webroot;?>tasks/failtask/<?=$nsfail;?>/<?=base64_encode($task['Task']['id']);?>/"+"<?=base64_encode($ws);?>"+"/"+obj, function(data){
								if(data == 2) {
								   window.location.reload();
								   alert('Chuyển thành công !');
								}else alert("Có lỗi xảy ra. Hãy thử lại!");
						 });
					}
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
<script>

	$("#dialog-fn").click(function(){
		$.get('<?php echo $this->webroot;?>tasks/fntask/<?php echo $task["Task"]["id"]."/".$idlastu["Usertask"]["users_id"];?>',function(){
				window.location.reload();
		});
	});
</script>