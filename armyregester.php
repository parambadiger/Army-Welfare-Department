<?php
require 'header.php';
?>
<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
/* DB BY KK */
/*
$dbc=mysqli_connect('localhost','root','','job')
OR die(mysqli_connect_error());
mysqli_set_charset($dbc,'utf_8');  */




    include 'connect123_db.php';
    $errors=array();
    if(empty($_POST['email']))
    {
       echo $errors[]='Enter Your Email Address';
    }
    else
    {
        $email=$_POST['email'];
    }
    if(!empty($_POST['pass1']))
    {
        if($_POST['pass1']==$_POST['pass2'])
        {
            $pass=$_POST['pass1'];
        }
        else
        {
            $errors[]='Password Did not Matched';
        }
    }
    else
    {
        $errors[]='Enter Password';
    }
	if(empty($_POST['MobN']))
    {
       echo $errors[]='Enter Your Mobile Number';
    }
    else
    {
        $MobN=$_POST['MobN'];
    }
    if(empty($errors))
    {
        $q="SELECT * FROM `seeker` WHERE `EMAIL`='$email'";
        $r=mysqli_query($dbc,$q);
        if(mysqli_num_rows($r)!=0)
        {
            $errors[]='Email address already registered';
        }
    }
    if(empty($errors))
    {
	
        $q="INSERT INTO seeker (EMAIL, Password, FirstName,
         MidleName, LastName, DOB, Gender, State, Address,
          District, City, MobileNo, LandNo, Experience, Skills,
           FunArea, BasicEdu, MasterEdu, ResumeName, ImageName,approve) VALUES
           ('$email','$pass','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',
                             'NULL','$MobN','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','no'
           ) ";
          $r=mysqli_query($dbc,$q);
          if($r)
          {
            ?><div class="list-container clearfix">
 <h3 class="title-heading">Registered Successfull</h3>
                <div class="span6 ">
                                <article class="property-item clearfix">
            <?php
            echo 'Thank You For Registering With DAW CELL. You May LOGIN Later After Admin Approvals. <a href="seeker.php">Login</a>';?>
            </article>
                            </div>
            <?php
          }
          mysqli_close($dbc);
        exit();    
    }
    
    else
    {
        ?><div class="list-container clearfix">
 <h3 class="title-heading">Error Occured</h3>
                <div class="span6 ">
                                <article class="property-item clearfix">
<?php
        echo '<p class="tip">The folowing errors(s)occured:<br/>';
        foreach($errors as $msg)
        {
            
            $message="-$msg<br/>";
            echo $message;
        }
        
        echo 'please try again.<a href="seeker.php">Click Here</a><i class="icon-remove"></i></p>';
            
?>
</article>
                            </div>
<?php
        mysqli_close($dbc);
    }
}
?>
