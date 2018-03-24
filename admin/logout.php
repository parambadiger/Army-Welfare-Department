
<?php
session_start();
require 'connect.php';
if(isset($_SESSION['username'])>0)
{

    $_SESSION=array();
        session_destroy();
        load('adminlogin.php');
}
else
{
    load('adminlogin');
}
?>