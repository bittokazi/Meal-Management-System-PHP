var dd = new Date();
var m = dd.getMonth();
var y = dd.getFullYear();
var id='';
var mnths='';
function write_values(date) {
document.getElementById('month22').value=date;
hide_cc();
}
function write_values_month() {
document.getElementById(id).value=mnths;
hide_cc();
}
function write_month() {
	document.getElementById('bk-mnth').innerHTML='<div style="height:30px; width:30px; float:left; border: 1px solid black;">SU</div>'+
	'<div style="height:30px; width:30px; float:left; border: 1px solid black;">MO</div>'+
	'<div style="height:30px; width:30px; float:left; border: 1px solid black;">TU</div>'+
	'<div style="height:30px; width:30px; float:left; border: 1px solid black;">WD</div>'+
	'<div style="height:30px; width:30px; float:left; border: 1px solid black;">TH</div>'+
	'<div style="height:30px; width:30px; float:left; border: 1px solid black;">FR</div>'+
	'<div style="height:30px; width:30px; float:left; border: 1px solid black;">ST</div>';
}
function write_dates(year, mnth) {
mnths=year+'/'+mnth;
var numOfDays=new Date(year, mnth, 0).getDate();
var d = new Date(mnth+"/1/"+year).getDay();
var cur_day=d;
document.getElementById('showmy').innerHTML=year+'/'+mnth;
document.getElementById('bk-date').innerHTML='';
for(var j=0; j<d; j++) {
document.getElementById('bk-date').innerHTML=document.getElementById('bk-date').innerHTML+'<div style="height:30px; width:30px; float:left; border: 1px solid black;"></div>';
}
for(var j=1; j<=numOfDays; j++) {
if(d==7) {
if(mnth<10) { var kk='0'; } else { var kk=''; }
if (j<10) {
document.getElementById('bk-date').innerHTML=document.getElementById('bk-date').innerHTML+'<div style="clear:both"></div>'+
'<div style="height:30px; width:30px; float:left; border: 1px solid black;">'+
'<a style="padding:3px; font-size:15px; text-decoration:none; color:black;" onclick="write_values(\''+y+'/'+kk+mnth+'/0'+j+'\')">'+j+'</a></div>';
}
else {
document.getElementById('bk-date').innerHTML=document.getElementById('bk-date').innerHTML+'<div style="clear:both"></div>'+
'<div style="height:30px; width:30px; float:left; border: 1px solid black;">'+
'<a style="padding:3px; font-size:15px; text-decoration:none; color:black;" onclick="write_values(\''+y+'/'+kk+mnth+'/'+j+'\')">'+j+'</a></div>';
}
d=1;
}
else {
if (j<10) {
if(mnth<10) { var kk='0'; } else { var kk=''; }
document.getElementById('bk-date').innerHTML=document.getElementById('bk-date').innerHTML+'<div style="height:30px; width:30px; float:left; border: 1px solid black;">'+
'<a style="padding:3px; font-size:15px; text-decoration:none; color:black;" onclick="write_values(\''+y+'/'+kk+mnth+'/0'+j+'\')">'+j+'</a></div>';
d++;
}
else {
if(mnth<10) { var kk='0'; } else { var kk=''; }
document.getElementById('bk-date').innerHTML=document.getElementById('bk-date').innerHTML+'<div style="height:30px; width:30px; float:left; border: 1px solid black;">'+
'<a style="padding:3px; font-size:15px; text-decoration:none; color:black;" onclick="write_values(\''+y+'/'+kk+mnth+'/'+j+'\')">'+j+'</a></div>';
d++; 
}
}
}
}
function prev_mnth() {
	if(m==0) {
		y=y-1;
		m=12;
		write_dates(y, 12);
	}
	else {
		m=m-1;
		write_dates(y, m+1);
	}
}
function next_mnth() {
	if(m==11) {
		y=y+1;
		m=0;
		write_dates(y, 1);
	}
	else {
		m=m+1;
		write_dates(y, m+1);
	}
}