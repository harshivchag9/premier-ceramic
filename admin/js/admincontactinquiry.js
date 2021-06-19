					

/*

	-------** check/unchack, remark contact Inquiry **--------
	cntctupdate()                -->          this function is user for update remark and check 
	update_contact_remark()      -->          this function is sub function of cntctupdate().



*/


        function cntctupdate(b)
		{
			var remarkid="remark"+b;
			var remark=document.getElementById(remarkid).value;
			update_contact_remark(b,remark);
			document.getElementById("remark1"+b).innerHTML=remark;
		}


		function update_contact_remark(id,remark)
		{
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.open("GET","php/contact.php?id="+id+"&remark="+remark+"&status=update",false);
			xmlhttp.send(null);
			disp_data('php/contact.php?status=disp');

		}
	   