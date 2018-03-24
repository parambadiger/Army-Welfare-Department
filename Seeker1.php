<?php
session_start();
require 'connect.php';
if(isset($_SESSION['seekerid'])>0)
{
    $n=$_SESSION['seekerid'];
    
?><?php
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
    $errors=array();
    if(empty($_POST['fname']))
    {
        $errors[]='Enter First Name';
    }
    else
    {
        $fn=$_POST['fname'];
    }
    if(empty($_POST['mname']))
    {
        $errors[]='Enter Middle Name';
    }
    else
    {
        $mn=$_POST['mname'];
    }
    if(empty($_POST['lname']))
    {
        $errors[]='Enter Last Name';
    }
    else
    {
        $ln=$_POST['lname'];
    }
    if(empty($_POST['dob']))
    {
        $errors[]='Enter Date Of Birth';
    }
    else
    {
        $dob=$_POST['dob'];
    }
    if(empty($_POST['gender']))
    {
        $errors[]='Select your gender';
    }
    else
    {
        $gen=$_POST['gender'];
    }
    if(empty($_POST['address']))
    {
        $errors[]='Enter Your Postal Address';
    }
    else
    {
        $add=$_POST['address'];
    }
    if(empty($_POST['state']))
    {
        $errors[]='Choose Your State';
    }
    else
    {
        $state=$_POST['state'];
    }
    if(empty($_POST['district']))
    {
        $errors[]='Enter your District';
    }
    else
    {
        $district=$_POST['district'];
    }
    if(empty($_POST['city']))
    {
        $errors[]='Enter your City';
    }
    else
    {
        $city=$_POST['city'];
    }
    if(empty($_POST['mobileno']))
    {
        $errors[]='Enter your Mobile Number';
    }
    else
    {
        $mob=$_POST['mobileno'];
    }
    if(empty($_POST['landline']))
    {
        $errors[]='Enter Landline Number';
    }
    else
    {
        $land=$_POST['landline'];
    }
    if(empty($_POST['work']))
    {
        $errors[]='Enter work experiance';
    }
    else
    {
        $work=$_POST['work'];
    }
    if(empty($_POST['key']))
    {
        $errors[]='Enter your Key Skills'; 
    }
    else
    {
        $key=$_POST['key'];
    }
    if(empty($_POST['functional']))
    {
        $errors[]='In which Functional Area do you work';
    }
    else
    {
        $fun=$_POST['functional'];
    }
    if(empty($_POST['basic']))
    {
        $errors[]='Enter your Basic Education';
    }
    else
    {
        $basic=$_POST['basic'];
    }
    if(empty($_POST['master']))
    {
        $errors[]='Enter your Master Education';
    }
    else
    {
        $master=$_POST['master'];
    }
    
    if($_FILES["resume"]["error"]>0)
    {
        $errors[]='Upload Seeker photo';
    }
    else
    {
        
        
        if($_FILES["resume"]["name"])
        {
            
                $resume=$n.'.doc';
                move_uploaded_file($_FILES["resume"]["tmp_name"],"upload/seeker/resume/".$resume);
            
        }
    }
    if($_FILES["photo"]["error"]>0)
    {
        $errors[]='Upload Seeker photo';
    }
    else
    {
        
        
        if($_FILES["photo"]["name"])
        {
            
                $photo=$n.'.jpg';
                move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/seeker/photo/".$photo);
            
        }
    }
if(empty($errors))
{
    $q="UPDATE `seeker` SET `FirstName`='$fn',`MidleName`='$mn',`LastName`='$ln',
            `DOB`='$dob',`Gender`='$gen',`State`='$state',
            `Address`='$add',`District`='$district',`City`='$city',
            `MobileNo`='$mob',`LandNo`='$land',`Experience`='$work',
            `Skills`='$key',`FunArea`='$fun',`BasicEdu`='$basic',
            `MasterEdu`='$master',`ResumeName`='$resume',`ImageName`='$photo' WHERE 
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
else
{

    echo 'The folowing errors(s)occured:';
    foreach($errors as $msg)
    {
        
        $message="-$msg<br/>";
        echo $message;
    }
    
    echo 'please try again';
    mysqli_close($dbc);    

}
}
?>
<form action="seeker1.php" method="POST" enctype="multipart/form-data">
<label>First name</label>
<input type="text" required name="fname" placeholder="Enter First Name">
</br></br><label>Middle Name</label>
<input type="text" required name="mname" placeholder="Enter Middle Name">
</br></br><label>Last Name</label>
<input type="text" required name="lname" placeholder="Enter Last Name">
</br></br><label>Date Of Birth</label>
<input type="date" name="dob" placeholder="dd/mm/yyyy" required>
</br></br><label>Gender</label>
<strong>Male</strong><input type="radio" name="gender" value="male" checked="checked">
<strong>Female</strong><input type="radio" name="gender" value="female">
</br></br><label>Postal Address</label>
<textarea name="address" name="address" required placeholder="Enter Postal Address"></textarea>
</br></br><label style="margin-right:51px;">State</label>
<select name="state" class="state" required>
                <option selected="selected">--Select State--</option>
                <?php
                    require('config.php');
                    $sql=mysql_query("SELECT `state` FROM `country`");
                    while($row=mysql_fetch_array($sql))
                    {
                        echo '<option value="'.$row['state'].'">'.$row['state'].'</option>';
                    } ?>
		          </select>
                 
				  </br></br><label style="margin-right:38px;">District</label>
                 <input type="text" name="district" class="district" required placeholder="Enter District">
					 
                  </br></br><label>City</label>
                  <input required type="text" name="city" required placeholder="Enter City">
				  </div>
					<div class="gallery-item isotope-item on-rent">
                  <label>Mobile Number</label>
                  <input type="number" required  name="mobileno" placeholder="Enter Mobile Number">	 
				   </br></br><label>Landline</label>
                  <input type="number" required name="landline" placeholder="Enter Landline Number">
                  </br></br><label>WORK Experience</label>
                  <input type="number" name="work" placeholder="enter no of year" required /> 
                  </br></br><label>ARMY Type</label>
                  <input type="text" required name="key" placeholder="Enter Army Type">
                  </br></br><label>Functional Area</label>
                  <input type="text" required name="functional" placeholder="Enter Functional Area">
                  </br></br><label>Basic Education</label>
                  <input type="text" required name="basic" placeholder="Enter Basic Education">
                  </br></br><label>Master Education</label>
                  <input type="text" required name="master" placeholder="Enter Master Education">
                  </br></br><label>Upload your Resume</label>
                  <input type="file" name="resume" required>
                  </br></br><label>Upload your Photo</label>
                  <input type="file" name="photo" required>
                  <br /></div></div>
                  <input type="submit"id="submit" class="real-btn">
					<input type="reset" class="real-btn">
</form>

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