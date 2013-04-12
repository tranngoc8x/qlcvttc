<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ĐĂNG NHẬP HỆ THỐNG QUẢN TRỊ</title>
<?php
	echo $this->Html->css(array('admin','ext-all'));
	echo $this->Html->script(array('ext-base','ext-all','App'));
?>
<script>
	Ext.onReady(function(){
    Ext.QuickTips.init();

	// Create a variable to hold our EXT Form Panel.
	// Assign various config options as seen.
    var login = new Ext.FormPanel({
 		labelWidth:120,
        url:'<?php echo $this->webroot;?>users/login',
        frame:true,
        title:'ĐĂNG NHẬP QUẢN TRỊ WEBSITE',
        defaultType:'textfield',
		monitorValid:true,

		items: [{
			xtype: 'box',
			autoEl: {
				tag: 'div',
				html: '<img src="<?php echo $this->webroot;?>img/admin/login.png" style="margin:10px" align="absmiddle"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="Title_14_black" align="right">ĐĂNG NHẬP HỆ THỐNG</span>'}
			},
		{
			xtype: 'textfield',
			id: 'data[User][username]',
			fieldLabel: 'Tên đăng nhập',
			allowBlank: false,
			width: 150
		},
		{
			xtype: 'textfield',
			id: 'data[User][password]',
			fieldLabel: 'Mật khẩu',
			inputType: 'password',
			allowBlank: false,
 			width: 150
		}

		],


	// All the magic happens after the user clicks the button
        buttons:[{
                text:'Login',
				id : 'btnLogin',
                formBind: true,
                // Function that fires when user clicks the button
                handler:function(){
                    login.getForm().submit({
                        method:'POST',
                        waitTitle:'Đăng nhập',
                        waitMsg:'Đang kiểm tra...',
							// Functions that fire (success or failure) when the server responds.
							// The one that executes is determined by the
							// response that comes from login.asp as seen below. The server would
							// actually respond with valid JSON,
							// something like: response.write "{ success: true}" or
							// response.write "{ success: false, errors: { reason: 'Login failed. Try again.' }}"
							// depending on the logic contained within your server script.
							// If a success occurs, the user is notified with an alert messagebox,
							// and when they click "OK", they are redirected to whatever page
							// you define as redirect.

                        success:function(){
                        	//alert(1);
							var redirect = '<?php echo $this->webroot;?>tasks/doing';
							window.location = redirect;
 						},

			// Failure function, see comment above re: success and failure.
			// You can see here, if login fails, it throws a messagebox
			// at the user telling him / her as much.

                        failure:function(form, action){
                            if(action.failureType == 'server'){
                                obj = Ext.util.JSON.decode(action.response.responseText);
                                Ext.Msg.alert('Thông báo!', obj.errors.reason);
                            }else{
                                Ext.Msg.alert('Thông báo!', 'Có lỗi sảy ra : ' + action.response.responseText);
                            }
                            login.getForm().reset();
                        }
                    });
                }
            }],
			 keys: [
			    { key: [Ext.EventObject.ENTER], handler: function() {
 	                    Ext.getCmp('btnLogin').handler();
 	                }
 	            }
         	]



    });


	// This just creates a window to wrap the login form.
	// The login object is passed to the items collection.
    var win = new Ext.Window({
		//title: 'HỆ THỐNG QUẢN TRỊ NỘI DUNG',
        layout:'form',
        width:310,
        height:205,
        closable: false,
        resizable: false,
        plain: true,
        border: false,
        items: [login,
				{
					xtype: 'box',
					autoEl: {
 					html: '<div align="right" style="border:none; margin-top:3px">IFORCE SYSTEMS (Copyright © 2013)</div>'}
 				}]
	});
	win.show();
});
</script>
<body bgcolor="#C1D5F0" >
</body>
</html>
