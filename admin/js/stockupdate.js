function searchstock(data){
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.open("GET","php/maintainstock.php?search="+data+"&status=disp",false);
	xmlhttp.send(null);
	document.getElementById("disp_data").innerHTML=xmlhttp.responseText;  
  }

  function changestock(id){

	  stockid="stock"+id;
	  txtstockid="txtstock"+id;
	  divstockid="stock-"+id;
	  var stock = document.getElementById(divstockid).innerHTML;
	  document.getElementById(stockid).innerHTML="<input type='number' id='"+txtstockid+"' value='"+stock+"' class='form-control' Onblur='updatestock("+id+")'>";

  }
  function updatestock(id){
	   var txtstockid="txtstock"+id;
	   var stockid="stock"+id;
	   var divstockid="stock-"+id;
	   var stock =document.getElementById(txtstockid).value;
	   var obj={"id":id,stock:stock,"status":"update"};
	   var dbParam = JSON.stringify(obj);
	   var xmlhttp = new XMLHttpRequest();
	   xmlhttp.open("POST", "php/maintainstock.php", true);
	   xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	   xmlhttp.send("x=" + dbParam);
	   document.getElementById(stockid).innerHTML="<div id='"+divstockid+"' Onblur='changestock("+id+");'>"+stock+"</div>";
  }

