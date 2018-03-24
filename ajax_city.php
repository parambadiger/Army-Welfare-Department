<?php
require('config.php');

if($_POST['id'])
{
$id=$_POST['id'];
echo $id;
$sql=mysql_query("SELECT `district` FROM `states` WHERE `state`='$id' ORDER BY district ASC");
echo '<option selected="selected">--Select District--</option>';
while($row=mysql_fetch_array($sql))
{
echo '<option value="'.$row['district'].'">'.$row['district'].'</option>';
}
}

?>