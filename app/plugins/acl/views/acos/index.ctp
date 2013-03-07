<?php 
echo $this->element('design/header');
?>

<?php 
echo $this->element('acos/links');
?>

<?php
echo $this->element('design/footer');
?>
<script>
   var title = 'Danh sách';
	function submitform(){
		document.fview.submit();
	}
 </script>