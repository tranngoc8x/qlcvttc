<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>IFORCE ADMINISTRATOR V2</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="shortcut icon" href="<?=$this->webroot;?>img/admin/icon.jpg" type="image/x-icon" /> 
	 
 
	<?php
			echo $this->Html->css(array('ext-all','admin','jquery-ui-1.10.1.custom'));
			echo $this->Html->script(array('ext-base','ext-all','App','checkinput','ckeditor/ckeditor','jquery-1.9.1','jquery-ui-1.10.1.custom'));
	?>
	<style>
	body{
		font-size: 100%;
	 
	}
	.demoHeaders {
		margin-top: 2em;
	}
	#dialog-link {
		padding: .4em 1em .4em 20px;
		text-decoration: none;
		position: relative;
	}
	#dialog-link span.ui-icon {
		margin: 0 5px 0 0;
		position: absolute;
		left: .2em;
		top: 50%;
		margin-top: -8px;
	}
	#icons {
		margin: 0;
		padding: 0;
	}
	#icons li {
		margin: 2px;
		position: relative;
		padding: 4px 0;
		cursor: pointer;
		float: left;
		list-style: none;
	}
	#icons span.ui-icon {
		float: left;
		margin: 0 4px;
	}
	.fakewindowcontain .ui-widget-overlay {
		position: absolute;
	}
	</style>
</head>
<script type="text/javascript">

		Ext.onReady(function(){
				Ext.state.Manager.setProvider(new Ext.state.CookieProvider());
				var Header =  new Ext.BoxComponent({
				region: 'north',
				contentEl: 'north',
				height: 50
		})
		var Bottom ={
				region: 'south',
				height: 0,
				title: 'Copyright @2012 by iForceSystem',
				margins: '0 0 0 0'
		}

		var Left ={
				region: 'west',
				id: 'westpanel', // see Ext.getCmp() below
				title: 'Chức năng',
				split: true,
				width: 200,
				minSize: 175,
				maxSize: 400,
				collapsible: true,
				margins: '0 0 0 5',
				layout: {
						type: 'accordion',
						animate: true
				},
				items: [ ]
		}
		var MainTabs= new Ext.TabPanel({
				region: 'center', // a center region is ALWAYS required for border layout
				deferredRender: false,
				id:'tabPan',
				activeTab: 0,     // first tab initially active
				items: []
		})
				var viewport = new Ext.Viewport({
						layout: 'border',
						collapseMode: 'mini',
						items: [Header, Bottom, Left,MainTabs]
				});
	 });
			function addAccordion(tit, el, status, icon){
			if(icon=="" || icon== undefined)icon="nav";
			if(status == 1){
				status = false;
			}else{
				status = true;
			}
			var panel = Ext.getCmp('westpanel');
			var child = new Ext.Panel(
			{
					title: tit,
					border: false,
					iconCls: icon,
					contentEl: el,   // see the HEAD section for style used
					collapsed: status
			});
			panel.add(child);
			panel.doLayout();
		}

		function addTab(tit,icon){
			if(icon==""){
					icon="nav";
			}
			var tabItem = Ext.getCmp('tabPan');
			tabItem.add({ contentEl: 'center',
					title: tit,
					bodyStyle : 'padding:10px',
					autoScroll: true,
					iconCls: icon
				 }).show();
		}
		$(function() {
			$(".datepicker").datepicker({
				showOn: 'button',
				buttonImage: '<?php echo $this->webroot;?>/img/calendar_add.png',
				buttonImageOnly: true,
				dateFormat: 'dd/mm/yy',
				title:'Chọn ngày'
			});
		});
	 

</script>
<body>
		<div id="north" class="x-hide-display">
				
	
				<div id="userinfor">
						&nbsp;Xin chào , <?php echo $this->Html->link($ssid['User']['name'],array('controller'=>'users','action'=>'edit'),array('class'=>'link_title','escape'=>FALSE,'title'=>"Thông tin tài khoản"));?>
						&nbsp;&nbsp;<?php echo $this->Html->link(__("Thoát",true)."&nbsp;&nbsp;".$this->Html->image('admin/logout.png'),array('controller'=>'users','action'=>'logout'),array('escape'=>FALSE,'class'=>'link_title_red','title'=>"Thoát"));?>
				</div>
				<p>HỆ THỐNG QUẢN LÝ CÔNG VIỆC TTC TOWER</p>
				<?php echo $this->Html->image('admin/logo.png');?>
	</div>
	<div id="center" class="x-hide-display">
			<?php echo $this->Session->flash();?> 
			<?php echo $content_for_layout;?>
	</div>
	<div id="west" class="x-hide-display">
		<?php echo $this->element('leftmenu');?>
	</div>     
	<div id="south" class="x-hide-display"> 
	</div>
	<script>
	 Ext.onReady(function(){
		addTab(title);
		});
 </script>
 <script type="text/javascript">
	var checkflag = "false";
	var value = "";
	function check() {
		if (checkInput()){
				var conf=confirm("Bạn có chắc chẵn muốn xóa các mục này không ?");
				if (conf){
					var strchon=document.frmList.checkall.value;
					document.location.href='<?php echo $this->webroot.$this->name;?>/mdelete/'+strchon;
					return false;
				}
			}
	}
		$("#flashMessage").append("<a href='#' id='closediv'><img src='<?php echo $this->webroot;?>img/admin/cross_grey_small.png' /></a>");
		$("#closediv").click(function(){
				$("#flashMessage").slideUp('slow');
		})
</script>

</body>
</html>