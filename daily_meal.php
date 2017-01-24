<?php
@include('frndzk.php');
if(isset($_GET['action']) && $_GET['action']=='addmeal' && isset($_POST['month']) && $_POST['month']!='' && isset($_POST['taka']) && $_POST['taka']!='' && isset($_POST['name']) && $_POST['name']!='') {
$date=$_POST['month'];
$date=strtotime($date);
$date=date("Y/m/d",$date);
$taka=$_POST['taka'];
$un=$_POST['name'];
$link=$_POST['link'];
$query="INSERT INTO daily_meal VALUES ('','$un','$date','$taka','$link')";
mysql_query($query);
echo'Added.....';
}
if(isset($_GET['action']) && $_GET['action']=='addbalance' && isset($_GET['month']) && $_GET['month']!='' && isset($_GET['taka']) && $_GET['taka']!='' && isset($_GET['name']) && $_GET['name']!='' && isset($_GET['id']) && $_GET['id']!='') {
$date=$_GET['month'];
$date=strtotime($date);
$edate=date("Y/m/d",$date);
$date=date("Y/m/d",$date);
$taka=$_GET['taka'];
$un=$_GET['name'];
$ids=$_GET['id'];
$query="INSERT INTO meal_balance VALUES ('','$un','$date','$taka')";
mysql_query($query);
$result = @mysql_query("SELECT * FROM meal_balance WHERE month LIKE'%$edate%' ORDER by id desc");
if ( @mysql_num_rows($result) > 0 ) {
while($pages = @mysql_fetch_array($result)) {
$id=$pages['ID'];
$query="UPDATE daily_meal SET link = '$id'
WHERE id='$ids'";
mysql_query($query);
break;
}
echo'Added.....';

}
}
if(isset($_GET['action']) && $_GET['action']=='deletebalance' && isset($_GET['id']) && $_GET['id']!='') {
$id=$_GET['id'];
mysql_query("DELETE FROM meal_balance WHERE id ='$id'");
$query="UPDATE daily_meal SET link = '0'
WHERE link='$id'";
mysql_query($query);
echo'<br>Deleted from balance...';
}
if(isset($_GET['action']) && $_GET['action']=='deletemeal' && isset($_GET['id']) && $_GET['id']!='') {
$id=$_GET['id'];
mysql_query("DELETE FROM meal_balance WHERE id ='$id'");
mysql_query("DELETE FROM daily_meal WHERE link ='$id'");
echo'<br>Deleted from meal and balance...';
}
if(isset($_GET['action']) && $_GET['action']=='deletemeal1' && isset($_GET['id']) && $_GET['id']!='') {
$id=$_GET['id'];
mysql_query("DELETE FROM daily_meal WHERE id ='$id'");
echo'<br>Deleted from meal...';
}
echo'<form action="?action=addmeal" method="POST"><h3>Input Daily Bazar</h3>
yyyy/mm/dd : <input type="text" name="month" /> &nbsp; taka: <input type="text" name="taka" /> &nbsp; name: <select name="name">';
$result = @mysql_query("SELECT * FROM user ORDER by id desc");
if ( @mysql_num_rows($result) > 0 ) {
while($pages = @mysql_fetch_array($result)) {
echo'<option value="'.$pages['un'].'">'.$pages['un'].'</option>';
}
}
echo'</select>  &nbsp; Balance: <select name="link"><option value="0">Not adds to balance</option></select>
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
echo '<table border="1px" style="">';
$result = @mysql_query("SELECT * FROM daily_meal WHERE date LIKE'%$edate%' ORDER by date desc");
if ( @mysql_num_rows($result) > 0 ) {
while($pages = @mysql_fetch_array($result)) {
echo'<tr><td>';
echo $pages['date'];
echo'</td><td>';
echo $pages['un'];
echo'</td><td>';
echo $pages['taka'];
$link=$pages['link'];
$result1 = @mysql_query("SELECT * FROM meal_balance WHERE ID='$link' ORDER by id desc");
if($pages['link']==0 || @mysql_num_rows($result1) < 1) { 
echo'</td><td>Not adds to balance <a href="?action=addbalance&name='.$pages['un'].'&month='.$pages['date'].'&taka='.$pages['taka'].'&id='.$pages['ID'].'">Change</a>
| <a href="?action=deletemeal1&id='.$pages['ID'].'">Delete</a>';
}
else {
echo'</td><td>adds to balance <a href="?action=deletebalance&id='.$pages['link'].'">Change</a> | <a href="?action=deletemeal&id='.$pages['link'].'">Delete</a>';
}
echo'</td></tr>';
}
}
echo'</table>';
}
?>