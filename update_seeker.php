<?php
session_start();
require 'connect.php';
if(isset($_SESSION['seekerid'])>0)
{
    $n=$_SESSION['seekerid'];
    
    
?>
<?php
require 'header1.php';
?>
<!-- Content -->
    <div class="container contents lisitng-grid-layout">
        <div class="row">
            <div class="span12 main-wrap" align="center">

                <!-- Main Content -->
                <div class="main">                               
                        <!-- Gallery Container -->
                        
                            <div class="gallery-2-columns isotope clearfix" align="center ">
                              <h1><strong style="color:#FF0000"><u>UPDATE SEEKER</u></strong></h1></br></br> 
                                <div class="gallery-item isotope-item on-rent">
						               
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
    
    include 'connect123_db.php';
        $fn=$_POST['fname'];
        $mn=$_POST['mname'];
        $ln=$_POST['lname'];
        $dob=$_POST['dob'];
        $gen=$_POST['gender'];
        $add=$_POST['address'];
        $state=$_POST['state'];
        $district=$_POST['district'];
        $city=$_POST['city'];
        $mob=$_POST['mobileno'];
        $land=$_POST['landline'];
        $work=$_POST['work'];
        $key=$_POST['key'];
        $fun=$_POST['functional'];
        $basic=$_POST['basic'];
        $master=$_POST['master'];
    $q="UPDATE `seeker` SET `FirstName`='$fn',`MidleName`='$mn',`LastName`='$ln',
            `DOB`='$dob',`Gender`='$gen',`State`='$state',
            `Address`='$add',`District`='$district',`City`='$city',
            `MobileNo`='$mob',`LandNo`='$land',`Experience`='$work',
            `Skills`='$key',`FunArea`='$fun',`BasicEdu`='$basic',
            `MasterEdu`='$master' WHERE 
            `SeekerId`='$n'";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
     
           
        echo 'Updated Seeker successfully';
        
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
                    $sql1=mysql_query("SELECT * FROM `seeker` WHERE `SeekerId`='$n'");
                    if($sql1)
                    {
                    while($row1=mysql_fetch_array($sql1))
                    {
                        
 ?>   
 <form action="seekerimage.php" method="POST" enctype="multipart/form-data">
<img src="upload/seeker/photo/<?php echo $row1['ImageName']; ?>" width="200px" height="200px">
<label>Upload your Photo</label>
<input type="file" name="userfile">
   <br />
                  <input type="submit"id="submit" class="real-btn">
</form>              


<form action="update_seeker.php" method="POST" enctype="multipart/form-data">
<label>First name</label>
<input type="text" name="fname" value="<?php echo $row1['FirstName'];?>">
<br/><br/><label>Middle Name</label>
<input type="text" name="mname"value="<?php echo $row1['MidleName'];?>">
<br/><br/><label>Last Name</label>
<input type="text" name="lname"value="<?php echo $row1['LastName'];?>">
<br/><br/><label>Date Of Birth</label>
<input type="date" name="dob" placeholder="dd/mm/yyyy"value="<?php echo $row1['DOB'];?>">
<br/><br/><label>Gender</label>
<select name="gender">
    <option value="<?php echo $row1['Gender'];?>"><?php echo $row1['Gender'];?></option>
    <option value="male">Male</option>
    <option value="female">Female</option>
    </select>
<br/><br/><label>Postal Address</label>
<textarea name="address" name="address" <?php echo $row1['Address'];?>></textarea>
</div>
				  <div class="gallery-item isotope-item on-rent">
<label style="margin-right:51px;">State</label>
<select name="state" class="state">
                <option value="<?php echo $row1['State'];?>"><?php echo $row1['State'];?></option>
                <?php
                    require('config.php');
                    $sql=mysql_query("SELECT `state` FROM `country`");
                    while($row=mysql_fetch_array($sql))
                    {
                        echo '<option value="'.$row['state'].'">'.$row['state'].'</option>';
                    } ?>
		          </select>
                  <br/><br/><label style="margin-right:38px;">District</label>
                  
                   <input type="text" name="district" value="<?php echo $row1['District'];?>">
                 
                  <br/><br/><label>City</label>
                  <input type="text" name="city" value="<?php echo $row1['City'];?>">
                  <br/><br/><label>Mobile Number</label>
                  <input type="text" name="mobileno" value="<?php echo $row1['MobileNo'];?>">
                  <br/><br/><label>Landline</label>
                  <input type="text" name="landline"value="<?php echo $row1['LandNo'];?>">
                  <br/><br/><label>WORK Experience</label>
                  <input type="text" name="work"value="<?php echo $row1['Experience'];?>">
                  <br/><br/><label>Army Type</label>
                  <input type="text" name="key"value="<?php echo $row1['Skills'];?>">
                  <br/><br/><label>Functional Area</label>
                  <input type="text" name="functional"value="<?php echo $row1['FunArea'];?>">
                  <br/><br/><label>Basic Education</label>
                  <input type="text" name="basic"value="<?php echo $row1['BasicEdu'];?>">
                  <br/><br/><label>Master Education</label>
                  <input type="text" name="master"value="<?php echo $row1['MasterEdu'];?>">  
				  <br />
				  </div></div>
                  <input type="submit"id="submit" class="real-btn">

</form>
</div>

                               

<?php
} 
}
else
{
    echo mysql_error();
}
 ?>
</body>
</html>
<script type="text/javascript">
$(document).ready(function()
{
	
$(".state").change(function()
{
var dataString = 'id='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_city.php",
data: dataString,
cache: false,
success: function(html)
{
$(".district").html(html);
} 
});

});

});
</script>
<?php
}
else
{
  load('seekerlogin.php');  
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