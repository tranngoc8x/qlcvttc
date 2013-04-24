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
		
		<script type="text/javascript" src="js/flexpaper_flash.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
    </head> 
    <body>
    	<?php 
			// Setting current document from parameter or defaulting to 'Paper.pdf'
		
			$doc = "Report.pdf";
			if(isset($_GET["doc"]))
			$doc = $_GET["doc"];
			
			$pdfFilePath = $configManager->getConfig('path.pdf');
			$swfFilePath = $configManager->getConfig('path.swf');
			
		?> 
		<p id="viewerPlaceHolder" style="width:660px;height:553px;display:block">Document loading..</p>
	        <?php if(is_dir($pdfFilePath) && is_dir($swfFilePath) ){ ?>
		        <script type="text/javascript"> 
		        	var doc = '<?php print $doc; ?>';
		
			        $.ajax({
					  url: 'services/numpages.php?doc=' + doc,
					  success: viewDocument,
					  error: function(){
					  		$("#viewerPlaceHolder").html('Error loading document');
							}
					});
					
					function viewDocument(retval){
						if(isNaN(retval)||(!isNaN(retval)&&retval<1)){
							$("#viewerPlaceHolder").html(retval);
							return;
						}
						
						var numPages 			= retval;
						var swfFileUrl 			= '{services/view.php?doc='+doc+'&page=[*,0],'+numPages+'}';
		        		var searchServiceUrl	= escape('services/containstext.php?doc='+doc+'&page=[page]&searchterm=[searchterm]');
		        	
						var fp = new FlexPaperViewer(	
								 'FlexPaperViewer',
								 'viewerPlaceHolder', { config : {
								 SwfFile : swfFileUrl, 
								 Scale : 1, 
								 ZoomTransition : 'easeOut',
								 ZoomTime : 0.5,
								 ZoomInterval : 0.2,
								 FitPageOnLoad : false,
								 FitWidthOnLoad : false,
								 PrintEnabled : true,
								 FullScreenAsMaxWindow : false,
								 ProgressiveLoading : false,
								 MinZoomSize : 0.2,
								 MaxZoomSize : 5,
								 SearchMatchAll : true,
								 SearchServiceUrl : searchServiceUrl,
								 InitViewMode : 'Portrait',
								 BitmapBasedRendering : false,
								 
								 ViewModeToolsVisible : true,
								 ZoomToolsVisible : true,
								 NavToolsVisible : true,
								 CursorToolsVisible : true,
								 SearchToolsVisible : true,
		  						
		  						 localeChain: 'en_US'
								 }});			
					}
		        </script>
		<?php }else{ ?>
			<script type="text/javascript">
				$('#viewerPlaceHolder').html('Cannot read pdf & swf file path, please check your configuration');
			</script>
		<?php } ?>
		
		
		
   </body> 
</html> 