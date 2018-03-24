<?php
require 'header1.php';
?>

        <!-- Content -->
    <div class="container contents lisitng-grid-layout">
        <div class="row">
            <div class="span9 main-wrap">

                <!-- Main Content -->
                <div class="main">

                    <section class="listing-layout">
<?php
session_start();
require 'connect.php';
if(isset($_SESSION['seekerid'])>0)
{
    $n=$_SESSION['seekerid'];

    $vacancy=$_GET['vacancy'];
    $q5=mysql_query("SELECT * FROM `application` WHERE `SeekerId`='$n'");
    if($q5)
    {
       if((mysql_num_rows($q5)>0))
       {
         ?>
        <div class="list-container clearfix">
 <h3 class="title-heading">Applied Success</h3>
                <div class="span6 ">
                                <article class="property-item clearfix">
<?php
        echo '<h3>Already Applied for the job</h3>';?>
     
    </section>
                    </aside>
                    </div>
</div>
</div>

    <?php
       }
       else
       {             
                $q1="SELECT * FROM `vacancy` WHERE `vacancy`='$vacancy'";
                $r1=mysql_query($q1);
                if($r1)
                {
                        while($row=mysql_fetch_array($r1))
                        {
                            $company=$row['CompanyId'];
                        }
                    
                }
                else
                {
                    echo mysqli_error();
                }
        
    $q="INSERT INTO `application`(`CompanyId`, `SeekerId`, `vacancy`) VALUES ('$company','$n','$vacancy')";
    $r=mysql_query($q);
    if($r)
    {
        ?>
        <div class="list-container clearfix">
 <h3 class="title-heading">Applied Success</h3>
                <div class="span6 ">
                                <article class="property-item clearfix">
<?php
        echo '<h3>Applied for the job</h3>';?>
    <?php
    }

    else
    {
        echo mysql_error();
    }
    }
}
else
{
    echo mysql_error();
}

    ?>
    </section>
                    </aside>
                    </div>
</div>
</div>
<?php
}
else
{
  load('seekerlogin.php');  
}
?>
<?php
require 'footer.php';
?>