
<?php
  
$file=$_GET['state'];
$filename = "pdf/".$file;
  
// Header content type
header("Content-type: application/pdf");
  
header("Content-Length: " . filesize($filename));
  
// Send the file to the browser.
readfile($filename);
?> 