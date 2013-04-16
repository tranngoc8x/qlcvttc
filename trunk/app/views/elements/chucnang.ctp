<?php //if($this->Access->check($this->name,'add'))
{ ?>

<table align='right' width="" class="chucnang">
  <tbody>
    <tr>
    	<?php if($this->name == 'Task'){?>
      <td align="center" width=120>
		<?php echo $this->Html->link($this->Html->image('admin/dels-item.png', array('alt' => 'Add')),'javascript: void(0);',array('escape' => false,'onclick'=>'return check();','class'=>'delitems'));?>
		</td>
		<?php }?>
		 <td align="center">
			<?php
			echo $this->Html->link(
			$this->Html->image('admin/add-item.png', array('alt' => 'Add')),
			array('action'=>'add'),array('escape' => false));

		?>
		</td>
	</tr>
	<tr>
		<?php if($this->name == 'Task'){?>
		<td align="center">
			<?php
			echo $this->Html->link('Xóa các mục','javascript: void(0);',array('escape' => false,'onclick'=>'return check();','class'=>'delitems'));?>
		</td>
		<?php }?>
		<td align="center">
			<?php
			echo $this->Html->link('Thêm mới',array('action'=>'add'),array('class'=>'Link_Text_12_black'));
		?>
		</td>
      </tr>
  </tbody>
  <tr><td colspan=2>&nbsp;</td></tr>
</table>
<?php }?>