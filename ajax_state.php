<?php
require('config.php');

if($_POST['id'])
{
$id=$_POST['id'];
$sql=mysql_query("SELECT `state` FROM `country` WHERE country='$id' ");
echo '<option selected="selected">--Select State--</option>';
while($row=mysql_fetch_array($sql))
{
echo '<option value="'.$row['state'].'">'.$row['state'].'</option>';
}
}

?>