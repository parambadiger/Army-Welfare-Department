<?php
session_start();
require 'connect.php';
if(isset($_SESSION['companyid'])>0)
{
    $n=$_SESSION['companyid'];
    $vacancy=$_POST['vacancy'];
        if($_FILES["userfile"]["error"]>0)
    {
        $errors[]='Upload company photo';
    }
    else
    {
        
        
        if($_FILES["userfile"]["name"])
        {
            
            
                $file=$vacancy.'.jpg';
                $q="UPDATE `vacancy` SET `ImageName`='$file' WHERE `CompanyId`='$n' AND `vacancy`='$vacancy'";
                $r=mysql_query($q);
                if($r)
                {
                move_uploaded_file($_FILES["userfile"]["tmp_name"],"upload/Company/".$file);
                $_SESSION['companyid']=$n;
                load('updatevacancy.php?vacancy='.$vacancy);
                }
                else
                {
                    mysql_error();
                }
            
        }
    }
}
?>