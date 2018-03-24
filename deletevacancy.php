<?php
session_start();
require 'connect.php';
if(isset($_SESSION['companyid'])>0)
{
    $n=$_SESSION['companyid'];
    
    $vacancy=$_GET['vacancy'];
    $q=mysql_query("DELETE FROM `vacancy` WHERE `vacancy`='$vacancy'");
    
    if($q)
    {
    $q1=mysql_query("DELETE FROM `application` WHERE `vacancy`='$vacancy'");
    if($q1)
    {
        load('view.php');
    }
    
    }
}
?>