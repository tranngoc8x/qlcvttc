<?php
require_once("../lib/common.php"); 
require_once("../lib/pdf2swf_php5.php");
	$url=$_GET["url"];
	$doc=$_GET["doc"];
	$page = "";
	if(isset($_GET["page"]))
		$page = $_GET["page"];
	
	$pos = strpos($doc, "/");
	$configManager = new Config();
	$swfFilePath = $configManager->getConfig('path.swf') .$url.'/'. $doc  . $page. ".swf";
	$pdfFilePath = $configManager->getConfig('path.pdf') .$url.'/'. $doc;

	if(	!validPdfParams($pdfFilePath,$doc,$page) )
		echo "[Incorrect file specified]";
	else{
		$pdfconv=new pdf2swf();
		$output=$pdfconv->convert($doc,$page);
		if(rtrim($output) === "[Converted]"){
			if(substr_compare($doc,'pdf', -3, 3) === -1){
				$swfFilePath = $configManager->getConfig('path.swf') .$url.'/'. $doc . ".pdf" . $page. ".swf";
			}

			header('Content-type: application/x-shockwave-flash');
			header('Accept-Ranges: bytes');
			header('Content-Length: ' . filesize($swfFilePath));
			
			// uncomment  the following three lines if you wish to avoid browser cache.
			header('Expires: Thu, 01 Jan 1970 00:00:00 GMT, -1'); 
			header('Cache-Control: no-cache, no-store, must-revalidate');
			header('Pragma: no-cache');
			
			echo file_get_contents($swfFilePath);
		}else
			echo $output; //error messages etc
	}
?>
