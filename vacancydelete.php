<?php
session_start();
require 'connect.php';
if(isset($_SESSION['companyid'])>0)
{
    $n=$_SESSION['companyid'];
    echo '<a href="companylogout.php">Logout</a>';
    $vacancy=$_GET['vacancy'];
    $q="DELETE FROM `vacancy` WHERE `vacancy`='$vacancy'";
    $r=mysql_query($q);
    if($r)
    {
        echo 'Deleted Vacancy Details';
        echo '<a href="companyvacancy.php">Posted Jobs</a>';
    }
    else
    {
        echo mysql_error();
    }
}
else
{
  load('companylogin.php'); 
}
?>