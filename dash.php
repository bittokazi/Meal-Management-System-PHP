<?php
@include('frndzk.php');
$ttl_ml=0;
date_default_timezone_set("Asia/Dhaka");
echo 'Today\'s Date: '.$date=date("Y/m/d").' ';
$result = @mysql_query("SELECT * FROM meal ORDER by id DESC");
if ( @mysql_num_rows($result) > 0 ) {
while($pages = @mysql_fetch_array($result)) {
$date=$pages['date'];
break;
}
}
if((strtotime(date("Y/m/d"))-strtotime($date))/(86400)>=0) {

echo ''.(strtotime(date("Y/m/d"))-strtotime($date))/(86400).'<br>';
$i=(strtotime(date("Y/m/d"))-strtotime($date))/(86400);
$edate=strtotime($date);
for($j=0;$j<$i;$j++) {
$edate=$edate+86400;
echo date("Y/m/d",$edate).'<br>';
$idate=date("Y/m/d",$edate);
$result = @mysql_query("SELECT * FROM user ORDER by id desc");
if ( @mysql_num_rows($result) > 0 ) {
while($pages = @mysql_fetch_array($result)) {
$un=$pages['un'];
if($pages['valid']==1) {
$result23 = @mysql_query("SELECT * FROM meal WHERE un='$un' AND date='$idate' ORDER by id desc");
if ( @mysql_num_rows($result23) > 0 ) {
}
else {
$query="INSERT INTO meal VALUES ('','$un','$idate','1','1')";
mysql_query($query);
echo $pages['un'].' '.$idate.'<br>';
}
}
}
}

}
}
$date=date('Y/m');
$result = @mysql_query("SELECT * FROM meal WHERE date LIKE'%$date%' ORDER by id ASC");
if ( @mysql_num_rows($result) > 0 ) {
$id=1;
$uni=0;
$dayc=0;
$total[]=array();
$un=array();
$tdate=$date.'/0'.$id.'';
echo '<table border="1px" style="">';
echo'<tr><td>'.$tdate.' '.date('l', strtotime($tdate)).'</td>';
while($pages = @mysql_fetch_array($result)) {
if($pages['date']==$tdate) {
echo'
  <td>'.$pages['un'].' day <a href="change_meal.php?un='.$pages['un'].'&d=day&t='.$tdate.'">'.$pages['day'].'</a> night <a href="change_meal.php?un='.$pages['un'].'&d=night&t='.$tdate.'">'.$pages['night'].'</a></td>';
  if(@$total[$pages['un']]==null && !isset($total[$pages['un']])) { echo $uni; $un[$uni]=$pages['un']; $uni++; $total[$pages['un']]=0; if($pages['day']==1) { $total[$pages['un']]=1; $dayc++; } else if($pages['night']==1) { $total[$pages['un']]++; $dayc++; } else { $total[$pages['un']]=0; $dayc++; }  } 
  else { if($pages['day']==1) { $total[$pages['un']]++; $dayc++; } if($pages['night']==1) { $total[$pages['un']]++; $dayc++; } }
}
else {
echo'<td>'.$dayc.'</td></tr><tr><td>'.$pages['date'].' '.date('l', strtotime($pages['date'])).'</td>
<td>'.$pages['un'].' day <a href="change_meal.php?un='.$pages['un'].'&d=day&t='.$pages['date'].'">'.$pages['day'].'</a> night <a href="change_meal.php?un='.$pages['un'].'&d=night&t='.$pages['date'].'">'.$pages['night'].'</a></td>';
$id++;
$dayc=0;
if ($id<10) { $tdate=$date.'/0'.$id.''; } else { $tdate=$date.'/'.$id.''; }
if(@$total[$pages['un']]==null && !isset($total[$pages['un']])) { $un[$uni]=$pages['un']; $uni++; $total[$pages['un']]=0; if($pages['day']==1) { $total[$pages['un']]=1; $dayc++; } if($pages['night']==1) { $total[$pages['un']]++; $dayc++; } } 
  else { if($pages['day']==1) { $total[$pages['un']]++; $dayc++; } if($pages['night']==1) { $total[$pages['un']]++; $dayc++; } }
}
}
echo'<td>'.$dayc.'</td></tr><tr><td>Total</td>';
for($id=0;$id<$uni;$id++) {
echo'<td>'.$uni.''.$un[$id].' '.$total[$un[$id]].'</td>';
$ttl_ml=$ttl_ml+$total[$un[$id]];
}
echo'</tr>';
echo'<table>';
}






echo'<h3>Daily Bazar</h3>';
$total_bz=0;
$date=date('Y/m');
$edate=$date.'/01';
$edate=strtotime($edate);
$edate=date("Y/m",$edate);
echo '<table border="1px" style="">';
$result = @mysql_query("SELECT * FROM daily_meal WHERE date LIKE'%$edate%' ORDER by id desc");
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
$total_bz=$total_bz+$pages['taka'];
}
}
echo'</table><br>';
echo'Tatal bazar: '.$total_bz.' tk<br>';
echo'Tatal Meal: '.$ttl_ml.' <br>';
echo'Meal Rate: '.sprintf ("%.2f",$total_bz/$ttl_ml).' tk<br>';








$date=date('Y/m');
$edate=$date.'/01';
$edate=strtotime($edate);
$edate=date("Y/m",$edate);


$id=1;
$uni=0;
$dayc=0;
$total1[]=array();
$un1=array();


echo '<h3>Showing All Balance</h3><table border="1px" style="">';
$result = @mysql_query("SELECT * FROM meal_balance WHERE month LIKE'%$edate%' ORDER by id desc");
if ( @mysql_num_rows($result) > 0 ) {
while($pages = @mysql_fetch_array($result)) {

 if(@$total1[$pages['un']]==null) { $un1[$uni]=$pages['un']; $uni++; $total1[$pages['un']]=0;  $total1[$pages['un']]=$total1[$pages['un']]+$pages['taka'];  } 
  else { $total1[$pages['un']]=$total1[$pages['un']]+$pages['taka']; }
  

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


echo '<h3>Total Balance</h3><table border="1px" style="">';
for($id=0;$id<$uni;$id++) {
echo'<tr><td>'.$un1[$id].'</td><td>'.$total1[$un1[$id]].'</td></tr>';
}
echo'</table><br>';
for($id=0;$id<$uni;$id++) {
echo''.$un1[$id].' : '.$total1[$un1[$id]].' | ';
if(($total1[$un1[$id]]  - (($total_bz/$ttl_ml)*$total[$un1[$id]])) > 0) { echo 'gets back: '.sprintf ("%.2f",($total1[$un1[$id]]  - (($total_bz/$ttl_ml)*$total[$un1[$id]]))).'<br>'; }
elseif(($total1[$un1[$id]]  - (($total_bz/$ttl_ml)*$total[$un1[$id]])) < 0) { echo 'gives: '.sprintf ("%.2f",-($total1[$un1[$id]]  - (($total_bz/$ttl_ml)*$total[$un1[$id]]))).'<br>';}
elseif(($total1[$un1[$id]]  - (($total_bz/$ttl_ml)*$total[$un1[$id]])) == 0) { echo 'clear<br>'; }
}
?>