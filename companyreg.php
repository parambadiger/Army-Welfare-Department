<?php
require 'header.php';
?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include 'connect123_db.php';
    $errors=array();
    if(empty($_POST['email']))
    {
        $errors[]='Enter Your Email Address';
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
    
    if(empty($_POST['CompanyName']))
    {
        $errors[]='Enter Company Name';
    }
    else
    {
        $CompanyName=$_POST['CompanyName'];
    }
    
    if(empty($_POST['Description']))
    {
        $errors[]='Enter Company Description';
    }
    else
    {
        $Description=$_POST['Description'];
    }
     if(empty($_POST['ContactNo']))
    {
        $errors[]='Enter Company ContactNo';
    }
    else
    {
        $ContactNo=$_POST['ContactNo'];
    }
    
    if(empty($errors))
    {
        $q="SELECT * FROM `company` WHERE `EMAIL`='$email'";
        $r=mysqli_query($dbc,$q);
        if(mysqli_num_rows($r)!=0)
        {
            $errors[]='Email address already registered';
        }
    }
    if(empty($errors))
    {
        $q="INSERT INTO `job`.`company` (`CompanyId`, `EMAIL`, `Password`, `CompanyName`, `Description`, `ContactNo`, `approve`) 
		                            VALUES (NULL, '$email', '$pass', '$CompanyName', ' $Description', '$ContactNo', 'no')";
          $r=mysqli_query($dbc,$q);
          if($r)
          {
		    echo '<h3 class="title-heading">Registered Successfull</h3>';
            echo 'Thank You For Registering With GetJob. You may now login in. <a href="companysignup.php">Login</a>';
          }
          else
          {
            echo mysqli_error($dbc);
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
        
        echo 'please try again.<a href="companysignup.php">Click Here</a><i class="icon-remove"></i></p>';
            
?>
</article>
                            </div>
<?php
        mysqli_close($dbc);
    }
}
?>