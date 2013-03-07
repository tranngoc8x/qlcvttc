<table width='100%' border=0 class='Text_12_black' cellpadding=0 cellspacing=0>
<tr><td width='50%' valign='top' rowspan=2>
<div class='ul-news'>
	<span class='news-title-h'><span>&bull;&nbsp;Thông tin đăng nhập</span></span>
	<ul>
		<li>Xin chào : <?php echo $ssid['User']['name'];?></li>
		<li>
			Lần đăng nhập gần đây nhất của bạn vào lúc: 
			<?php echo $this->Time->format('h:i:s - d/m/Y',$los[0]['logs']['time']);?>
		</li>
		<li>
			Tại địa chỉ :<?php echo $los[0]['logs']['ipadr'];?>
		</li>
	
	</ul>
       
	<div style='clear: both;'></div>
</div>
	<div style='clear: both;margin-bottom:2px;'></div>
<div class='ul-news'>
	<span class='news-title-h'><span>&bull;&nbsp;Liên kết nhanh</span></span>
		<table id='quicklink' border=0 width='100%' align='center'>
		<tr><td align='center' valign='middle'>
		<?php
			echo $this->Html->link(
			$this->Html->image('admin/add-img.png', array('title' => 'Thêm mới danh mục bài viết')),
			array('controller'=>'catenews','action'=>'add'),array('escape' => false));
			echo '<br/>';
			echo $this->Html->link('Thêm mới danh mục bài viết',array('controller'=>'catenews','action'=>'add'),array('class'=>'Link_Text_12_black'));
		?>
		</td>
		<td align='center' valign='middle' style='border-right: 0;'>
		<?php
			echo $this->Html->link(
			$this->Html->image('admin/add-img.png', array('title' => 'Thêm mới bài viết')),
			array('controller'=>'news','action'=>'add'),array('escape' => false));
			echo '<br/>';
			echo $this->Html->link('Thêm mới bài viết',array('controller'=>'news','action'=>'add'),array('class'=>'Link_Text_12_black'));
		?>
		</td>
		</tr>
		<tr><td align='center' valign='middle'>
		<?php
			echo $this->Html->link(
			$this->Html->image('admin/add-img.png', array('title' => 'Thêm mới thông báo')),
			array('controller'=>'notices','action'=>'add'),array('escape' => false));
			echo '<br/>';
			echo $this->Html->link('Thêm mới thông báo',array('controller'=>'notices','action'=>'add'),array('class'=>'Link_Text_12_black'));
		?>
		</td>
		<td align='center' valign='middle' style='border-right: 0;'>
		<?php
			echo $this->Html->link(
			$this->Html->image('admin/add-img.png', array('title' => 'Thêm mới thư viện ảnh')),
			array('controller'=>'galleries','action'=>'add'),array('escape' => false));
			echo '<br/>';
			echo $this->Html->link('Thêm mới thư viện ảnh',array('controller'=>'galleries','action'=>'add'),array('class'=>'Link_Text_12_black'));
		?>
		</td>
		</tr>
		<tr><td align='center' valign='middle' style='border-bottom: 0;'>
		<?php
			echo $this->Html->link(
			$this->Html->image('admin/list-contact.png', array('title' => 'Quản lý liên hệ')),
			array('controller'=>'contacts','action'=>'index'),array('escape' => false));
			echo '<br/>';
			echo $this->Html->link('Quản lý liên hệ',array('controller'=>'contacts','action'=>'index'),array('class'=>'Link_Text_12_black'));
		?>
		</td>
		<td align='center' style='border: 0;' valign='middle'>
			<?php
			echo $this->Html->link(
			$this->Html->image('admin/list-users.png', array('title' => 'Quản lý người dùng')),
			array('controller'=>'users','action'=>'index'),array('escape' => false));
			echo '<br/>';
			echo $this->Html->link('Quản lý người dùng',array('controller'=>'users','action'=>'index'),array('class'=>'Link_Text_12_black'));
		?>
		</td>
		</tr>
		</table>
	<div style='clear: both;'></div>
</div>

</td>
<td valign='top'>
<div class='ul-news'>
	<span class='news-title-h'><?php echo $this->Html->link('&bull;&nbsp;Các bài viết mới đăng',array('controller'=>'news','action'=>'index'),array('escape'=>false));?></span>
	<ul>
	<?php
		/*foreach($newsadmin as $newsad):
		echo '<li>';
		echo $this->Html->link(mb_substr($newsad['News']['title'],0,60),array('controller'=>'news','action'=>'view',$newsad['News']['id']),array('class'=>'Link_text_12_black'));
		echo '</li>';
		endforeach;*/
	?>
	</ul>
	<div style='clear: both;'></div>
</div>
</td>
</tr>
<tr>
<td valign='top'>
	 
<div class='ul-news'>
	<span class='news-title-h'><?php echo $this->Html->link('&bull;&nbsp;Các tài liệu mới',array('controller'=>'documents','action'=>'index'),array('escape'=>false));?></span>
	<ul>
	<?php
		/*foreach($docsadmin as $docsad):
		echo '<li>';
		echo $this->Html->link(mb_substr($docsad['Document']['title'],0,65),array('controller'=>'documents','action'=>'view',$docsad['Document']['id']),array('class'=>'Link_text_12_black'));
		echo '</li>';
		endforeach;*/
	?>
	</ul>
	<div style='clear: both;'></div>
</div>
 
</td>
</tr>
</table>
<script type="text/javascript">
	var title= "Quản trị hệ thống";
</script>