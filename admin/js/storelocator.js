
function storeedit(id,column){
	
	
	spanid=column+id;
	txtid="txt"+column+id;
	divid=column+"-"+id;
	var a = column.toString();
	
	var value = document.getElementById(divid).innerHTML;
	value = value.trim();
	document.getElementById(spanid).innerHTML="<input type='text' id='"+txtid+"' value='"+value+"' class='form-control' Onblur=\"UpdateStock('"+id+"','"+a+"');\">";
}
//"<a href='javascript:void(0)' onClick=\"showField('"+data.name+"','"+data.text+"');\">Edit</a>"

function UpdateStock(id,column){
	
	var txtid="txt"+column+id;
	var spanid=column+id;
	var divid=column+"-"+id;
	var data =document.getElementById(txtid).value;
	var obj={"id":id,data:data,column:column,"status":"update"};
	var dbParam = JSON.stringify(obj);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST", "php/addstore.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("x=" + dbParam);
	document.getElementById(spanid).innerHTML="<div id='"+divid+"' onClick=\"storeedit('"+id+"','"+column+"');\">"+data+"</div>";

}


function addstore(){
	
	var name = document.getElementById('insname').value;
	var address = document.getElementById('insaddress').value;
	var city = document.getElementById('inscity').value;
	var state = document.getElementById('insstate').value;
	var country = document.getElementById('inscountry').value;
	var lat = document.getElementById('inslat').value;
	var lng = document.getElementById('inslng').value;
	if(name=='' && address==''){alert('please enter value');}else{
	var obj={"name":name,address:address,City:city,State:state,Country:country,lat:lat,lng:lng,"status":"ins"};
	var dbParam = JSON.stringify(obj);
	$.post("php/addstore.php",{x:dbParam},function(){setTimeout(function(){
		disp_data('php/addstore.php?status=disp');
		alert('Check Map view ');
		window.open("adminmap.php",'_blank');
		}, 500); });
			disp_data('php/addstore.php?status=disp');
			
		}
		
	}



function toggle(){
	
	if (document.getElementById('toggle').checked) {
		$("#inslng").css({"display": "none"});
		$("#inslat").css({"display": "none"});
		document.getElementById('inslat').value=NULL;
		document.getElementById('inslng').value=NULL;
		
	} else {
		$("#inslng").css({"display": "inline"});
		$("#inslat").css({"display": "inline"});
		
	}
}


function deletestore(id){
	var obj={"id":id,"status":"delete"};
	var dbParam = JSON.stringify(obj);
	$.post("php/addstore.php",{x:dbParam},function(){disp_data('php/addstore.php?status=disp');});
}