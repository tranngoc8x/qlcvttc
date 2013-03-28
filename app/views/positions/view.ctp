<div class="types form">
<table class='tblcontent chitietcv' border=0 width=100% cellspacing=0 cellpadding=0>
    <tr class='tbody'>
        <td width="120"><b>Loại công việc</b></td>
        <td> <?php echo $position[ 'Position'][ 'name']; ?></td>
    </tr>
	<tr class='tbody'>
        <td width="120"><b>Chú thích</b></td>
        <td> <?php echo $position[ 'Position'][ 'note']; ?></td>
    </tr>
	<tr class='tbody'>
        <td width="120"><b>Thuộc phòng</b></td>
        <td> <?php foreach($position[ 'Group'] as $g) echo $g['name'] . "&nbsp"; ?></td>
    </tr>
	<tr class='tbody'>
        <td width="120"><b>Thứ tự</b></td>
        <td> <?php echo $position[ 'Position'][ 'order']; ?></td>
    </tr>
</table>
</div>

<script>var title = "Xem chức vụ";</script>