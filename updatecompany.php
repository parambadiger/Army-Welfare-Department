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
                        
								<h1><strong style="color:#FF0000"><u>UPDATE COMPANY</u></strong></h1></br></br>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include 'connect123_db.php';
    $errors=array();
    $n1=$_POST['compid'];
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
    
    if(empty($errors))
    {
        $q="UPDATE `company` SET `CompanyName`='$CompanyName',`Description`='$Description' WHERE `CompanyId`='$n1' ";
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

<?php
                    require('config.php');
                    $sql1=mysql_query("SELECT * FROM `company` WHERE `CompanyId`='$n'");
                    if($sql1)
                    {
                    while($row1=mysql_fetch_array($sql1))
                    {
                        
 ?>

<form action="updatecompany.php" method="POST">
<input type="hidden" name="compid" value="<?php echo $n;?>" />
    <label>Company Name</label>
    <input type="text" name="CompanyName" value="<?php echo $row1['CompanyName']; ?>"><br />
	 <br /><label>Enter company contact No</label>
    <input type="text" name="ContactNo" value="<?php echo $row1['ContactNo']; ?>"><br />
    <br /><label>Description</label>
    <textarea  name="Description" ><?php echo $row1['Description']; ?></textarea>
    <br /><br />
                  <input type="submit"id="submit" class="real-btn">
</form>

<?php
}
}
?>
 

</body>
</html>
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