<?php
@include('frndzk.php');
if(isset($_GET['action']) && $_GET['action']=='addmeal' && isset($_POST['month']) && $_POST['month']!='' && isset($_POST['taka']) && $_POST['taka']!='' && isset($_POST['name']) && $_POST['name']!='') {
$date=$_POST['month'];
$date=strtotime($date);
$date=date("Y/m/d",$date);
$taka=$_POST['taka'];
$un=$_POST['name'];
$query="INSERT INTO meal_balance VALUES ('','$un','$date','$taka')";
mysql_query($query);
echo'Added.....';
}
if(isset($_GET['action']) && $_GET['action']=='deletebalance' && isset($_GET['id']) && $_GET['id']!='') {
$id=$_GET['id'];
mysql_query("DELETE FROM meal_balance WHERE id ='$id'");
echo'<br>DELETED.......<br>';
}
echo'<form action="?action=addmeal" method="POST"><h3>Input Meal Balance</h3>
yyyy/mm/dd : <input type="text" name="month" /> &nbsp; taka: <input type="text" name="taka" /> &nbsp; name: <select name="name">';
$result = @mysql_query("SELECT * FROM user ORDER by id desc");
if ( @mysql_num_rows($result) > 0 ) {
while($pages = @mysql_fetch_array($result)) {
echo'<option value="'.$pages['un'].'">'.$pages['un'].'</option>';
}
}
echo'</select>
&nbsp;
<input type="submit" name="save" value="Save" />
</form><br>';
echo'<form action="?action=showmeal" method="POST"><h3>Show a month\'s Daily Bazar</h3>
yyyy/m : <input type="text" name="month" /> &nbsp; <input type="submit" name="save" value="Save" />
</form><br><br>';
if(isset($_GET['action']) && $_GET['action']=='showmeal' && isset($_POST['month']) && $_POST['month']!='') {
$date=$_POST['month'];
$edate=$date.'/01';
$edate=strtotime($edate);
$edate=date("Y/m",$edate);


$id=1;
$uni=0;
$dayc=0;
$total[]=array();
$un=array();


echo '<h3>Showing All Balankce</h3><table border="1px" style="">';
$result = @mysql_query("SELECT * FROM meal_balance WHERE month LIKE'%$edate%' ORDER by id desc");
if ( @mysql_num_rows($result) > 0 ) {
while($pages = @mysql_fetch_array($result)) {

 if(@$total[$pages['un']]==null) { $un[$uni]=$pages['un']; $uni++; $total[$pages['un']]=0;  $total[$pages['un']]=$total[$pages['un']]+$pages['taka'];  } 
  else { $total[$pages['un']]=$total[$pages['un']]+$pages['taka']; }
  

echo'<tr><td>';
echo $pages['month'];
echo'</td><td>';
echo $pages['un'];
echo'</td><td>';
echo $pages['taka'];
echo'</td><td> <a href="?action=deletebalance&id='.$pages['ID'].'">Delete</a> ';
echo'</td></tr>';
}
}
echo'</table>';


echo '<h3>Total Balankce</h3><table border="1px" style="">';
for($id=0;$id<$uni;$id++) {
echo'<tr><td>'.$un[$id].'</td><td>'.$total[$un[$id]].'</td></tr>';
}
echo'</table>';
}
?>