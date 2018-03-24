<?php
require 'header.php';
?>
<!-- Content -->
    <div class="container contents lisitng-grid-layout">
        <div class="row">
            <div class="span12 main-wrap">

                <!-- Main Content -->
                <div class="main">                               
                        <!-- Gallery Container -->
                        <div class="span12 main-wrap" align="center">					                
						              
									    <h1><strong style="color:#FF0000"><u>ADMIN LOGIN</u></strong></h1></br></br>

                   
                            

                                

                               
                                <?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include 'connect123_db.php';
    include 'connect.php';
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
        $q="SELECT * FROM `admin` WHERE `username`='$email' AND `password`='$pass'";
        $r=mysqli_query($dbc,$q);
        if($r)
        {
        if(mysqli_num_rows($r)>0)
        {
            $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
            session_start();
            
                $_SESSION['username']=$row['username'];
                load('seekers.php');
            
        }
        else
        {
            echo 'Username and Password Does not Exists.';
        }
        }
          mysqli_close($dbc);
        exit();    
    }

    
    else
    {
        echo '<h1> Error! </h1>
        <p>The following error(s) occured while login:<br>';
        foreach($errors as $msg)
        {
            echo "-$msg<br>";
        }
        echo 'please try again';
        mysqli_close($dbc);
    }
}
?>
<form action="adminlogin.php" method="POST">

    <label>Username</label>
    <input type="text" name="email" required></br></br>
    <label>Login Password</label>
    <input type="password" name="pass1" pattern="(?=^.{10,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password should have UpperCase, LowerCase, Number/SpecialChar and 10 chars"><br /></br>
    <input type="submit"id="submit" class="real-btn">

 </form>
                                </div>

</section>
</div>
</div>
</div>
</div>


<?php
require 'footer.php';
?>