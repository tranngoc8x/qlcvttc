<?php
require_once("lib/config.php");
require_once("lib/common.php"); 
$configManager = new Config();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">	
    <head> 
        <title>FlexPaper</title>         
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <style type="text/css" media="screen"> 
			html, body	{ height:100%; }
			body { margin:0; padding:0; overflow:auto; }   
			#flashContent { display:none; }
        </style> 
		
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/flexpaper_flash.js"></script>
    </head> 
    <body> 
	    <?php 
			// Setting current document from parameter or defaulting to 'Paper.pdf'
		
			$doc = "Paper.pdf";
			if(isset($_GET["doc"]))
			$doc = $_GET["doc"];
			
			$pdfFilePath = $configManager->getConfig('path.pdf') . $doc;
			$swfFilePath = $configManager->getConfig('path.swf');
		?> 
    	<div style="position:absolute;left:10px;top:45px;">
	        <p id="viewerPlaceHolder" style="width:660px;height:553px;display:block">Document loading..</p>
	        
			<?php if(validPdfParams($pdfFilePath,$doc,null) && is_dir($swfFilePath) ){ ?>
	        	<script type="text/javascript"> 
				var doc = '<?php print $doc; ?>';
			
				var fp = new FlexPaperViewer(	
						 'FlexPaperViewer',
						 'viewerPlaceHolder', { config : {
						 SwfFile : 'services/view.php?doc='+doc,
						 Scale : 0.6, 
						 ZoomTransition : 'easeOut',
						 ZoomTime : 0.5,
						 ZoomInterval : 0.2,
						 FitPageOnLoad : true,
						 FitWidthOnLoad : false,
						 PrintEnabled : true,
						 FullScreenAsMaxWindow : false,
						 ProgressiveLoading : false,
						 MinZoomSize : 0.2,
						 MaxZoomSize : 5,
						 SearchMatchAll : false,
						 InitViewMode : 'Portrait',
						 
						 ViewModeToolsVisible : true,
						 ZoomToolsVisible : true,
						 NavToolsVisible : true,
						 CursorToolsVisible : true,
						 SearchToolsVisible : true,
  						
  						 localeChain: 'en_US'
						 }});
						 
				function onDocumentLoadedError(errMessage){
					$('#viewerPlaceHolder').html('Error displaying document. Make sure the conversion tool is installed and that correct user permissions are applied to the SWF Path directory');
				}
	        </script> 
		<?php }else{ ?>
			<script type="text/javascript">
				$('#viewerPlaceHolder').html('Cannot read pdf file path, please check your configuration');
			</script>
		<?php } ?>
        </div>
		
		<!-- THE FOLLOWING CODE BLOCK IS ONLY PLACED HERE FOR TESTING PURPOSES. IT IS SAFE TO REMOVE THE FOLLOWING CODE. -->
		<?php
			$os = "nix";
			if(	PHP_OS == "WIN32" || PHP_OS == "WINNT"	)
				$os = "win";		
		?>	
		<div style="position:absolute;left:10px;top:10px;background-color:#EEEEEE;padding:10px 5px 10px 10px; width:645px;font-family:Verdana;font-size:9pt">
			Currently viewing: <input type=text style="width:270px" id="txt_doc" value="<?php print $doc ?>"><input type="submit" value="Load" onclick="document.location='simple_document.php?doc='+$('#txt_doc').val()" style="float:right;" />
		</div>	
		<div style="position:absolute;left:680px;height:565px;top:10px;font-family:Verdana;font-size:9pt;background-color:#CACACA;width:360px;">
			<div style="padding: 5px 5px 5px 5px;font-size:15px;font-weight:bold;text-align:center;margin-top:10px;">Current PHP Configuration</div>
			<div style="padding: 5px 5px 5px 5px;font-size:12px;text-align:center;margin-bottom:10px;">This page uses the most common approach to automatically publish and display a PDF document.</div>

			<div style="padding: 5px 5px 5px 5px;font-size:10px;text-align:center;margin-bottom:10px;">Please edit php/lib/config.ini.<?php print $os ?>.php to change these values</div>
			
			<div style="background-color:#EFEFEF;padding: 10px 5px 10px 10px;">
			<table border="0" width="350">
		    <tr><th colspan=3>Document Path Settings</th></tr>
			<tr><td>PDF Path</td><td><input type=text style="width:270px;" id="txt_pdfpath" value="<?php print $configManager->getConfig('path.pdf') ?>"></td></tr>
			<tr><td>SWF Path</td><td><input type=text style="width:270px;" id="txt_pdfpath" value="<?php print $configManager->getConfig('path.swf') ?>"></td></tr>
			<table>
			<br/><br/>
			
			<table border="0" width="350">
			<tr><th>Single Document Conversion Command</th></tr>
			<tr><td><textarea rows=5 cols=28 id="txt_singledocument" style="width:330px;font-size:11px;" wrap="on"><?php print $configManager->getConfig('cmd.conversion.singledoc') ?></textarea></td></tr>
			</table>
			<br/><br/>
			
			<table border="0" width="350">
			<tr><th>Multiple Pages Conversion Command</th></tr>
			<tr><td><textarea rows=5 cols=28 id="txt_splitpages" style="width:330px;font-size:11px;" wrap="on"><?php print $configManager->getConfig('cmd.conversion.splitpages') ?></textarea></td></tr>
			</table>
			<br/><br/>
						
			<table border="0" width="350">
			<tr><th>SWF Text Extraction Command</th></tr>
			<tr><td><textarea rows=5 cols=28 id="txt_extract" style="width:330px;font-size:11px;" wrap="on"><?php print $configManager->getConfig('cmd.searching.extracttext') ?></textarea></td></tr>
			</table>
			</div>
		</div>
   </body> 
</html> 
