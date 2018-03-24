<?php
session_start();
require 'connect.php';
if(isset($_SESSION['username'])>0)
{
    $n=$_SESSION['username'];
    
?>
<?php
require 'header1.php';
?>
<!-- Content -->
    <div class="container contents lisitng-grid-layout">
        <div class="row">
            <div class="span12 main-wrap">

                <!-- Main Content -->
                <div class="main">                               
                        <!-- Gallery Container -->
                        <div class="span12 main-wrap" align="center">
					<h1><strong style="color:#FF0000"><u>LIST OF EX-ARMY PEOPLE</u></strong></h1></br></br>
                    <table>
                    <tr>
                    <th>Email</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Mobile No.</th>
                    <th>Landline No.</th>
                    <th>Approve</th>
                    <th>Options</th>
                    
                    </tr>
<?php
                    require('config.php');
                    $sql1=mysql_query("SELECT * FROM `seeker`");
                    if($sql1)
                    {
                    while($row1=mysql_fetch_array($sql1))
                    {
                        $seeker=$row1['SeekerId'];
                    echo '<tr><td>'.$row1['EMAIL'].'</td>
                    <td>'.$row1['FirstName'].$row1['MidleName'].$row1['LastName'].'</td>
                    <td>'.$row1['DOB'].'</td><td>'.$row1['Gender'].'</td>
                    <td>'.$row1['MobileNo'].'</td><td>'.$row1['LandNo'].'</td>
                    
                    <td>'.$row1['approve'].'</td><td><a class="real-btn btn-mini"  href="unapproveseeker.php?seeker='.$seeker.'">Un Approve</a> <a class="real-btn btn-mini"  href="approveseeker.php?seeker='.$seeker.'">Approve</a> <a class="real-btn btn-mini" href="deleteseeker.php?seeker='.$seeker.'">Delete</a></td></tr>';
           }
           }
?>
</table>
<?php
}
else
{
  load('adminlogin.php'); 
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