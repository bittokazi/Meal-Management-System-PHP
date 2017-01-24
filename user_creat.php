<?php
@include('frndzk.php');
if(isset($_GET['un']) && $_GET['un']!='' && isset($_GET['role']) && $_GET['role']!='') {
$un=$_GET['un'];
$userrole=$_GET['role'];
$result1 = @mysql_query("SELECT * FROM user
WHERE un ='$un'");
if (@mysql_num_rows($result1) > 0 ) {
echo"<br>Username or Email already exist. Please chose another one<br>";
}
else {
$query="INSERT INTO user VALUES ('','$un','1','$userrole')";
@mysql_query($query);
echo"<br>Username Added Successfully<br>";
}
}
else {
echo'suck my dick';
}
?>