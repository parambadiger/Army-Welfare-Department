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
					<h1><strong style="color:#FF0000"><u>LIST OF OFFICES</u></strong></h1></br></br>
                    <table><tr>
                    <th>Email</th>
                    <th>Company Name</th>
                    <th>Description</th>
					 <th>ContactNo</th>
                    <th>Approve</th>
                    <th>Options</th>
                     </tr>
<?php
                    require('config.php');
                    $sql1=mysql_query("SELECT * FROM `company`");
                    if($sql1)
                    {
                    while($row1=mysql_fetch_array($sql1))
                    {
                         
                        $company=$row1['CompanyId'];
                    echo '<tr><td>'.$row1['EMAIL'].'</td>
                    <td>'.$row1['CompanyName'].'</td>
                    <td>'.$row1['Description'].'</td>
					<td>'.$row1['ContactNo'].'</td><td>'
                    .$row1['approve'].'</td><td><a class="real-btn btn-mini"  href="unapprovecompany.php?company='.$company.'">Un Approve</a> <a class="real-btn btn-mini"  href="approvecompany.php?company='.$company.'">Approve</a> <a class="real-btn btn-mini" href="deletecompany.php?company='.$company.'">Delete</a></td></tr>';
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