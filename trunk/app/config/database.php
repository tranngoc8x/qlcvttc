<?php

class DATABASE_CONFIG {

	var $default = array(
		'driver' => 'mysql',
		'persistent' => false,
		'host' => 'localhost',// tên server lưu trữ cơ sở dữ liệu
		'login' => 'root',//tài khoản đăng nhập vào hệ quản trị csdl
		'password' => '',//mật khẩu đăng nhập
		'database' => 'dbqlcvttc',//tên cơ sở dũ liệu cần kết nối
		'prefix' => '',//tiền tố của các bảng trong csdl kết nối
		//'encoding' => 'utf8',//định dạng kiểu lưu trữ trong csdl
	);
}
