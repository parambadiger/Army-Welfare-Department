<?php
session_start();
require 'connect.php';
if(isset($_SESSION['companyid'])>0)
{
    $n=$_SESSION['companyid'];
?>
<?php
require 'header2.php';
?>
<!-- Content -->
    <div class="container contents lisitng-grid-layout">
        <div class="row">
            <div class="span12 main-wrap">

                <!-- Main Content -->
                <div class="main">                               
                        <!-- Gallery Container -->
                        <div class="span12 main-wrap" align="center">

<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include 'connect123_db.php';
    $errors=array();
    $n1=$_POST['compid'];
    if(!empty($_POST['oldpass']))
    {
    if(!empty($_POST['pass1']))
    {
        if($_POST['pass1']==$_POST['pass2'])
        {
            $pass=$_POST['pass1'];
        }
        else
        {
            $errors[]='New Password Did not Matched';
        }
    }
    else
    {
        $errors[]='Enter New Password';
    }
    }
    else
    {
        $errors[]='Enter Old Password';
    }
    
    
    if(empty($errors))
    {
        $q="UPDATE `company` SET `Password`='$pass' WHERE `CompanyId`='$n1' ";
          $r=mysqli_query($dbc,$q);
          if($r)
          {
            echo 'Updated Company Details';
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
<form action="updatecompanypassword.php" method="POST">
<input type="hidden" name="compid" value="<?php echo $n;?>" />
    <h1><strong style="color:#FF0000"><u>UPDATE PASSWORD</u></strong></h1></br></br>
    <label>Old Password</label>
    <input type="password" name="oldpass" /><br/>
    <br/><label>New Password</label>
    <input type="password" name="pass1"><br/>
    <br/><label>Confirm New Password</label>
    <input type="password" name="pass2">
    <br />
    </br>
    <input type="submit"id="submit" class="real-btn">

 </form>
 <?php
}
else
{
  load('companylogin.php'); 
}
?>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>


<?php
require 'footer.php';
?>