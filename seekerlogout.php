
<?php
session_start();
require 'connect.php';
if(isset($_SESSION['seekerid'])>0)
{
    $n=$_SESSION['seekerid'];
    $_SESSION=array();
        session_destroy();
        load('seeker.php');
}
else
{
    load();
}
?>