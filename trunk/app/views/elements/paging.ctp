<div class="paging">
	<?php echo $this->Html->link('Xóa các mục đã chọn','javascript: void(0);',array('onclick'=>'return check();','class'=>'delitems'));?>
	<?php
		echo $this->Paginator->first(__("«"), array('class' => 'first'));
		echo $this->Paginator->prev(__("<"), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__(">"), array(), null, array('class' => 'next disabled'));
		echo $this->Paginator->last(__("»"), array('class' => 'last'));
	?>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Trang {:page}/{:pages}, đang xem {:current} bản ghi trong tổng số {:count} bản ghi. Bắt đầu từ bản ghi số {:start} đến bản ghi số {:end}.')
	));
	//, '
	?>
</p>
</div>