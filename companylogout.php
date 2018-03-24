<?php
session_start();
require 'connect.php';
if(isset($_SESSION['companyid'])>0)
{
    $n=$_SESSION['companyid'];
    $_SESSION=array();
        session_destroy();
        load ('companysignup.php');
}
else
{
    load();
}
?>