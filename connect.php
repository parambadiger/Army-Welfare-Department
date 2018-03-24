<?php
$dbhost = 'localhost'; // Unlikely to require changing
$dbname = 'job'; // Modify these...
$dbuser = 'root'; // ...variables according
$dbpass = ''; 
mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());
function load($page='login.php')
{
    $url='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
    $url=rtrim($url,'/\\');
    $url.='/'.$page;
    header("Location:$url");
}
?>