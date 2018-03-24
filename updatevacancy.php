<?php
session_start();
require 'connect.php';
if(isset($_SESSION['companyid'])>0)
{
    $n=$_SESSION['companyid'];
    
    $vacancy=$_GET['vacancy'];
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
						 <h1><strong style="color:#FF0000"><u>UPDATE VACANCY</u></strong></h1>
                            <div class="gallery-2-columns isotope clearfix">

                                <div class="gallery-item isotope-item on-rent">
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include 'connect123_db.php';
        $vacancy=$_POST['vacancy'];
        $JobTitle=$_POST['JobTitle'];
       $Req=$_POST['Req'];
       $Add=$_POST['Add'];
       $Country=$_POST['Country'];
       $State=$_POST['State'];
       $Dist=$_POST['Dist'];
       $City=$_POST['City'];
       $HR=$_POST['HR'];
       $Tel=$_POST['Tel'];
       $file=$_POST['PName'];
       $experience=$_POST['experience'];
    $q="UPDATE `vacancy` SET `JobTitle`='$JobTitle',`Requirement`='$Req',`Address`='$Add',`Country`='$Country',
    `State`='$State',`District`='$Dist',`City`='$City',`HRContact`='$HR',`OfficeTel`='$Tel',
    `ProfileName`='$file',`experience`='$experience' WHERE `CompanyId`='$n' AND `vacancy`='$vacancy'
      ";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        
        echo 'Updated Vacancy successfully';
        
    }
    else
    {
        echo mysqli_error($dbc);
    }
    mysqli_close($dbc);
    exit();
}
?>
<?php
                    require('config.php');
                    $sql1=mysql_query("SELECT * FROM `vacancy` WHERE `CompanyId`='$n' AND `vacancy`='$vacancy'");
                    if($sql1)
                    {
                    while($row1=mysql_fetch_array($sql1))
                    {
                        
 ?>
<form action="updatevacancy.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="vacancy" value="<?php echo $row1['vacancy'];?>" />
<label>Job Title</label>
<input type="text" name="JobTitle" value="<?php echo $row1['JobTitle'];?>">
<label>Requirement</label>
<input type="text" name="Req"value="<?php echo $row1['Requirement'];?>">
<label>Address</label>
<textarea name="Add" ><?php echo $row1['Address'];?></textarea>
<label>Country</label>
<input type="text" name="Country"value="<?php echo $row1['Country'];?>">
<label>State</label>
<input type="text" name="State"value="<?php echo $row1['State'];?>">
<label>District</label>
<input type="text" name="Dist"value="<?php echo $row1['District'];?>">
<label>City</label>
<input type="text" name="City"value="<?php echo $row1['City'];?>">

<label>HR Contact</label>
<input type="text" name="HR"value="<?php echo $row1['HRContact'];?>">
<label>Office Number</label>
<input type="text" name="Tel"value="<?php echo $row1['OfficeTel'];?>">
<label>Experience</label>
<input type="text" name="experience"value="<?php echo $row1['experience'];?>">
</div>

                                <div class=" gallery-item isotope-item on-sale ">
<label>Company Profile</label>
    <textarea class="ckeditor" name="PName"><?php echo $row1['ProfileName'];?></textarea>
    <br />
    <input type="submit"id="submit" class="real-btn">
</form>
 
<form action="companyimage.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="vacancy" value="<?php echo $row1['vacancy'];?>" />

<img src="upload/Company/<?php echo $row1['ImageName'];?>" width="200px" height="200px">
<label>Upload Company Image</label>
<input type="file" name="userfile">
<br />

    <input type="submit"id="submit" class="real-btn">
</form>
<?php
} 
}
else
{
    echo mysql_error();
}
 ?>

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