<?php
//
// Copyrighted by A.M.Danischewski 2015+ (c)
// You may reuse this code without limit, provided this notice remain in tact. 
//
// Description: routing.php 
// How to use: 
//  * Start the php webserver, wherever this file is found, or provide full path: 
//     $> php -S localhost:8000 -t / routing.php 
//  * Start browsing! Visit: 
//     http://localhost:8000/info2html?(coreutil)Top
// Note: Before you use this, edit the following variable to point to the 
//       info2html Perl script. 
//       Also make sure that your info share directory is listed in the 
//       info2html.conf file (mine wasn't I had to add /usr/share/info). 
// 
$info2html="/mnt/samsung22/software/info2html-2.0/info2html"; ### EDIT THIS
$page=""; 
if (preg_match('/info2html/', $_SERVER["REQUEST_URI"])) {
 if (isset($_SERVER['QUERY_STRING'])) $page=$_SERVER["QUERY_STRING"]; else print_r($_SERVER);     
  // Calls info2html, same as if info2html were called from the commmand line.
  System($info2html." \"".$page."\""); 
} else {  
 return FALSE; 
}
?>
