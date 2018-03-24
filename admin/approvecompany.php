<?php
session_start();
require 'connect.php';
if(isset($_SESSION['username'])>0)
{
    $n=$_SESSION['username'];
    $comp=$_GET['company'];
    $q="UPDATE `company` SET `approve`='yes' where `CompanyId`='$comp'";
    $r=mysql_query($q);
    if($r)
    {
        load('companys.php');
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