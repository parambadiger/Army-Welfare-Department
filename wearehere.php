<?php
require 'header.php';
?>
<!-- Content -->
    <div class="container contents lisitng-grid-layout">
        <div class="row">
            <div class="span12 main-wrap">
                <!-- Main Content -->
                <div class="main">                
                        <!-- Gallery Container -->
                        <div  class="span12 main-wrap">
                            <div class="gallery-2-columns isotope clearfix">

                                <div class="gallery-item isotope-item on-rent ">
    <h5><font color="#000033" size="+1">Name: </font><font color="#990033" size="+1" > Mr.Paramanand Badiger</h5></font><br/>
    <p><h5><font color="#000033" size="+1">College: </font><font color="#990033" size="+1"> KSCD Department of Computer Science</h5><br /></font>

     <h5><font color="#000033" size="+1">G-mail: </font><font color="#990033" size="+1"> parameshbadiger245@gmail.com </h5> <br /></font>
     <h5><font color="#000033" size="+1">Cell No.: </font><font color="#990033" size="+1"> 8792631798</h5> <br /></p></font>
     <br />   
    </div>
                                
     
     
   <div class="gallery-item isotope-item on-rent ">
     <h5><font color="#000033" size="+1">Name: </font><font color="#990033" size="+1"> Mis.Deepa Hegri</h5></font><br/>
    <p><h5><font color="#000033" size="+1">College: </font><font color="#990033" size="+1"> KSCD Department of Computer Science</h5><br /></font>

     <h5><font color="#000033" size="+1">G-mail: </font><font color="#990033" size="+1"> deepahegri@gmail.com</h5> <br /></font>
     <h5><font color="#000033" size="+1">Cell No.: </font><font color="#990033" size="+1"> 8553918113</h5><br /></p></font>
	 <br/>
	 
	 
    
  </div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>



    <div class="container contents lisitng-grid-layout">
        <div class="row">
            <div class="span12 main-wrap">
                <!-- Main Content -->
                <div class="main">
                        <!-- Gallery Container -->                       
                            <div class="gallery-columns isotope clearfix">
<?php
                                if($_SERVER['REQUEST_METHOD']=='POST')
                                {
                                     require('config.php');
                                    $name=$_POST['a'];
                                    $email=$_POST['b'];
                                    $question=$_POST['c'];
                                    $q="";
                                    $r=mysql_query($q);
                                    if($r)
                                    {
                                        echo '<h3 style="margin-left:120px;">Thank You. Your Query Has Been Registered. We Will Soon Contact You.</h3>';
                                    }
                                }
                                ?>
                                <div  align="center">
                                
                                    
 <form method="POST" action="advcbc.php">

    <h1><strong style="color:#FF0000"><u>LEAVE YOUR QUERY HERE</u></strong></h1></br></br>
    <label>Name</label>
    <input type="text" name="a" placeholder="Name" required /><br/></br>
    <label>Enter Your E-Mail ID</label>
    <input type="email" name="b" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="xyz@something.com"><br/></br>
    <label>Question</label>
       <input type="text" name="c" placeholder="Question" required><br/></br>
	       <input type="submit" id="submit" value="Send" class="real-btn" name="ok">
 </form>
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