<?php
@include('frndzk.php');
echo'
<html>
<head>
<title>Dysania</title>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript" src="bk-calender.js"></script>
<script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/md5.js"></script>
<link href="reset.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script>
var link="lol";
var csmi=0;
function loadMeal()
{
loading_block();
var xmlhttp;
var txt,id,un,msg,str,x,i;
if(csmi==0) { document.getElementById("csmeal").innerHTML="Showing..."; csmi=1 }
str=document.getElementById("msgs").value;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("showmeal").innerHTML=xmlhttp.responseText;
	loading_block_hide();
    }
   }
xmlhttp.open("GET","core.php?action=showmeal&date="+str+"&req="+Math.random(),true);
xmlhttp.send();
}

function changeMeal(uni,time,date)
{
loading_block();
document.getElementById("csmeal").innerHTML="Changing...";
var xmlhttp;
var txt,id,un,msg,str,x,i;
str=document.getElementById("msgs").value;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	if (xmlhttp.responseText=="nf") {
    document.getElementById("csmeal").innerHTML="NOTHING FOUND";
	loading_block_hide();
	}
	else if (xmlhttp.responseText=="us") {
    document.getElementById("csmeal").innerHTML="UPDATE SUCCESSFULL";
	loadMeal();
	loading_block_hide();
	}
	else {
    document.getElementById("csmeal").innerHTML="MAY BE UPDATE SUCCESSFULL";
	loadMeal();
	loading_block_hide();
	}
    }
   }
xmlhttp.open("GET","core.php?action=changemeal&un="+uni+"&t="+date+"&d="+time+"&req="+Math.random(),true);
xmlhttp.send();
}


function loadDailybazar() {
loading_block();
var xmlhttp;
var txt,id,un,msg,str22,x,i;
str22=document.getElementById("ldb").value;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("showdailybazar").innerHTML=xmlhttp.responseText;
	loading_block_hide();
    }
   }
xmlhttp.open("POST","core.php?action=showdailybazar"+"&req="+Math.random(),true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("month="+str22);
}

function adddmbalance(name,month,taka,id)
{
loading_block();
var xmlhttp;
var txt,id,un,msg,str,x,i;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("csmeal").innerHTML="UPDATE SUCCESSFULL";
	loadDailybazar();
	loading_block_hide();
    }
   }
xmlhttp.open("GET","core.php?action=adddmbalance&name="+name+"&taka="+taka+"&id="+id+"&month="+month+"&req="+Math.random(),true);
xmlhttp.send();
}

function deletedmbalance(id)
{
loading_block();
var xmlhttp;
var txt,id,un,msg,str,x,i;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("csmeal").innerHTML="UPDATE SUCCESSFULL";
	loadDailybazar();
	loading_block_hide();
    }
   }
xmlhttp.open("GET","core.php?action=deletedmbalance&id="+id+"&req="+Math.random(),true);
xmlhttp.send();
}

function addmeal() {
loading_block();
var xmlhttp;
var txt,id,un,msg,str22,x,i;
name=document.getElementById("name22").value;
taka=document.getElementById("taka22").value;
month=document.getElementById("month22").value;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("csmeal").innerHTML="UPDATE SUCCESSFULL";
	loadDailybazar();
	loading_block_hide();
    }
   }
xmlhttp.open("POST","core.php?action=addmeal"+"&req="+Math.random(),true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("month="+month+"&name="+name+"&taka="+taka);
}

function deletemeal(id)
{
loading_block();
var xmlhttp;
var txt,id,un,msg,str,x,i;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("csmeal").innerHTML="UPDATE SUCCESSFULL";
	loadDailybazar();
	loading_block_hide();
    }
   }
xmlhttp.open("GET","core.php?action=deletemeal&id="+id+"&req="+Math.random(),true);
xmlhttp.send();
}

function deletemeal1(id)
{
loading_block();
var xmlhttp;
var txt,id,un,msg,str,x,i;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("csmeal").innerHTML="UPDATE SUCCESSFULL";
	loadDailybazar();
	loading_block_hide();
    }
   }
xmlhttp.open("GET","core.php?action=deletemeal1&id="+id+"&req="+Math.random(),true);
xmlhttp.send();
}

function loadBalance() {
loading_block();
var xmlhttp;
var txt,id,un,msg,str23,x,i;
str23=document.getElementById("lb").value;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("showallbalance").innerHTML=xmlhttp.responseText;
	loading_block_hide();
    }
   }
xmlhttp.open("GET","core.php?action=showallbalance&date="+str23+"&req="+Math.random(),true);
xmlhttp.send();
}
</script>




<script>
var cur=1,now=0;
var myvar,xxx=0,yyy=-100;
function loader() {
if(xxx>100 || xxx<-100) {
cur=now;
clearInterval(myvar);
}
else {
if(now<cur) {
 document.getElementById("content"+cur).style.left = xxx+"%";
 document.getElementById("content"+now).style.left = yyy+"%";
 xxx=xxx+1;
 yyy=yyy+1;
 }
 else {
 document.getElementById("content"+cur).style.left = xxx+"%";
 document.getElementById("content"+now).style.left = yyy+"%";
 xxx=xxx-1;
 yyy=yyy-1;
 }
 }
}

function changeClass() {
		myvar = setInterval(function(){loader();},10);
}


function change_menu(n) {
		if(cur!=n) {
		if(n<cur) {
		xxx=0;
		yyy=-100;
		}
		else {
		xxx=0;
		yyy=100;
		}
			now=n;
			changeClass();
		}
		for(var i=1; i<=3; i++) {
		if(i==n) {
			document.getElementById("li"+i).style.background = "red";
		}
		else {
			document.getElementById("li"+i).style.background = "none";
		}
	}
}


function loading_block() {
document.getElementById("divloader").className = "div-loaders";
}
function loading_block_hide() {
document.getElementById("divloader").className = "div-loader-hide";
}

var myVar2;

function login_lock() {
		myVar2 = setInterval(function(){ document.getElementById("main").style.display="none";
		},50);
}

function login_check() {
var un=document.getElementById("username").value;
var pw=document.getElementById("password").value;
if(CryptoJS.MD5(un)=="21232f297a57a5a743894a0e4a801fc3" && CryptoJS.MD5(pw)=="ecc945830894a1ce1e771bd089f05112") {
clearInterval(myVar2);
localStorage.setItem("usr", un);
localStorage.setItem("pwd", pw);
document.getElementById("divloader").className = "div-loaders";
login_loader();
document.getElementById("main").style.display="block";
document.getElementById("login").style.display="none";
}
else {
document.getElementById("msg").innerHTML="Wrong Username Or Password";
}
}


function auto_login() {
	if(CryptoJS.MD5(localStorage.getItem("usr"))=="21232f297a57a5a743894a0e4a801fc3" && CryptoJS.MD5(localStorage.getItem("pwd"))=="ecc945830894a1ce1e771bd089f05112") {
		clearInterval(myVar2);
		document.getElementById("main").style.display="block";
		document.getElementById("login").style.display="none";
		document.getElementById("divloader").className = "div-loaders";
		login_loader();
	}
	else {
	
	}
}

function logout() {
	localStorage.removeItem("usr");
	localStorage.removeItem("pwd");
	login_lock();
	document.getElementById("main").style.display="none";
	document.getElementById("login").style.display="block";
}


function runScript(e) {
    if (e.keyCode == 13) {
        login_check();
        return false;
    }
}

var myvar11,ee=0;
function login_loader() {
		myvar11 = setInterval(function(){ ee=1; login_loader_hide();
		},4000);
}
function login_loader_hide() {
	if(ee==1) {
		clearInterval(myvar11);
		document.getElementById("divloader").className = "div-loader-hide";
	}
}

function show_cc(id1) {
id=id1;
document.getElementById("cv").style.display = "block";
}
function hide_cc() {
document.getElementById("cv").style.display = "none";
}
</script>


</head>
<body>

<div id="login" style="  width: 400px;
  margin: 0 auto;
  position: relative;  border:3px solid black; padding:5px; text-align:center; top:20px;">
  <h1>Login</h1>
  <p id="msg"></p>
<p>Username: <input type="text" id="username"/><br><br>
Password: <input type="password" id="password"  onkeypress="return runScript(event)"/><br><br>
<button onClick="login_check()">Login</button></p>
</div>

<div id="main">
<div style="position:relative; width:100%; float:left; margin-top:10px;
background: -webkit-linear-gradient(#FF7D5C, #FF3333);
    background: -o-linear-gradient(#FF7D5C, #FF3333); 
    background: -moz-linear-gradient(#FF7D5C, #FF3333); 
    background: linear-gradient(#FF7D5C, #FF3333); border:5px red solid;">
			<ul class="menu">
				<li id="li1" onclick="change_menu(1)">Meal Log</li>
				<li id="li2" onclick="change_menu(2)">Monthly Bazar</li>
				<li id="li3" onclick="change_menu(3)">Balance</li>
				<li id="li3" onclick="logout()">Logout</li>
			</ul>
</div>
<div style="position:relative; width:100%; float:left; margin-top:10px; overflow-x:hidden; overflow-y:scroll; height:500px; border:5px red solid;">






<div style="position:absolute; float:left;     background: #E6E600; display:none; z-index:99; cursor:pointer; border:3px solid green;" id="cv">
<div style="float:left; margin-left:30px; margin-top:5px;" id="bk">
				<button onclick="prev_mnth()" style="float:left">Prev</button>
				<div style="float:left; font-size: 18px; margin-left:20px;" id="showmy" onclick=\'write_values_month()\'></div>
				<button onclick="next_mnth()" style="float:left; margin-left:20px;">Next</button>
			</div>
			<div style="clear:both;"></div>
			<div style="float:left; margin-left:12px;" id="bk-calender">
				<div style="float:left;" id="bk-mnth">
				
				</div>
				<div style="clear:both;"></div>
				<div style="float:left;" id="bk-date">
				
				</div>
				<div style="clear:both;"></div>
				<div style="float:left;" id="close">
				<p onclick="hide_cc()">Close</p>
				</div>
			</div>
<script>
				write_month();
				write_dates(y,m+1);
			</script>
</div>






		<div id="content1" style="float:left; width: 100%;  display:block; position:absolute; padding:6px;">

Enter Month to see Meal: <input type="text" value="'.date("Y/m").'" name="msg" id="msgs" onfocus="show_cc(\'msgs\')"/>
<input type="button" value="Get Meal" onclick="loadMeal()"/>
<div id="csmeal"></div>
<div id="showmeal"></div>
<br>
</div>';
echo'
		<div id="content2" style="float:left; width: 100%;  display:block; position:absolute; left:-100%; padding:6px;">
<h3>Input Daily Bazar</h3>
yyyy/mm/dd : <input type="text" id="month22" value="'.date("Y/m/d").'" onfocus="show_cc(\'month22\')"/>





 &nbsp; taka: <input type="text" id="taka22" /> &nbsp; name: <select id="name22">';
$result = @mysqli_query($fzk,"SELECT * FROM user ORDER by id desc");
if ( @mysqli_num_rows($result) > 0 ) {
while($pages = @mysqli_fetch_array($result)) {
echo'<option value="'.$pages['un'].'">'.$pages['un'].'</option>';
}
}
echo'</select>  &nbsp; Balance: <select name="link"><option value="0">Not adds to balance</option></select>
&nbsp;
<input type="button" value="Add" onclick="addmeal()"/>
<br>';
echo'
<h3>Show a month\'s Daily Bazar</h3>
yyyy/m : <input type="text" id="ldb" name="month" value="'.date("Y/m").'" onfocus="show_cc(\'ldb\')" /> &nbsp; <input type="button" value="Show" onclick="loadDailybazar()"/>

<div id="showdailybazar"></div>
<br><br>
</div>
<div id="content3" style="float:left; width: 100%;  display:block; position:absolute; left:-100%; padding:6px;">
Enter Month to see Balance: <input type="text" name="msg" id="lb"  value="'.date("Y/m").'" onfocus="show_cc(\'lb\')" />
<input type="button" value="Get Balance" onclick="loadBalance()"/>
<br>
<div id="showallbalance">
</div>





</div>
</div>


<div style="position:relative; clear:both; width:100%; float:left; margin-top:10px; height:50px; ">
<br><br><center>copyright 2014-2015 @ Dysania, road-17, nikunjo-2, Dhaka, Bangladesh</center>
</div>
</div>


<div id="divloader" class="div-loader-hide">
<div id="divloader" style="margin:0 auto; width:100%; height:100%; margin-top:100px; text-align:center;">
<div id="dlimg" style=" text-align:center;"><img height="350px" width="200px" src="newloading.gif" />
</div>
<div id="dlmsg" style=" color:white; text-align:center; font-size:30px; width:100%; margin-top:-60px;">Loading...</div>
</div>
</div>

<script>
login_lock();
auto_login();
</script>

</body>
</html>
';
?>