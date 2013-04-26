<table   class="paging"><tr>
<td valign='middle' align='left' width=300>
<?php echo $this->Form->hidden('chon',array('name'=>'chon'))?>
<p><?php echo $this->Html->link('Xóa các mục đã chọn','javascript: void(0);',array('onclick'=>'return check();'));?></p>
</td>

<td align='right'  width=500 valign='middle'>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Trang %page% trong tổng số %pages% trang', true)
	));
	?>

	<div style='float: right;display: inline;'>
		<?php echo $this->Paginator->prev(  __('Trang trước', true), array(), null, array('class'=>'disabled'));?>
	  	<?php echo $this->Paginator->numbers();?>
		<?php echo $this->Paginator->next(__('Trang sau', true)  , array(), null, array('class' => 'disabled'));?>
	</div>
</td></tr>
</table>