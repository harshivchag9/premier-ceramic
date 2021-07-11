function ordaddress(orderid){
	
	var obj={"id":orderid,"status":"address"};
	var dbParam = JSON.stringify(obj);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST", "php/fetchaddress.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
xmlhttp.send("x=" + dbParam);
	
xmlhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
	var myObj = JSON.parse(this.responseText);
	document.getElementById("addid").innerHTML = myObj['id'];
	document.getElementById("addorderid").innerHTML = myObj['orderid'];
	document.getElementById("addfname").innerHTML = myObj['fristname'];
	document.getElementById("addlname").innerHTML = myObj['lastname'];
	document.getElementById("addhouse").innerHTML = myObj['houseno'];
	document.getElementById("addstreet").innerHTML = myObj['street'];
	document.getElementById("addcity").innerHTML = myObj['city'];
	document.getElementById("addzipcode").innerHTML = myObj['zipcode'];
	document.getElementById("addstate").innerHTML = myObj['state'];
	document.getElementById("addcountry").innerHTML = myObj['country'];
	document.getElementById("addphone").innerHTML = myObj['phone'];
	document.getElementById("addemail").innerHTML = myObj['email'];
	}
};
}
function ordpayment(orderid){
	
	var obj={"id":orderid,"status":"payment"};
	var dbParam = JSON.stringify(obj);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST", "php/fetchaddress.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
xmlhttp.send("x=" + dbParam);
	
xmlhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
	var myObj = JSON.parse(this.responseText);
	document.getElementById("payid").innerHTML = myObj['paymentid'];
	document.getElementById("payorderid").innerHTML = myObj['ORDERID'];
	document.getElementById("paytranid").innerHTML = myObj['TXNID'];
	document.getElementById("payamount").innerHTML = myObj['TXNAMOUNT'];
	document.getElementById("paymode").innerHTML = myObj['PAYMENTMODE'];
	document.getElementById("paycurrency").innerHTML = myObj['CURRENCY'];
	document.getElementById("paydate").innerHTML = myObj['TXNDATE'];
	document.getElementById("paystatus").innerHTML = myObj['STATUS'];
	document.getElementById("payrespcode").innerHTML = myObj['RESPCODE'];
	document.getElementById("payrespmsg").innerHTML = myObj['RESPMSG'];
	document.getElementById("paygateway").innerHTML = myObj['GATEWAYNAME'];
	document.getElementById("paybanktranid").innerHTML = myObj['BANKTXNID'];
	document.getElementById("paybankname").innerHTML = myObj['BANKNAME'];
	}
};
}
									
function AdminOrderStatus(id,cl){
	
	
	spanid=cl+id;
	txtid="txt"+cl+id;
	divid=cl+"-"+id;
	var a = cl.toString();
	
	var value = document.getElementById(divid).innerHTML;
	value = value.trim();
	document.getElementById(spanid).innerHTML="<select id='"+txtid+"' class='form-control' onchange=\"UpdateOrderStatus('"+id+"','"+cl+"');\"><option value='Placed'>Placed</option> <option value='Dispatched'>Dispatched</option> <option value='Delivered'>Delivered</option></select>";
	$("#"+txtid+" option[value='"+value.trim()+"']").prop('selected', true);
}
//"<a href='javascript:void(0)' onClick=\"showField('"+data.name+"','"+data.text+"');\">Edit</a>"

function UpdateOrderStatus(id,cl){
	
	var txtid="txt"+cl+id;
	var spanid=cl+id;
	var divid=cl+"-"+id;
	var data =document.getElementById(txtid).value;
	var obj={"id":id,data:data,"status":"update"};
	var dbParam = JSON.stringify(obj);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST", "php/AdminOrder.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("x=" + dbParam);
	document.getElementById(spanid).innerHTML="<div id='"+divid+"' onClick=\"AdminOrderStatus('"+id+"','"+cl+"');\">"+data+"</div>";

}