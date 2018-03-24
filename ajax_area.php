<?php
require('config.php');

if($_POST['id'])
{
$id=$_POST['id'];
$sql=mysql_query("SELECT Area FROM `area` WHERE  District='$id' ORDER BY Area ASC");
echo '<option selected="selected">--Select Area--</option>';
while($row=mysql_fetch_array($sql))
{
echo '<option value="'.$row['Area'].'">'.$row['Area'].'</option>';
}
}

?>