<?php echo $this->Form->create('Position');

		echo $this->Form->input('name',array('label'=>"Tên chức vụ"));
		echo $this->Form->input('note',array('label'=>"Ghi chú"));
		//echo $this->Form->input('groups_id',array('label'=>"Chọn phòng ban"));
		echo $this->Form->input('order',array('label'=>"Thứ tự"));
		echo $this->Form->label("Chọn phòng ban");
		echo "</br>";
		$ars = array();
        if(!empty($pos_group)){
		   foreach($pos_group as $v){
				$ars[] = $v['PositionsGroup']['groups_id'];
			}
		}
		echo $this->Form->input('groups_id',array(
			'type'=>'select',
			'multiple'=>'checkbox',
			'options'=>$groups,
			'label'=>false,
			'selected'=> $ars
			)
		);
	// debug($groups);	
echo $this->Form->end(__('Lưu', true));?>


<script type="text/javascript">
	var title= "Sửa chức vụ";
</script>