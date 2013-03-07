<?php 
echo $this->element('design/header');
?>

<?php 
echo $this->element('aros/links');
?>

<?php
echo $this->element('design/footer');
?>
<script>
   var title = 'Quản lý quyền của người dùng';
	function submitform(){
		document.fview.submit();
	}
 </script>