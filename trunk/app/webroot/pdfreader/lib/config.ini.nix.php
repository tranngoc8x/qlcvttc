; <?php exit; ?> DO NOT REMOVE THIS LINE
[general]
 path.pdf = '/var/www/flexpaper/php/pdf/'
 path.swf = '/var/www/flexpaper/php/docs/'
 
[external commands]
 cmd.conversion.singledoc = '/usr/local/bin/pdf2swf {path.pdf}{pdffile} -o {path.swf}{pdffile}.swf -f -T 9 -t -s storeallcharacters'
 cmd.conversion.splitpages = '/usr/local/bin/pdf2swf {path.pdf}{pdffile} -o {path.swf}{pdffile}%.swf -f -T 9 -t -s storeallcharacters'
 cmd.searching.extracttext = '/usr/local/bin/swfstrings {path.swf}{swffile}'
 cmd.conversion.openoffice = 'java -jar /usr/local/jodconverter/lib/jodconverter-cli-2.2.2.jar {path.pdf}{pdffile} {path.pdf}{pdffile}.pdf'
