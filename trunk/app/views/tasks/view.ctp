<table class='tblcontent' border=0 width=100% cellspacing=0 cellpadding=0>
	<tr class='tbody'>
		<td><?=$this->Form->button("Giao việc",array('class'=>'btnlink','id'=>'dialog-link'));?></td>
	</tr>
	<tr class='tbody' colspan=4>
		<td class='title'>Chi tiết công việc</td>
	</tr>
	<tr class='tbody' colspan=4>
		<td class='tDtite'><span >Tên công việc:</span>&nbsp;&nbsp;&nbsp;<?php echo $task['Task']['name']; ?></td>
	</tr>	
	<tr class='tbody' colspan=4>
		<td class='tDtite'><span class=" ">Nội dung công việc</span>&nbsp;&nbsp;&nbsp;<?php echo $task['Task']['name']; ?></td>
	</tr>
	<tr class='tbody'>
		<td class='tDtite'><span class=" ">Ngày bắt đầu :</span></td>
		<td><?php echo date('d/m/Y',strtotime($task['Task']['start'])); ?></td>
		<td class='tDtite'><span class=" ">Ngày kết thúc :</span></td>
		<td><?php echo date('d/m/Y',strtotime($task['Task']['end'])); ?></td>
	</tr>
</table>

<style>
	#dialog img.as{ display: inline-table; vertical-align: top;}
	.parent{cursor:pointer;}
	.block{padding: 5px 0 0;border-bottom: 1px dotted #ddd; }
</style>
<!-- 'action'=>'change',$task['Task']['id'] -->
<div id="dialog" title="Giao việc cho nhân viên">
	<?php $groups =  $this->requestAction("tasks/listPBgv");?>

	<?php echo $this->Form->create('Task',array('action'=>'dochange'));?>
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
	<?php $this->Form->end();?>
</div>

<script type="text/javascript">
	var title = "Quản lý công việc";
	$( "#dialog-link" ).click(function( event ) {
			$( "#dialog" ).dialog( "open" );
			event.preventDefault();
	});
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
						$.get("<?php echo $this->webroot;?>tasks/change/"+<?=$task['Task']['id'];?>+"/"+2+"/"+str, function(data){
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
		
</script>
<script type='text/javascript'>
	$(document).ready(function () {
 		 var u = $('.parent').size();
			for(g=1;g<=u;g++){
				$('img.last'+g+':last').attr('src', '../../img/elbow-end.gif' );	
			}
	});
</script>