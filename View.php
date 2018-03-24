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
						 <h1><strong style="color:#FF0000"><u>POSTED VACANCIES</u></strong></h1></br></br> 
                    
<table style="bgcolor:#FFFFCC">
<tr>
<th>Photo</th>
<th>Company Id</th>
<th>Job Title</th>
<th>Requirement</th>
<th>Address</th>
<th>Country</th>
<th>State</th>
<th>District</th>
<th>City</th>
<th>HR Contact</th>
<th>Office Tel</th>
<th>Profile</th>
<th>Update</th>
<th>Delete</th>
</tr>
<tr>
<?php
require 'config.php';
$q1="SELECT * FROM `vacancy`";
            $r1=mysql_query($q1);
            while($row=mysql_fetch_array($r1))
                    {
?>
<td>
<img src="upload\Company\<?php echo $row['ImageName'];?>" width="50px" height="50px"/><br />
</td><td>
<?php  echo $row['CompanyId']; ?><br />
</td><td>
<?php echo $row['JobTitle'];?><br />
</td><td>
<?php                  echo $row['Requirement'];?><br />
</td><td>
<?php                   echo $row['Address'];?><br />
</td><td>
<?php                        echo $row['Country'];?><br />
</td><td>
<?php                        echo $row['State'];?><br />
</td><td>
<?php                        echo $row['District'];?><br />
</td><td>
<?php                        echo $row['City'];?><br />
</td><td>
<?php                        echo $row['HRContact'];?><br />
</td><td>
<?php                        echo $row['OfficeTel'];?><br />
</td><td>
<?php                        echo $row['ProfileName'];?><br />
</td>
<?php $vacancy=$row['vacancy']; ?>
<td><a class="real-btn" href="updatevacancy.php?vacancy=<?php echo $vacancy;?>">Update</a></td>
<td><a class="real-btn" href="deletevacancy.php?vacancy=<?php echo $vacancy;?>">Delete</a></td>
</tr>
<?php
}
?>

</table>
<?php
}
else
{
  load('companysignup.php'); 
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