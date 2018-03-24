<?php
session_start();
require 'connect.php';
if(isset($_SESSION['username'])>0)
{
    $n=$_SESSION['username'];
    $comp=$_GET['company'];
    $q="DELETE FROM `company` WHERE `CompanyId`='$comp'";
    $r=mysql_query($q);
    if($r)
    {
        $q2="DELETE FROM `vacancy` WHERE `CompanyId`='$comp' ";
        $r2=mysql_query($q2);
        if($r2)
        {
        load('companys.php');
        }
    }
    else
    {
        echo mysql_error();
    }
}
else
{
    load('adminlogin.php');
}
    
?>