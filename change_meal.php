<?php
@include('frndzk.php');
if(isset($_GET['un']) && $_GET['un']!='' && isset($_GET['d']) && $_GET['d']!='' && isset($_GET['t']) && $_GET['t']!='') {
$un=$_GET['un'];
$d=$_GET['d'];
$t=$_GET['t'];
$result1 = @mysql_query("SELECT * FROM meal
WHERE date='$t' AND un ='$un'");
if (@mysql_num_rows($result1) > 0 ) {
while($pages = @mysql_fetch_array($result1)) {
echo'updating...<br>';
if($d=='day' && $pages['day']==1) {  
$query="UPDATE meal SET day = '0'
WHERE un ='$un' AND date='$t'";
mysql_query($query);
echo"<br>Update Successfully<br>";
}
if($d=='night' && $pages['night']==1) {  
$query="UPDATE meal SET night = '0'
WHERE un ='$un' AND date='$t'";
mysql_query($query);
echo"<br>Update Successfully<br>";
}
if($d=='day' && $pages['day']==0) {  
$query="UPDATE meal SET day = '1'
WHERE un ='$un' AND date='$t'";
mysql_query($query);
echo"<br>Update Successfully<br>";
}
if($d=='night' && $pages['night']==0) {  
$query="UPDATE meal SET night = '1'
WHERE un ='$un' AND date='$t'";
mysql_query($query);
echo"<br>Update Successfully<br>";
}

}
}
else {
echo"<br>nothing found<br>";
}
}
else {
echo'something went wrong';
}
?>