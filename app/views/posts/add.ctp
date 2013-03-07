Thêm mới bài viết
<?php 
	echo $this->Form->create("Post");
	echo $this->Form->input('name');
	echo $this->Form->input('desc');
	echo $this->Form->input('content');
	echo $this->Form->input('status');
	echo $this->Form->input('author');
	echo $this->Form->end('Lưu lại');
?>
