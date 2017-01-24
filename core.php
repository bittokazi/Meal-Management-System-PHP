<?php
@include('frndzk.php');
if(isset($_GET['date']) && $_GET['date']!='' && isset($_GET['action']) && $_GET['action']=='showmeal') {

$ttl_ml=0;
date_default_timezone_set("Asia/Dhaka");
echo 'Today\'s Date: '.$date=date("Y/m/d").' ';

/*
$result = @mysqli_query($fzk,"SELECT * FROM meal ORDER by id DESC");
if ( @mysqli_num_rows($result) > 0 ) {
while($pages = @mysqli_fetch_array($result)) {
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
$result = @mysqli_query($fzk,"SELECT * FROM user ORDER by id desc");
if ( @mysqli_num_rows($result) > 0 ) {
while($pages = @mysqli_fetch_array($result)) {
$un=$pages['un'];
if($pages['valid']==1) {
$result23 = @mysqli_query($fzk,"SELECT * FROM meal WHERE un='$un' AND date='$idate' ORDER by id desc");
if ( @mysqli_num_rows($result23) > 0 ) {
}
else {
$query="INSERT INTO meal VALUES ('','$un','$idate','1','1')";
@mysqli_query($fzk,$query);
echo $pages['un'].' '.$idate.'<br>';
}
}
}
}

}
}
*/


//show meal

if($_GET['date']!=date("Y/m")) {
	$days=cal_days_in_month(CAL_GREGORIAN,date("m"),date("Y"));
	$c_month=$_GET['date'];
}
else {
	$days=date("d");
	$c_month=date("Y/m");
}
$meal_arr=array();
$meal_arr_i=0;
$un=array();
$un_i=0;
$result = @mysqli_query($fzk,"SELECT * FROM user ORDER by id desc");
if ( @mysqli_num_rows($result) > 0 ) {
while($pages = @mysqli_fetch_array($result)) {
if($pages['valid']==1) {
$un[$un_i]=$pages['un'];
$uni=$un[$un_i];
$un_i++;
$result23 = @mysqli_query($fzk,"SELECT * FROM meal WHERE un='$uni' AND date LIKE '%$c_month%' ORDER by id desc");
if ( @mysqli_num_rows($result23) > 0 ) {
$meal_arr[$meal_arr_i]=$result23;
$meal_arr_i++;
}
}
}
}

for($i=1; $i<=$days; $i++) {
	if ($i<10) $i='0'.$i;
	$date=$c_month.'/'.$i;
	for($j=0; $j<$un_i; $j++) {
		for($k=0; $k<$meal_arr_i; $k++) {
			while($pages = @mysqli_fetch_array($meal_arr[$k])) {
				echo $pages['un'];
			}
		}
	}
}




//show meal end







/*
$date=$_GET['date'];
$edate=$date.'/01';
$edate=strtotime($edate);
$date=date("Y/m",$edate);
$result = @mysqli_query($fzk,"SELECT * FROM meal WHERE date LIKE'%$date%' ORDER by id ASC");
if ( @mysqli_num_rows($result) > 0 ) {
$id=1;
$uni=0;
$dayc=0;
$total[]=array();
$un=array();
$tdate=$date.'/0'.$id.'';
echo '<table border="1px" style="">';
echo'<tr><td>'.$tdate.' '.date('l', strtotime($tdate)).'</td>';
while($pages = @mysqli_fetch_array($result)) {
if($pages['date']==$tdate) {
echo'
  <td>'.$pages['un'].' day <a style="cursor:pointer; color:red;" onclick="changeMeal('."'".$pages['un']."','day','".$tdate."'".')">'.$pages['day'].'</a> night <a style="cursor:pointer; color:red;"  onclick="changeMeal('."'".$pages['un']."','night','".$tdate."'".')">'.$pages['night'].'</a></td>';
  if(@$total[$pages['un']]==null && !isset($total[$pages['un']])) { $un[$uni]=$pages['un']; $uni++; $total[$pages['un']]=0; if($pages['day']==1) { $total[$pages['un']]=1; $dayc++; } if($pages['night']==1) { $total[$pages['un']]++; $dayc++; } } 
  else { if($pages['day']==1) { $total[$pages['un']]++; $dayc++; } if($pages['night']==1) { $total[$pages['un']]++; $dayc++; } }
}
else {
echo'<td>'.$dayc.'</td></tr><tr><td>'.$pages['date'].' '.date('l', strtotime($pages['date'])).'</td>
<td>'.$pages['un'].' day <a style="cursor:pointer; color:red;" onclick="changeMeal('."'".$pages['un']."','day','".$pages['date']."'".')">'.$pages['day'].'</a> night <a style="cursor:pointer; color:red;" onclick="changeMeal('."'".$pages['un']."','night','".$pages['date']."'".')">'.$pages['night'].'</a></td>';
$id++;
$dayc=0;
if ($id<10) { $tdate=$date.'/0'.$id.''; } else { $tdate=$date.'/'.$id.''; }
if(@$total[$pages['un']]==null && !isset($total[$pages['un']])) { $un[$uni]=$pages['un']; $uni++; $total[$pages['un']]=0; if($pages['day']==1) { $total[$pages['un']]=1; $dayc++; } if($pages['night']==1) { $total[$pages['un']]++; $dayc++; } } 
  else { if($pages['day']==1) { $total[$pages['un']]++; $dayc++; } if($pages['night']==1) { $total[$pages['un']]++; $dayc++; } }
}
}
echo'<td>'.$dayc.'</td></tr><tr><td>Total</td>';
for($id=0;$id<$uni;$id++) {
echo'<td>'.$un[$id].' '.$total[$un[$id]].'</td>';
$ttl_ml=$ttl_ml+$total[$un[$id]];
}
echo'</tr>';
echo'<table>';
}
*/

}
else if(isset($_GET['un']) && $_GET['un']!='' && isset($_GET['d']) && $_GET['d']!='' && isset($_GET['t']) && $_GET['t']!='' && isset($_GET['action']) && $_GET['action']=='changemeal') {



$un=$_GET['un'];
$d=$_GET['d'];
$t=$_GET['t'];
$result1 = @mysqli_query($fzk,"SELECT * FROM meal
WHERE date='$t' AND un ='$un'");
if (@mysqli_num_rows($result1) > 0 ) {
while($pages = @mysqli_fetch_array($result1)) {

if($d=='day' && $pages['day']==1) {  
$query="UPDATE meal SET day = '0'
WHERE un ='$un' AND date='$t'";
mysqli_query($fzk,$query);
echo"us";
}
if($d=='night' && $pages['night']==1) {  
$query="UPDATE meal SET night = '0'
WHERE un ='$un' AND date='$t'";
mysqli_query($fzk,$query);
echo"us";
}
if($d=='day' && $pages['day']==0) {  
$query="UPDATE meal SET day = '1'
WHERE un ='$un' AND date='$t'";
mysqli_query($fzk,$query);
echo"us";
}
if($d=='night' && $pages['night']==0) {  
$query="UPDATE meal SET night = '1'
WHERE un ='$un' AND date='$t'";
mysqli_query($fzk,$query);
echo"us";
}

}
}
else {
echo"nf";
}



}
else if(isset($_POST['month']) && $_POST['month']!='' && isset($_GET['action']) && $_GET['action']=='showdailybazar') {



$date=$_POST['month'];
$edate=$date.'/01';
$edate=strtotime($edate);
$edate=date("Y/m",$edate);
echo '<table border="1px" style="">';
$result = @mysqli_query($fzk,"SELECT * FROM daily_meal WHERE date LIKE'%$edate%' ORDER by date desc");
if ( @mysqli_num_rows($result) > 0 ) {
while($pages = @mysqli_fetch_array($result)) {
echo'<tr><td>';
echo $pages['date'];
echo'</td><td>';
echo $pages['un'];
echo'</td><td>';
echo $pages['taka'];
$link=$pages['link'];
$result1 = @mysqli_query($fzk,"SELECT * FROM meal_balance WHERE ID='$link' ORDER by id desc");
if($pages['link']==0 || @mysqli_num_rows($result1) < 1) { 
echo'</td><td>Not adds to balance <a style="cursor:pointer; color:red;"  onclick="adddmbalance('."'".$pages['un']."','".$pages['date']."','".$pages['taka']."','".$pages['ID']."'".')">Change</a>
| <a style="cursor:pointer; color:red;"  onclick="deletemeal1('."'".$pages['ID']."'".')">Delete</a>';
}
else {
echo'</td><td>adds to balance <a style="cursor:pointer; color:red;"  onclick="deletedmbalance('."'".$pages['link']."'".')">Change</a> | <a style="cursor:pointer; color:red;"  onclick="deletemeal('."'".$pages['link']."'".')">Delete</a>';
}
echo'</td></tr>';
}
}
echo'</table>';




}
else if(isset($_GET['action']) && $_GET['action']=='adddmbalance' && isset($_GET['month']) && $_GET['month']!='' && isset($_GET['taka']) && $_GET['taka']!='' && isset($_GET['name']) && $_GET['name']!='' && isset($_GET['id']) && $_GET['id']!='') {



$date=$_GET['month'];
$date=strtotime($date);
$edate=date("Y/m/d",$date);
$date=date("Y/m/d",$date);
$taka=$_GET['taka'];
$un=$_GET['name'];
$ids=$_GET['id'];
$query="INSERT INTO meal_balance VALUES ('','$un','$date','$taka')";
mysqli_query($fzk,$query);
$result = @mysqli_query($fzk,"SELECT * FROM meal_balance WHERE month LIKE'%$edate%' ORDER by id desc");
if ( @mysqli_num_rows($result) > 0 ) {
while($pages = @mysqli_fetch_array($result)) {
$id=$pages['ID'];
$query="UPDATE daily_meal SET link = '$id'
WHERE id='$ids'";
mysqli_query($fzk,$query);
break;
}
}




}
else if(isset($_GET['action']) && $_GET['action']=='deletedmbalance' && isset($_GET['id']) && $_GET['id']!='') {



$id=$_GET['id'];
mysqli_query($fzk,"DELETE FROM meal_balance WHERE id ='$id'");
$query="UPDATE daily_meal SET link = '0'
WHERE link='$id'";
mysqli_query($fzk,$query);



}
else if(isset($_GET['action']) && $_GET['action']=='addmeal' && isset($_POST['month']) && $_POST['month']!='' && isset($_POST['taka']) && $_POST['taka']!='' && isset($_POST['name']) && $_POST['name']!='') {



$date=$_POST['month'];
$date=strtotime($date);
$date=date("Y/m/d",$date);
$taka=$_POST['taka'];
$un=$_POST['name'];
$link=$_POST['link'];
$query="INSERT INTO daily_meal VALUES ('','$un','$date','$taka','$link')";
mysqli_query($fzk,$query);




}
else if(isset($_GET['action']) && $_GET['action']=='deletemeal' && isset($_GET['id']) && $_GET['id']!='') {
$id=$_GET['id'];
mysqli_query($fzk,"DELETE FROM meal_balance WHERE id ='$id'");
mysqli_query($fzk,"DELETE FROM daily_meal WHERE link ='$id'");
}
else if(isset($_GET['action']) && $_GET['action']=='deletemeal1' && isset($_GET['id']) && $_GET['id']!='') {
$id=$_GET['id'];
mysqli_query($fzk,"DELETE FROM daily_meal WHERE id ='$id'");
}
else if(isset($_GET['action']) && $_GET['action']=='showallbalance' && isset($_GET['date']) && $_GET['date']!='') {


















































$ttl_ml=0;
date_default_timezone_set("Asia/Dhaka");
$date=$_GET['date'];
$edate=$date.'/01';
$edate=strtotime($edate);
$date=date("Y/m",$edate);
$result = @mysqli_query($fzk,"SELECT * FROM meal WHERE date LIKE'%$date%' ORDER by id ASC");
if ( @mysqli_num_rows($result) > 0 ) {
$id=1;
$uni=0;
$dayc=0;
$total[]=array();
$un=array();
$tdate=$date.'/0'.$id.'';


while($pages = @mysqli_fetch_array($result)) {
if($pages['date']==$tdate) {

  if(@$total[$pages['un']]==null && !isset($total[$pages['un']])) { $un[$uni]=$pages['un']; $uni++; $total[$pages['un']]=0; if($pages['day']==1) { $total[$pages['un']]=1; $dayc++; } if($pages['night']==1) { $total[$pages['un']]++; $dayc++; } } 
  else { if($pages['day']==1) { $total[$pages['un']]++; $dayc++; } if($pages['night']==1) { $total[$pages['un']]++; $dayc++; } }
}
else {

$id++;
$dayc=0;
if ($id<10) { $tdate=$date.'/0'.$id.''; } else { $tdate=$date.'/'.$id.''; }
if(@$total[$pages['un']]==null && !isset($total[$pages['un']])) { $un[$uni]=$pages['un']; $uni++; $total[$pages['un']]=0; if($pages['day']==1) { $total[$pages['un']]=1; $dayc++; } if($pages['night']==1) { $total[$pages['un']]++; $dayc++; } } 
  else { if($pages['day']==1) { $total[$pages['un']]++; $dayc++; } if($pages['night']==1) { $total[$pages['un']]++; $dayc++; } }
}
}

for($id=0;$id<$uni;$id++) {

$ttl_ml=$ttl_ml+$total[$un[$id]];
}


}







$total_bz=0;
$date=$_GET['date'];
$edate=$date.'/01';
$edate=strtotime($edate);
$edate=date("Y/m",$edate);

$result = @mysqli_query($fzk,"SELECT * FROM daily_meal WHERE date LIKE'%$edate%' ORDER by id desc");
if ( @mysqli_num_rows($result) > 0 ) {
while($pages = @mysqli_fetch_array($result)) {

$link=$pages['link'];
$result1 = @mysqli_query($fzk,"SELECT * FROM meal_balance WHERE ID='$link' ORDER by id desc");
if($pages['link']==0 || @mysqli_num_rows($result1) < 1) { 

}
else {

}

$total_bz=$total_bz+$pages['taka'];
}
}

echo'Tatal bazar: '.$total_bz.' tk<br>';
echo'Tatal Meal: '.$ttl_ml.' <br>';
echo'Meal Rate: '.sprintf ("%.2f",$total_bz/$ttl_ml).' tk<br>';








$date=$_GET['date'];
$edate=$date.'/01';
$edate=strtotime($edate);
$edate=date("Y/m",$edate);


$id=1;
$uni=0;
$dayc=0;
$total1[]=array();
$un1=array();


echo '<h3>Showing All Balance</h3><table border="1px" style="">';
$result = @mysqli_query($fzk,"SELECT * FROM meal_balance WHERE month LIKE'%$edate%' ORDER by id desc");
if ( @mysqli_num_rows($result) > 0 ) {
while($pages = @mysqli_fetch_array($result)) {

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
if(($total1[$un1[$id]]  - (($total_bz/$ttl_ml)*$total[$un1[$id]])) > 0) { echo ' Cost: '.sprintf ("%.2f",(($total_bz/$ttl_ml)*$total[$un1[$id]])).' | gets back: '.sprintf ("%.2f",($total1[$un1[$id]]  - (($total_bz/$ttl_ml)*$total[$un1[$id]]))).'<br>'; }
elseif(($total1[$un1[$id]]  - (($total_bz/$ttl_ml)*$total[$un1[$id]])) < 0) { echo ' Cost: '.sprintf ("%.2f",(($total_bz/$ttl_ml)*$total[$un1[$id]])).' | gives: '.sprintf ("%.2f",-($total1[$un1[$id]]  - (($total_bz/$ttl_ml)*$total[$un1[$id]]))).'<br>';}
elseif(($total1[$un1[$id]]  - (($total_bz/$ttl_ml)*$total[$un1[$id]])) == 0) { echo 'clear<br>'; }
}






















































}
?>