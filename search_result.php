<?php
require 'header.php'; 
?>

        <!-- Content -->
    <div class="container contents lisitng-grid-layout">
        <div class="row">
            <div class="span9 main-wrap">

                <!-- Main Content -->
                <div class="main">

                    <section class="listing-layout">
<?php
require 'connect.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $errors=array();

if(empty($_POST['job']))
{
    $errors[]= 'Not entered job description';
}
else
{
    $job=$_POST['job'];
}
if(empty($_POST['state']))
{
    $errors[]='Not entered State';
}
else
{
    $state=$_POST['state'];
}
if($_POST['experience']==0)
{
    $experience=$_POST['experience'];
}
else
{
    $experience=$_POST['experience'];
}
    if(empty($errors))
    {
        $q="SELECT * FROM `vacancy` WHERE `JobTitle`='$job' AND `State`='$state' AND `experience`='$experience'";
        $r=mysql_query($q);
        if($r)
        {
            $fetch=mysql_num_rows($r);
            ?>
    
                    <h3 class="title-heading">Available Jobs<span id="jobs-counter">(<?php echo $fetch; ?>)</span></h3>
                            <div class="about-agent clearfix">
            <?php
                    if($fetch>0)
                    {
                        ?>
                        

                        
                            <?php
                        while($row=mysql_fetch_array($r))
                        {
                            $com=$row['CompanyId'];
                            $q3=mysql_query("SELECT * FROM `company` WHERE `CompanyId`='$com'");
                            if((mysql_num_rows($q3))>0)
                            {
                            while($row2=mysql_fetch_array($q3))
                            {
                                
                            
                        ?>
                        
                         
                        
                            <div class="span6 ">
                            
                                <article class="property-item clearfix">
                                <h5 class="price"><?php echo $row2['CompanyName'].'</h5>';
                            }
                            }
                            else
                            {
                                echo '<div class="span6 ">
                            
                                <article class="property-item clearfix"><h5 class="price">Get Job</h5>';
                            }
                            ?>


                                    

                                    <figure>
                                        <a href="#" >
                                            <img src="upload/Company/<?php echo $row['ImageName'];?>" class="attachment-property-thumb-image wp-post-image" >
                                        </a>
                                    </figure>

                                    <div class="detail">
                                        <h4><span>Job Title: <?php echo $row['JobTitle'];?></span></h4>
                                        <h4><span>Requirement: <?php echo $row['Requirement'];?></span></h4>
                                        <p><span><?php echo $row['ProfileName'];?></span></p>
                                        <h4><span><?php echo $row['Address'];?>,
                            <?php echo $row['City'];?>,
                            <?php echo $row['District'];?>,
                            <?php echo $row['State'];?>,
                            <?php echo $row['Country'];?></span></h4>
                                        
                                    </div>
                                    <div class="follow-agent clearfix">
                                    
                                    <?php echo '<a class="real-btn btn" href="seeker.php">Register To Apply</a>';
                            ?>
                              
                                </div>
                              
                                </article>
                            </div>
  
                        
                            
                            
                            
                            
                            
                            
                        
                        
                        
                        <?php
                        }
                        
            }
            else
            {
                ?>
                <div class="list-container clearfix">
                <div class="span6 ">
                                <article class="property-item clearfix">

            <?php    echo 'No result found for your searched result';?>
             </article>
                            </div>
  
            <?php
            }
        }
        else
        {
            echo mysql_error();
        }
    }
    else
    {
        ?>
<div class="list-container clearfix">
 <h3 class="title-heading">Error Occured</h3>
                <div class="span6 ">
                                <article class="property-item clearfix">
<?php
        echo '<p class="tip">The folowing errors(s)occured:<br/>';
        foreach($errors as $msg)
        {
            
            $message="-$msg<br/>";
            echo $message;
        }
        
        echo 'please try again<i class="icon-remove"></i></p>';
            
?>
</article>
                            </div>
<?php
    }
}
?>
</div>
</section>

</div>
</div>
<!-- Sidebar -->
            <div class="span3 sidebar-wrap">

                <!-- Sidebar -->
                <aside class="sidebar">
                    <section class="widget advance-search">
                    <h4 class="title search-heading">Job Search<i class="icon-search"></i></h4>
                    <div id="gallery-container" style="background-color:#FF9900">
                    <form class="advance-search-form clearfix" action="search_result.php" method="POST">
                            <div>
                                <label>Job Keyword</label>
                                    <input type="text" name="job"  placeholder="Job Description"  class="required">
                                <label>Location</label>
                                    <span class="selectwrap">
                                        <select name="state">
                                        <?php
                                            
                                            $q="SELECT * FROM country";
                                            $r=mysql_query($q);
                                            if($r)
                                            {
                                                $fetch=mysql_num_rows($r);
                                                if($fetch>0)
                                                {
                                                    while($row=mysql_fetch_array($r))
                                                    {
                                                        echo '<option value="'.$row['state'].'">'.$row['state'].'</option>';
                                                    }
                                                
                                                }
                                                else
                                                {
                                                    echo 'No data found on this date ';
                                                }
                                            }
                                            else
                                            {
                                                echo mysqli_error();
                                            }
                                    ?>
                                        </select>
                                    </span>
                                    <div>
                                    <label>Experience</label>
                                    <span class="selectwrap">
                                        <select name="experience" >
                                        <option value="0">Freshers</option>
                                        <option value="1">1yr</option>
                                        <option value="2">2yrs</option>
                                        <option value="3">3yrs</option>
                                        <option value="4">4yrs</option>
                                        <option value="5">5yrs</option>
                                        <option value="6">6yrs</option>
                                        <option value="7">7yrs</option>
                                        <option value="8">8yrs</option>
                                        <option value="9">9yrs</option>
                                     </select>
                                    </span>
                                </div>
                            </div>
                            <input type="submit" value="Search" class=" real-btn btn">
                        </form>
                        </div>
                    </section>
                    </aside>
                    </div>
</div>
</div>

<?php
require 'footer.php'; 
?>