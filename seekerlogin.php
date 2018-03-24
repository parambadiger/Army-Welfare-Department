<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="LiveLong" />

	<title>Untitled 9</title>
</head>

<body>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include 'connect123_db.php';
    require 'connect.php';
    $errors=array();
    if(empty($_POST['email']))
    {
        $errors[]='Enter Your Email Address';
    }
    else
    {
        $email=$_POST['email'];
    }
    if(empty($_POST['pass1']))
    {
        $errors[]='Enter Password';
    }
    else
    {
       $pass=$_POST['pass1'];
    }
    if(empty($errors))
    {
        $q="SELECT * FROM `seeker` WHERE `EMAIL`='$email' AND `Password`='$pass' AND `approve`='yes'";
        $r=mysqli_query($dbc,$q);
        if($r)
        {
        
        if(mysqli_num_rows($r)!=0)
        {
            $q1="SELECT * FROM `seeker` WHERE `EMAIL`='$email' AND `Password`='$pass' AND `State`='NULL' AND `approve`='yes'";
            $r1=mysqli_query($dbc,$q1);
            $row=mysqli_fetch_array($r1,MYSQLI_ASSOC);
            session_start();
            if(mysqli_num_rows($r1)!=0)
            {
                $_SESSION['seekerid']=$row['SeekerId'];
                load('Seeker1.php');
            }   
            else
            {
                $row2=mysqli_fetch_array($r,MYSQLI_ASSOC);
                $_SESSION['seekerid']=$row2['SeekerId'];
                load('update_seeker.php');
            }
        }
            else
          {
            echo 'Email address and Password Does not Exists.Click here to <a href="register.php">Register<a> OR Wait for admin to give authentication';
         }
        }
          mysqli_close($dbc);
        exit();    
    }
    
    else
    {
        echo '<h1> Error!</h1>
        <p>The following error(s) occured:<br>';
        foreach($errors as $msg)
        {
            echo "-$msg<br>";
        }
        echo 'please try again';
        mysqli_close($dbc);
    }
}

?>
 <form action="seekerlogin.php" method="POST">

    <p>Login Form</p>
    <table>
    <tr><td><label>Login E-Mail ID</label></td>
    <td><input type="email" name="email" required></td></tr>
    <tr>
    <td><label>Login Password</label></td>
    <td><input type="password" name="pass1"></td></tr>
    </table>
    <br />
    
    <td><input type="submit"></td>

 </form>



</body>
</html>