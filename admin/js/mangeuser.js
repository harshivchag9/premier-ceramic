function deleteuser(id)
{
var xmlhttp=new XMLHttpRequest();
  xmlhttp.open("GET","php/manageuser.php?id="+id+"&status=delete",false);
  xmlhttp.send(null);
  disp_data('php/manageuser.php?status=disp');
}	




function edituser(a)
{
	usernameid="username"+a;
	txtusernameid="txtusername"+a;
	var username=document.getElementById(usernameid).innerHTML;
	document.getElementById(usernameid).innerHTML="<input type='text' value='"+username+"' id='"+txtusernameid+"'>";

	emailid="email"+a;
	txtemailid="txtemail"+a;
	var email=document.getElementById(emailid).innerHTML;
	document.getElementById(emailid).innerHTML="<input type='text' value='"+email+"' id='"+txtemailid+"'>";

	passwordid="password"+a;
	txtpasswordid="txtpassword"+a;
	var password=document.getElementById(passwordid).innerHTML;
	document.getElementById(passwordid).innerHTML="<input type='text' value='"+password+"' id='"+txtpasswordid+"'>";

	roleid="role"+a;
	txtroleid="txtrole"+a;
	var role=document.getElementById(roleid).innerHTML;
	
	document.getElementById(roleid).innerHTML="<select style='width:100px;' class='form-control' id='"+txtroleid+"' placeholder='size'><option value='user' >User</option><option value='admin'  >Admin</option><option value='marketing'>Marketing Dept.</option><option value='production'>Production Dept.</option>";
	
	$("#"+txtroleid+" option[value='"+role.trim()+"']").prop('selected', true);
	

	updateid="update"+a;
	document.getElementById('edit'+a).style.visibility="hidden";
	document.getElementById(updateid).style.visibility="visible";


}


function updateuser(b)
{
var usernameid="txtusername"+b;
var username=document.getElementById(usernameid).value;

var emailid="txtemail"+b;
var email=document.getElementById(emailid).value;

var passwordid="txtpassword"+b;
var password=document.getElementById(passwordid).value;

var roleid="txtrole"+b;
var role=document.getElementById(roleid).value;



updateuservalue(b,username,email,password,role);


document.getElementById('edit'+b).style.visibility="visible";
document.getElementById("update"+b).style.visibility="hidden";


document.getElementById("username"+b).innerHTML=username;
document.getElementById("email"+b).innerHTML=email;
document.getElementById("password"+b).innerHTML=password;
document.getElementById("role"+b).innerHTML=role;


}


function updateuservalue(id,username,email,password,role)
{
	
	
	
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.open("POST","php/manageuser.php?id="+id+"&name="+username+"&password="+password+"&email="+email+"&role="+role+"&status=update",false);
	xmlhttp.send(null);
	disp_data('php/manageuser.php?status=disp');

}

