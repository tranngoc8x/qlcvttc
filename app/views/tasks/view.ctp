<style>
	#dialog img.as{ display: inline-table; vertical-align: top;}
	.parent{cursor:pointer;}
	.block{padding: 5px 0 0;border-bottom: 1px dotted #ddd; }
</style>
<table class='tblcontent chitietcv' border=0 width=100% cellspacing=0 cellpadding=0>
	<tr class=' '>
		<td colspan=4>
			<?php  $ws = $task['Task']['status'];?>
			<?php if($ws==1){?>
			<?=$this->Form->button("Giao việc",array('class'=>'btnlink','id'=>'dialog-link'));?>
			<?php }elseif($ws==2){?>
			<?=$this->Form->button("Trình ban quản lý",array('class'=>'btnlink','id'=>'dialog-link'));?>
			<?php }elseif($ws==3){?>
			<?=$this->Form->button("Trình PGD điều hành",array('class'=>'btnlink','id'=>'dialog-link'));?>
			<?php }elseif($ws==4){?>
			<?=$this->Form->button("Chuyển PGD tài chính",array('class'=>'btnlink','id'=>'dialog-link'));?>
			<?php }elseif($ws==5){?>
			<?=$this->Form->button("Chuyển kế toán",array('class'=>'btnlink','id'=>'dialog-link'));?>
			<?php }elseif($ws==6){?>
			<?=$this->Form->button("Trình giám đốc",array('class'=>'btnlink','id'=>'dialog-link'));?>
			<?php }elseif($ws==7){?>
			<?=$this->Form->button("Gửi trả kế toán",array('class'=>'btnlink','id'=>'dialog-link'));?>
			<?php }elseif($ws==8){?>
			<?=$this->Form->button("Gửi trả ban quản lý",array('class'=>'btnlink','id'=>'dialog-link'));?>
			<?php }elseif($ws==9){?>
			<?=$this->Form->button("Gửi trả kết quả cho nhân sự",array('class'=>'btnlink','id'=>'dialog-link'));?>
			<?php }?>
		</td>
	</tr>
	<tr class='tbody'>
		<td class=' ui-widget-header title' colspan=4>Chi tiết công việc</td>
	</tr>
	<tr class='tbody'>
		<td class='tDtite'><span class='text_tite'>Tên công việc:</span></td>
		<td colspan=3><?php echo $task['Task']['name']; ?></td>
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
				  		echo $u['User']['name'];
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
		<td><?php echo stt(base64_encode($task['Task']['status'])); ?></td>
		<td class='tDtite'><span class=" "> </span></td>
		<td width=> </td>
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
						<li class="ui-state-default ui-corner-all addvbdt" id="vbdt" title=".ui-icon-circle-plus"><span class="ui-icon ui-icon-circle-plus"></span></li>
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
						<li class="ui-state-default ui-corner-all addvbdt" id='vblq' title=".ui-icon-circle-plus"><span class="ui-icon ui-icon-circle-plus"></span></li>
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
 	<tr class='tbody'>
		<td><?php echo $task['User']['name'];?></td>
		<td colspan=3>Nhân sự khởi tạo công việc</td>
	</tr>
	<?php foreach ($task['Usertask'] as $v) {
			 	
		if($v['status'] != 1){
	  		$u = $this->requestAction('tasks/getNV/'.$v['users_id']);?>
	  		<tr class='tbody'>
				<td><?php echo $u['User']['name'];?></td>
				<td colspan=3><?php echo work(base64_encode($v['status']));?></td>
			</tr>
	<?php	  		
		}
	}
	?>
</table>


<!-- dialog -->
<?php if($ws==1){?>
<div id="dialog" title="Giao việc cho nhân viên">
	<?php $groups =  $this->requestAction("tasks/listPBgv/1");?>
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
					<?php //echo $listNS['User']['name'];?>
					<?php endforeach;?>
		</div>
		</div>
		<?php endforeach;?>
</form>
</div>
<?php }elseif($ws==2){?>
<div id="dialog" title="Trình báo công việc cho ban quản lý">
	<?php $groups =  $this->requestAction("tasks/listPBgv/2");?>
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
					<?php //echo $listNS['User']['name'];?>
					<?php endforeach;?>
		</div>
		</div>
		<?php endforeach;?>
</form>
</div>

<?php }elseif($ws==3){?>
<div id="dialog" title="Trình PGD điều hành">
	<?php $groups =  $this->requestAction("tasks/listPBgv/3");?>
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
					<?php //echo $listNS['User']['name'];?>
					<?php endforeach;?>
		</div>
		</div>
		<?php endforeach;?>
</form>
</div>

<?php }elseif($ws==4){?>
<div id="dialog" title="Chuyển PGD tài chính">
	<?php $groups =  $this->requestAction("tasks/listPBgv/3");?>
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
					<?php //echo $listNS['User']['name'];?>
					<?php endforeach;?>
		</div>
		</div>
		<?php endforeach;?>
</form>
</div>

<?php }elseif($ws==5){?>
<div id="dialog" title="Chuyển kế toán">
	<?php $groups =  $this->requestAction("tasks/listPBgv/4");?>
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
					<?php //echo $listNS['User']['name'];?>
					<?php endforeach;?>
		</div>
		</div>
		<?php endforeach;?>
</form>
</div>
<?php }elseif($ws==6){?>
<div id="dialog" title="Trình giám đốc">
	<?php $groups =  $this->requestAction("tasks/listPBgv/5");?>
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
					<?php //echo $listNS['User']['name'];?>
					<?php endforeach;?>
		</div>
		</div>
		<?php endforeach;?>
</form>
</div>
<?php }elseif($ws==7){?>
<div id="dialog" title="Thông báo cho kế toán">
	<?php $groups =  $this->requestAction("tasks/listPBgv/4");?>
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
					<?php //echo $listNS['User']['name'];?>
					<?php endforeach;?>
		</div>
		</div>
		<?php endforeach;?>
</form>
</div>
<?php }elseif($ws==8){?>
<div id="dialog" title="Gửi trả ban quản lý">
	<?php $groups =  $this->requestAction("tasks/listPBgv/6");?>
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
					<?php //echo $listNS['User']['name'];?>
					<?php endforeach;?>
		</div>
		</div>
		<?php endforeach;?>
</form>
</div>
<?php }elseif($ws==9){?>
<div id="dialog" title="Gửi trả kết quả công việc cho nhân sự">
	<?php $groups =  $this->requestAction("tasks/listPBgv/7");?>
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
					<?php //echo $listNS['User']['name'];?>
					<?php endforeach;?>
		</div>
		</div>
		<?php endforeach;?>
</form>
</div>
<?php }?>



<div id="dialog_vbdt" title="Thêm văn bản dự thảo">
<form method="post" enctype="multipart/form-data">
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
<script type="text/javascript">
	var title = "Quản lý công việc";
	$( "#dialog-link" ).click(function( event ) {
			$( "#dialog" ).dialog( "open" );
			event.preventDefault();
	});
	<?php if($ws==1){?>
	$( "#dialog" ).dialog({
		autoOpen: false,
		width: 400,
		buttons: [
			{
				text: "Giao việc",
				click: function() {
					var $rthis = $(this);
					var $obj = $('.child input[type=checkbox]');
					if($obj.filter(':checked').length <=0) return alert("Bạn chưa chọn nhân viên");
					if(confirm("Bạn có chắc muốn giao việc cho nhân viên vừa chọn ?")){
					 	var str = "";
						for(d=0;d<$obj.length;d++){
							if($obj[d].checked == true) str+=$obj[d].value+',';
						}
						str = str.substr(0,str.length-1);
						$.get("<?php echo $this->webroot;?>tasks/change/"+<?=$task['Task']['id'];?>+"/"+"<?=base64_encode(2);?>"+"/"+str, function(data){
						   if(data == 2) {
						   
						   window.location.reload();
						   alert('Đã giao việc thành công !');
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
	<?php }elseif($ws==2){?>
	$( "#dialog" ).dialog({
		autoOpen: false,
		width: 400,
		buttons: [
			{
				text: "Báo cáo ban quản lý",
				click: function() {
					var $rthis = $(this);
					var $obj = $('.child input[type=checkbox]');
					if($obj.filter(':checked').length <=0) return alert("Bạn chưa chọn nhân viên");
					if(confirm("Bạn có chắc muốn thông báo cho ban quản lý công việc này ?")){
					 	var str = "";
						for(d=0;d<$obj.length;d++){
							if($obj[d].checked == true) str+=$obj[d].value+',';
						}
						str = str.substr(0,str.length-1);
						$.get("<?php echo $this->webroot;?>tasks/change/"+<?=$task['Task']['id'];?>+"/"+"<?=base64_encode(3);?>"+"/"+str, function(data){
						   if(data == 2) {
						   window.location.reload();
						   alert('Thông báo thành công !');
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
	<?php }elseif($ws==3){?>
	$( "#dialog" ).dialog({
		autoOpen: false,
		width: 400,
		buttons: [
			{
				text: "Trình PGD điều hành",
				click: function() {
					var $rthis = $(this);
					var $obj = $('.child input[type=checkbox]');
					if($obj.filter(':checked').length <=0) return alert("Bạn chưa chọn nhân viên");
					if(confirm("Bạn có chắc muốn trình báo cho cấp trên công việc này ?")){
					 	var str = "";
						for(d=0;d<$obj.length;d++){
							if($obj[d].checked == true) str+=$obj[d].value+',';
						}
						str = str.substr(0,str.length-1);
						$.get("<?php echo $this->webroot;?>tasks/change/"+<?=$task['Task']['id'];?>+"/"+"<?=base64_encode(4);?>"+"/"+str, function(data){
						   if(data == 2) {
						   window.location.reload();
						   alert('Trình thành công !');
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
	<?php }elseif($ws==4){?>
	$( "#dialog" ).dialog({
		autoOpen: false,
		width: 400,
		buttons: [
			{
				text: "Chuyển PGD tài chính",
				click: function() {
					var $rthis = $(this);
					var $obj = $('.child input[type=checkbox]');
					if($obj.filter(':checked').length <=0) return alert("Bạn chưa chọn nhân viên");
					if(confirm("Bạn có chắc muốn thông báo công việc này ?")){
					 	var str = "";
						for(d=0;d<$obj.length;d++){
							if($obj[d].checked == true) str+=$obj[d].value+',';
						}
						str = str.substr(0,str.length-1);
						$.get("<?php echo $this->webroot;?>tasks/change/"+<?=$task['Task']['id'];?>+"/"+"<?=base64_encode(5);?>"+"/"+str, function(data){
						   if(data == 2) {
						   window.location.reload();
						   alert('Chuyển thành công !');
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
	<?php }elseif($ws==5){?>
	$( "#dialog" ).dialog({
		autoOpen: false,
		width: 400,
		buttons: [
			{
				text: "Chuyển kế toán",
				click: function() {
					var $rthis = $(this);
					var $obj = $('.child input[type=checkbox]');
					if($obj.filter(':checked').length <=0) return alert("Bạn chưa chọn nhân viên");
					if(confirm("Bạn có chắc muốn thông báo công việc này ?")){
					 	var str = "";
						for(d=0;d<$obj.length;d++){
							if($obj[d].checked == true) str+=$obj[d].value+',';
						}
						str = str.substr(0,str.length-1);
						$.get("<?php echo $this->webroot;?>tasks/change/"+<?=$task['Task']['id'];?>+"/"+"<?=base64_encode(6);?>"+"/"+str, function(data){
						   if(data == 2) {
						   window.location.reload();
						   alert('Chuyển thành công !');
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
	<?php }elseif($ws==6){?>
	$( "#dialog" ).dialog({
		autoOpen: false,
		width: 400,
		buttons: [
			{
				text: "Trình giám đốc",
				click: function() {
					var $rthis = $(this);
					var $obj = $('.child input[type=checkbox]');
					if($obj.filter(':checked').length <=0) return alert("Bạn chưa chọn nhân sự");
					if(confirm("Bạn có chắc muốn thông báo công việc này ?")){
					 	var str = "";
						for(d=0;d<$obj.length;d++){
							if($obj[d].checked == true) str+=$obj[d].value+',';
						}
						str = str.substr(0,str.length-1);
						$.get("<?php echo $this->webroot;?>tasks/change/"+<?=$task['Task']['id'];?>+"/"+"<?=base64_encode(7);?>"+"/"+str, function(data){
						   if(data == 2) {
						   window.location.reload();
						   alert('Chuyển thành công !');
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
	<?php }elseif($ws==7){?>
	$( "#dialog" ).dialog({
		autoOpen: false,
		width: 400,
		buttons: [
			{
				text: "Gửi lại kế toán",
				click: function() {
					var $rthis = $(this);
					var $obj = $('.child input[type=checkbox]');
					if($obj.filter(':checked').length <=0) return alert("Bạn chưa chọn nhân sự");
					if(confirm("Bạn có chắc muốn thông báo công việc này ?")){
					 	var str = "";
						for(d=0;d<$obj.length;d++){
							if($obj[d].checked == true) str+=$obj[d].value+',';
						}
						str = str.substr(0,str.length-1);
						$.get("<?php echo $this->webroot;?>tasks/change/"+<?=$task['Task']['id'];?>+"/"+"<?=base64_encode(8);?>"+"/"+str, function(data){
						   if(data == 2) {
						   window.location.reload();
						   alert('Chuyển thành công !');
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
	<?php }elseif($ws==8){?>
	$( "#dialog" ).dialog({
		autoOpen: false,
		width: 400,
		buttons: [
			{
				text: "Gửi trả ban quản lý",
				click: function() {
					var $rthis = $(this);
					var $obj = $('.child input[type=checkbox]');
					if($obj.filter(':checked').length <=0) return alert("Bạn chưa chọn nhân sự");
					if(confirm("Bạn có chắc muốn thông báo công việc này ?")){
					 	var str = "";
						for(d=0;d<$obj.length;d++){
							if($obj[d].checked == true) str+=$obj[d].value+',';
						}
						str = str.substr(0,str.length-1);
						$.get("<?php echo $this->webroot;?>tasks/change/"+<?=$task['Task']['id'];?>+"/"+"<?=base64_encode(9);?>"+"/"+str, function(data){
						   if(data == 2) {
						   window.location.reload();
						   alert('Chuyển thành công !');
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
	<?php }elseif($ws==9){?>
	$( "#dialog" ).dialog({
		autoOpen: false,
		width: 400,
		buttons: [
			{
				text: "Gửi trả kết quả",
				click: function() {
					var $rthis = $(this);
					var $obj = $('.child input[type=checkbox]');
					if($obj.filter(':checked').length <=0) return alert("Bạn chưa chọn nhân sự");
					if(confirm("Bạn có chắc muốn thông báo công việc này ?")){
					 	var str = "";
						for(d=0;d<$obj.length;d++){
							if($obj[d].checked == true) str+=$obj[d].value+',';
						}
						str = str.substr(0,str.length-1);
						$.get("<?php echo $this->webroot;?>tasks/change/"+<?=$task['Task']['id'];?>+"/"+"<?=base64_encode(10);?>"+"/"+str, function(data){
						   if(data == 2) {
						   window.location.reload();
						   alert('Chuyển thành công !');
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
	<?php }?>
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