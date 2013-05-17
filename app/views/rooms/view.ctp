<div class="rooms view">
<table class='tblcontent chitietcv' border=0 width=100% cellspacing=0 cellpadding=0>
    <tr class='tbody'>
        <td width="120"><b>Phòng</b></td>
        <td> <?php echo $room['Room']['room']; ?></td>
    </tr>
	<tr class='tbody'>
        <td width="120"><b>Khách hàng</b></td>
        <td> <?php echo $room['Customer']['name']; ?></td>
    </tr>
	<tr class='tbody'>
        <td width="120"><b>Chỉ số điện đầu</b></td>
        <td> <?php echo $room['Room']['firstdien']; ?></td>
    </tr>
	<tr class='tbody'>
        <td width="120"><b>Chỉ số nước đầu</b></td>
        <td> <?php echo $room['Room']['firstnuoc']; ?></td>
    </tr>
	<tr class='tbody'>
        <td width="120"><b>Mã công tơ điện</b></td>
        <td> <?php echo $room['Room']['mactodien']; ?></td>
    </tr>
	<tr class='tbody'>
        <td width="120"><b>Mã công tơ nước</b></td>
        <td> <?php echo $room['Room']['mactonuoc']; ?></td>
    </tr>
</table>
</div>
<script>var title="Chi tiết phòng";</script>