<div class="linhvucs form">
<?php echo $this->Form->create('Linhvuc');?>
	<fieldset>
		
	<?php
		echo $this->Form->input('name',array('label'=>'Tên'));
		echo $this->Form->input('note',array('label'=>'Chú thích'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Lưu', true));?>
</div>
<script> var title= "Thêm lĩnh vực";</script>