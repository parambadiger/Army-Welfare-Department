<?php
require 'header.php';
?>
<!-- Content -->
    <div class="container contents lisitng-grid-layout">
        <div class="row" >
            <div class="span12 main-wrap" >

                <!-- Main Content -->
                <div class="main">                               
                        <!-- Gallery Container -->
                        <div class="span12 main-wrap" align="center" >
						                
						              
									    <h1><strong style="color:#FF0000"><u>ARMY EMPLOYMENT NEWS</u></strong></h1></br></br>
<style type="text/css">
table.hovertable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #999999;
	border-collapse: collapse;
	width:95%;
	align:center;
}
table.hovertable th {
	background-color:#c3dde0;
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.hovertable tr {
	background-color:#d4e3e5;
}
table.hovertable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
</style>



<table align="center" class="hovertable">
  <tr>
    <th scope="col">SL</th>
    <th scope="col">Title</th>
    <th scope="col">Description</th>
    <th scope="col">Date</th>
    <th scope="col">URL</th>
    <th scope="col">Contact number</th> 

  </tr>
  
  <?php
  mysql_connect("localhost","root","");
  mysql_select_db("job");
  
$res=mysql_query("select * from noti");
$i=1;
while($row=mysql_fetch_array($res))
{  
$kid=$row['id'];
echo "<tr>
    <td>".$i."</td>
    <td>".$row['title']."</td>
    <td>".$row['desc']."</td>
    <td>".$row['date']."</td>
    <td>".$row['url']."</td>
    <td>".$row['contact']."</td>

  </tr>";
  $i=$i+1;
 } 
  ?>
  
  
</table>






</div>
</div>
</div>
</div>


<?php
require 'footer.php';
?>