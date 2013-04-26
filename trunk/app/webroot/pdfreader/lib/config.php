<?php
class Config{
  protected $config;
 
    public function __construct()
    {
		if(	PHP_OS == "WIN32" || PHP_OS == "WINNT"	){
      			$this->config = parse_ini_file('config.ini.win.php');
		}else{
			//$this->config = parse_ini_file('config.ini.nix.php');

		 $this->config['path.pdf'] = '/var/www/sites/iforceweb/iforce.com.vn/subdomains/www/html/projects/QLCV_TTC/app/webroot/files/documents/';
		 $this->config['path.swf'] = '/var/www/sites/iforceweb/iforce.com.vn/subdomains/www/html/projects/QLCV_TTC/app/webroot/pdfreader/swf/';
		 $this->config['cmd.conversion.singledoc']  = '/usr/local/bin/pdf2swf {path.pdf}{pdffile} -o {path.swf}{pdffile}.swf -f -T 9 -t -s storeallcharacters';
		 $this->config['cmd.conversion.splitpages'] = '/usr/local/bin/pdf2swf {path.pdf}{pdffile} -o {path.swf}{pdffile}%.swf -f -T 9 -t -s storeallcharacters';
		 $this->config['cmd.searching.extracttext'] = '/usr/local/bin/swfstrings {path.swf}{swffile}';
		 $this->config['cmd.conversion.openoffice'] = 'java -jar /usr/local/jdconverter/lib/jodconverter-cli-2.2.2.jar {path.pdf}{pdffile} {path.pdf}{pdffile}.pdf';
		}
    }
 
    public function getConfig($key = null)
    {
      if($key !== null)
      {
        if(isset($this->config[$key]))
        {
          return $this->config[$key];
        }
        else
        {
          throw new Exception("Unknown key '$key' in configuration");
        }
      }
      else
      {
        return $this->config;
      }
    }
 
    public function setConfig($config)
    {
 
      $this->config = $config;
    }
}
