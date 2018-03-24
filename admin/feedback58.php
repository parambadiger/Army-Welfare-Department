<?php
session_start();
require 'connect.php';
if(isset($_SESSION['username'])>0)
{
 echo   $n=$_SESSION['username'];	
if(isset($_GET['vacancy']))
{

 echo   $comp=$_GET['vacancy'];
   
        $q2="DELETE FROM `feedback` WHERE `name`='$comp' ";
        $r2=mysql_query($q2);
        if($r2)
        {
       load('feedback.php');
        }
    else
    {
        echo mysql_error();
    }
	
}

if(isset($_GET['delnoti']))
{

 echo   $cp=$_GET['delnoti'];
   
        $q2="DELETE FROM `noti` WHERE `id`='$cp' ";
        $r2=mysql_query($q2);
        if($r2)
        {
       load('feedback.php');
        }
    else
    {
        echo mysql_error();
    }
	
}
	
	
	
	
	
	
	
}
else
{
    load('adminlogin.php');
}
    
?>