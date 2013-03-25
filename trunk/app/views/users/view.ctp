<table class='tblcontent chitietcv' border=0 width=100% cellspacing=0 cellpadding=0>
    <tr class='tbody'>
        <td width="120"><b>Họ tên</b></td>
        <td> <?php echo $user[ 'User'][ 'name']; ?></td>
    </tr>
    <tr class='tbody'>
        <td><b>Ngày sinh</b></td>
        <td> <?php echo $user[ 'User'][ 'birth']; ?></td>
    </tr>
    <tr class='tbody'>
        <td><b>Giới tính</b></td>
        <td> <?php echo $user[ 'User'][ 'gioitinh']==0? "Nam": "Nữ"; ?></td>
    </tr>
    <tr class='tbody'>
        <td><b>Quê quán</b></td>
        <td> <?php echo $user[ 'User'][ 'quequan']; ?></td>
    </tr>
    <tr class='tbody'>
        <td><b>Ngày vào làm</b></td>
        <td> <?php echo $user[ 'User'][ 'datestart']; ?></td>
    </tr>
    <tr class='tbody'>
        <td><b>Tên đăng nhập</b></td>
        <td><?php echo $user[ 'User'][ 'username']; ?></td>
    </tr>

    <tr class='tbody'>
        <td><b>Phòng ban</b></td>
        <td><?php echo $user['Group'][ 'name']; ?></td>
    </tr>
    <tr class='tbody'>
        <td><b>Chức vụ</b></td>
        <td> <?php echo $user[ 'Position'][ 'name']; ?></td>
    </tr>
</table>
<script>
	var title = "Chi tiết thông tin nhân sự";
</script>