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
                
                        

<?php
                    require('config.php');
                    $sql1=mysql_query("SELECT * FROM `application` WHERE `CompanyId`='$n'");
                    if($sql1)
                    {
                        while($row1=mysql_fetch_array($sql1))
                        {
                         $seeker=$row1['SeekerId'];
                         $vacancy=$row1['vacancy'];
                           echo'<div class="main">

                    <section class="listing-layout"><h3 class="title-heading">Job Applied:'; 
                                
                                $sql3=mysql_query("SELECT * FROM `vacancy` WHERE `vacancy`='$vacancy' AND CompanyId='$n'");
                                if($sql3)
                                {
                                    while($row3=mysql_fetch_array($sql3))
                                    {
                             
                                    echo $row3['JobTitle'];
                                    }
                                    
                                }
                           echo'</h3>
                           <div class="list-container">
                            <article class="about-agent clearfix">';
                            ?>
                                

                       <?php
                            $sql2=mysql_query("SELECT * FROM `seeker` WHERE `SeekerId`='$seeker'");
                    if($sql2)
                    {
                    while($row2=mysql_fetch_array($sql2))
                    {
                        ?>
                        <h4><a href="#"><?php echo $row2['FirstName'];?> <?php echo $row2['MidleName'];?> <?php echo $row2['LastName'];?></a></h4>
                         <figure>
                                    <a  href="#">
                                        <img src="upload/seeker/photo/<?php echo $row2['ImageName'];?>"/>
                                    </a>
                         </figure>
                         <div class="detail">
                                    <p><em>Date Of Birth: <?php echo $row2['DOB'];?></em><em> Gender: <?php echo $row2['Gender'];?></em></p>
                                    <p><em>Address: <?php echo $row2['Address'];?> <?php echo $row2['City'];?> <?php echo $row2['District'];?> <?php echo $row2['State'];?></em></p>
                                    
                                    <p><em>Experience: <?php echo $row2['Experience'];?> years</em><em> Skills: <?php echo $row2['Skills'];?></em><em> Functional Area: <?php echo $row2['FunArea'];?></em></p>
                                   <p><em>Basic Education: <?php echo $row2['BasicEdu'];?></em><em> Higher Education: <?php echo $row2['MasterEdu'];?></em></p>                        
                       
                       
                                    
                                    <p class="contact-types">
                                        <em>Landline: <?php echo $row2['LandNo'];?></em>
                                        <em>Mobile: <?php echo $row2['MobileNo'];?></em>
                                        <em>Fax: 041-789-4561</em>                                                    </p>
                                    <div class="follow-agent clearfix">
                                    <a class="real-btn btn" href="upload/seeker/resume/<?php echo $row2['ResumeName'];?>">View Resume</a>
                                    
                                </div>
                         
                       
                       </article>
              <?php          
                        
                    }
                    }
                    ?></section></div><br/>
                    <?php
                                
                        }
                    }
                    
 ?>
 
 <?php


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