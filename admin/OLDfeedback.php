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

                    <section class="listing-layout">
                    <h3 class="title-heading">Posted FeedBack</h3>
                    <table>
                    <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>

                    
                    </tr>
                    <?php
                    require('config.php');
                    $sql1=mysql_query("SELECT * FROM feedback ");
                    if($sql1)
                    {
                    while($row1=mysql_fetch_array($sql1))
                    {
                         
                     $vacancy=$row1['name'];
                        
                    echo '<tr><td>'.$row1['name'].'</td>
                    <td>'.$row1['email'].'</td>
                    <td>'.$row1['question'].'</td>

                    <td><a href="feedback58.php"?vacancy='.$vacancy.'" class="real-btn btn-mini" >Delete</a></td></tr>';
           }
           }
?>
</table>
* Company Id:0 means it is posted by Admin.
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