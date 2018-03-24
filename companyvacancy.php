<?php
session_start();
require 'connect.php';
if(isset($_SESSION['companyid'])>0)
{
    $n=$_SESSION['companyid'];
    echo '<a href="companylogout.php">Logout</a>';
?>
<table border="1">
<tr>
<th>Photo</th>
<th><label>Company Id:</label></th>
<th><label>Job Title:</label></th>
<th><label>Requirement:</label></th>
<th><label>Address:</label></th>
<th><label>Country:</label></th>
<th><label>State:</label></th>
<th><label>District</label></th>
<th><label>City:</label></th>
<th><label>HR Contact</label></th>
<th><label>Office Tel:</label></th>
<th><label>Profile</label></th>
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
<td><a href="updatevacancy.php?vacancy=<?php echo $vacancy;?>">Update</a></td>
<td><a href="vacancydelete.php?vacancy=<?php echo $vacancy;?>">Delete</a></td>
</tr>
<?php
}
?>

</table>
<?php
}
else
{
  load('companylogin.php'); 
}
?>