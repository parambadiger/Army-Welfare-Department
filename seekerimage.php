<?php
session_start();
require 'connect.php';
if(isset($_SESSION['seekerid'])>0)
{
    $n=$_SESSION['seekerid'];
    if($_FILES["userfile"]["error"]>0)
    {
        $errors[]='Upload seeker photo';
    }
    else
    {
        
        
        if($_FILES["userfile"]["name"])
        {
            
            
                $file=$n.'.jpg';
                $q="UPDATE `seeker` SET `ImageName`='$file' WHERE `SeekerId`='$n'";
                $r=mysql_query($q);
                if($r)
                {
                move_uploaded_file($_FILES["userfile"]["tmp_name"],"upload/seeker/photo/".$file);
                $_SESSION['seekerid']=$n;
                load("update_seeker.php");
                }
                else
                {
                    mysql_error();
                }
            
        }
    }
}
?>