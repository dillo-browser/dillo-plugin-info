<?php
//---------------------------------------------------------
//                      routing.php
//---------------------------------------------------------
//
// PURPOSE
//  This php script routes calls to the info2html scripts, infocat and 
//  info2html for the PHP built-in webserver (like a PHP mod_rewrite). 
//
// DESCRIPTION 
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
// AUTHORS 
//    2015.12.25        +A.M.Danischewski <adam_ lastname@not gamil.com>
// 
// ORIGINAL AUTHOR
//    2015.12.25        +A.M.Danischewski <adam_ lastname@not gamil.com>
// 
// HISTORY
//    2015.12.25  V2.1  Initial version     
//                      +A.M.Danischewski <adam_ lastname@not gamil.com>
//
// Copyrighted by A.M.Danischewski 2015+ (c)
// You may reuse this code without limit, provided this notice remain in tact. 
// 
$info2html_basepath=realpath(dirname(__FILE__)); 
$page=""; 
if (preg_match('/info2html/', $_SERVER["REQUEST_URI"])) {
 if (isset($_SERVER['QUERY_STRING'])) $page=$_SERVER["QUERY_STRING"]; else print_r($_SERVER);     
  // Calls info2html, same as if info2html were called from the commmand line.
  System($info2html_basepath."/info2html \"".$page."\""); 
} else if (preg_match('/infocat/', $_SERVER["REQUEST_URI"])) {
  // Calls infocat, same as if info2html were called from the commmand line.
  System($info2html_basepath."/infocat"); 
} 
else {  
 return FALSE; 
}
?>
