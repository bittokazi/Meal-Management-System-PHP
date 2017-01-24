<?php
$fzk = @mysqli_connect("localhost","root","");
if (!$fzk)
  {
  echo'frndzk cms Could not connect';
  }
@mysqli_query('SET CHARACTER SET utf8');
@mysqli_query("SET SESSION collation_connection ='utf8_general_ci'");
if (!@mysqli_select_db($fzk,"mass")) {
echo'frndzk cms Could not connect to database error type: ';
}
?>