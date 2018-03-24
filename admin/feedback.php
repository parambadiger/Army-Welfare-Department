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
            <div class="span12 main-wrap" align="center">

                <!-- Main Content -->
                <div class="main">                               
                        <!-- Gallery Container -->
                         <div class="span12 main-wrap" align="center">
                            <div class="gallery-2-columns isotope clearfix">
                               
                                <div class="gallery-item isotope-item on-rent">
                   <h1><strong style="color:#FF0000"><u>FEEDBACK</u></strong></h1></br></br>
                    <table>
                    <tr>
                    <th>Name</th>
                    <th>Mail</th>
                    <th>Message</th>
                     <th>Delete</th>
                    
                    </tr>
<?php
                    require('config.php');
                    $sql1=mysql_query("SELECT * FROM feedback");
                    if($sql1)
                    {
                    while($row1=mysql_fetch_array($sql1))
                    {
                         
                    $vacancy=$row1['name'];
                        
                    echo '<tr><td>'.$row1['name'].'</td>
                    <td>'.$row1['email'].'</td>
                    <td>'.$row1['question'].'</td>

                    <td><a class="real-btn btn-mini" href="feedback58.php?vacancy='.$vacancy.'">Delete</a></td></tr>';
           }
           }
?>
</table>

		</div>
				<h1><strong style="color:#FF0000"><u>NOTICE</u></strong></h1></br></br>
                    <table>
                    <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Url</th>
					<th>Date</th>
					<th>Contact</th>
                    <th>Option</th>
                    
                    </tr>
					
<?php
                    require('config.php');
                    $sql1=mysql_query("SELECT * FROM noti");
                    if($sql1)
                    {
                    while($row1=mysql_fetch_array($sql1))
                    {
                         $kip=$row1['id'];
                  //  $vacancy=$row1['title'];
                        
                    echo '<tr><td>'.$row1['title'].'</td>
                    <td>'.$row1['desc'].'</td>
                    <td>'.$row1['url'].'</td>
					<td>'.$row1['date'].'</td>
					<td>'.$row1['contact'].'</td>

                    <td><a class="real-btn btn-mini" href="feedback58.php?delnoti='.$kip.'">Delete</a></td></tr>';
           }
           }
?>
</table>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add New</button>


<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ADD NEW JOB INFO </h4>
        </div>
        <div class="modal-body">
		
     <form action="" method="POST">
	 Title<br/>
	 <input type="text" required name="a" class="form-control" placeholder="Title" /><br/>
	 Date<br/>
	 <input type="date" required name="b" class="form-control" placeholder="Date" /><br/>
	 Description<br/>
	 <textarea name="c"></textarea><br/>
	 Url<br/>
	 <input type="text" required name="d" class="form-control" placeholder="Title" /><br/>
	 Contact<br/>
	 <input type="text" required name="e" class="form-control" placeholder="Title" /><br/>
	 
	 <input type="submit" name="addnewnotice" value="Add new notice" />
	 
	 </form>
	 
	 
	 
	 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  
  <?php
  if(isset($_POST['addnewnotice']))
  {
	 echo $a=$_POST['a']; 
	 echo $b=$_POST['b']; 
	 echo $c=$_POST['c']; 
	 echo $d=$_POST['d']; 
	 echo $e=$_POST['e']; 
     require('config.php');
mysql_query("INSERT INTO `job`.`noti` (`id`, `title`, `desc`, `date`, `url`, `contact`) VALUES (NULL, '$a', '$c', '$b', '$d', '$e');");	 
	 
header("location:feedback.php");
  }
  ?>
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