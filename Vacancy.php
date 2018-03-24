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
            <div class="span12 main-wrap" align="center">

                <!-- Main Content -->
                <div class="main">                               
                        <!-- Gallery Container -->
                        
                            <div class="gallery-2-columns isotope clearfix" align="center">
                              <h1><strong style="color:#FF0000"><u>POST VACANCY</u></strong></h1></br></br> 
                                <div class="gallery-item isotope-item on-rent">


<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include 'connect123_db.php';
    $errors=array();
    if(empty($_POST['JobTitle']))
    {
        $errors[]='Enter Job Title';
    }
    else
    {
        $JobTitle=$_POST['JobTitle'];
    }
    if(empty($_POST['Req']))
    {
        $errors[]='Enter Requirements';
    }
    else
    {
       $Req=$_POST['Req'];
    }
    if(empty($_POST['Add']))
    {
        $errors[]='Enter Company Address';
    }
    else
    {
       $Add=$_POST['Add'];
    }
    if(empty($_POST['Country']))
    {
        $errors[]='Enter Your Country';
    }
    else
    {
       $Country=$_POST['Country'];
    }
    if(empty($_POST['State']))
    {
        $errors[]='Enter Your State';
    }
    else
    {
       $State=$_POST['State'];
    }
    if(empty($_POST['Dist']))
    {
        $errors[]='Enter Your District';
    }
    else
    {
       $Dist=$_POST['Dist'];
    }
    if(empty($_POST['City']))
    {
        $errors[]='Enter Your City';
    }
    else
    {
       $City=$_POST['City'];
    }
    if(empty($_POST['HR']))
    {
        $errors[]='Enter HR Contact Number';
    }
    else
    {
       $HR=$_POST['HR'];
    }
    if(empty($_POST['Tel']))
    {
        $errors[]='Enter Office Telephone Number';
    }
    else
    {
       $Tel=$_POST['Tel'];
    }
    if(empty($_POST['PName']))
    {
        $errors[]='Enter Company Profile';
    }
    else
    {
       $file=$_POST['PName'];
    }
    if(empty($_POST['experience']))
    {
          $errors[]='Enter Work Experience';
    }
    else
    {
       $experience=$_POST['experience'];
    }
      
    
    if($_FILES["Companyimage"]["error"]>0)
    {
        $errors[]='Upload Seeker photo';
    }
    else
    {
        
        
        if($_FILES["Companyimage"]["name"])
        {
            
                $image=$n.'.jpg';
                move_uploaded_file($_FILES["Companyimage"]["tmp_name"],"upload/Company/".$image);
            
        }
    }
    
if(empty($errors))
{
    $q="INSERT INTO `vacancy`( `CompanyId`, `JobTitle`, `Requirement`, `Address`, `Country`,
     `State`, `District`, `City`, `HRContact`, `OfficeTel`, `ProfileName`,
      `ImageName`,`experience`) VALUES ('$n','$JobTitle','$Req','$Add','$Country','$State','$Dist','$City','$HR','$Tel','$file','$image','$experience')
      ";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        
        echo 'Inserted Vacancy successfully';
        
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

<form action="Vacancy.php" method="POST" enctype="multipart/form-data">

<label>Job Title</label>
<input type="text" required name="JobTitle" placeholder="Enter Job Title">
<label>Requirement</label>
<input type="text" required name="Req" placeholder="Enter Requirement">
<label>Address</label>
<textarea name="Add" placeholder="Enter Address" ></textarea>

<label>Country</label>
<input type="text"  hidden value="India" name="Country" >



<label style="margin-right:51px;">State</label>
<select name="State" class="state">
                <option selected="selected">--Select State--</option>
                <?php
                    require('config.php');
                    $sql=mysql_query("SELECT `state` FROM `country`");
                    while($row=mysql_fetch_array($sql))
                    {
                        echo '<option value="'.$row['state'].'">'.$row['state'].'</option>';
                    } ?>
		          </select>        
<!--
<label>State</label>
<input type="text" name="State"> -->
<label>District</label>
<input type="text" required name="Dist" placeholder="Enter District">
<label>City</label>
<input type="text" required name="City" placeholder="Enter City">
</div>
<div class="gallery-item isotope-item on-rent">

<label>HR Contact</label>
<input type="number" required maxlength=10 name="HR" placeholder="Enter Contact Number">

<label>Office Number</label>
<input type="number" required name="Tel" placeholder="Enter Contact Number">

<label>Experience</label>
<input type="number" name="experience" placeholder="Enter  Number of Year" />
<label>Company Profile</label>
<textarea class="ckeditor" name="PName" placeholder="Enter Description"></textarea>
<label>Upload Company Image</label>
<input type="file" name="Companyimage">
<br />
</div></div>
                  <input type="submit"id="submit" class="real-btn">
				  <input type="reset"  class=" real-btn btn">
</form>


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