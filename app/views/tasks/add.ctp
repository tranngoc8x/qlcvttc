<div class="tasks form">
<?php
	echo $this->Form->create('Task',array('type'=>'file'));
	echo $this->Form->hidden('idcv',array('value'=>$ido));
	echo $this->Form->input('taskid',array('label'=>'Mã công việc'));
	echo $this->Form->input('name',array('label'=>'Tên công việc'));
	echo $this->Form->input('content',array('label'=>'Nội dung công việc'));
	echo $this->Form->input('start',array('label'=>'Ngày bắt đầu','type'=>'text','placeholder'=>'Bấm để chọn ngày','value'=>"",'readonly'=>1,'class'=>'input-short datepicker'));
	echo $this->Form->input('end',array('label'=>'Ngày kết thúc','type'=>'text','placeholder'=>'Bấm để chọn ngày','value'=>"",'readonly'=>1,'class'=>'input-short datepicker'));
	echo $this->Form->input('types_id',array('label'=>'Loại công việc'));
	echo $this->Form->input('linhvucs_id',array('label'=>'Lĩnh vực'));
?>

 <?php
 	if(!empty($oldt['Tfile'])){
 		echo "<div class='input'>";
 		echo $this->Html->tag('label','File đính kèm của công việc trước');
		foreach ($oldt['Tfile'] as $key => $value)
		if($value['type']!=12){
			echo "<div id='iputFile{$key}'>";
			echo '- '.$this->Html->link($value['name'],array('controller'=>'tasks','action'=>'download',base64_encode($value['id']))).'&nbsp;&nbsp;<img valign="bottom" src="'.$this->webroot.'img/1364995541_delete.png" class="imgFileDel" alt="'.$key.'" /><br>';
			echo $this->Form->hidden("fold. ",array('value'=>$value['name']));
			echo "</div>";
			//debug($value);
		}
		echo "</div>";
 	}

 ?>
<?php
	echo $this->Form->input('files. ',array('name'=>'files[]','label'=>'File văn bản','type'=>'file','multiple'=>true));
	echo $this->Form->input("folder",array('label'=>"Thư mục lưu trữ bản cứng công việc"));
	echo $this->Form->end(__('Lưu lại', true));
?>
<script type="text/javascript">
	var title = "Quản lý công việc";
</script>

<?php
//debug($oldt);
?>

<script>
	$(".imgFileDel").click(function(event){
		var k = $(this).prop('alt');
			$("#iputFile"+k).remove();
	});
	$('#TaskAddForm').submit(function() {
		$('#onloadding').show();
	});

</script>