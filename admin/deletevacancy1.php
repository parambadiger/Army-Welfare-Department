<?php
session_start();
require 'connect.php';
if(isset($_SESSION['username'])>0)
{
    $n=$_SESSION['username'];
    $comp=$_GET['vacancy'];
   
        $q2="DELETE FROM `vacancy` WHERE `vacancy`='$comp' ";
        $r2=mysql_query($q2);
        if($r2)
        {
        load('deletevacancy.php');
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