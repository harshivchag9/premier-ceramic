
		function disp_data(path)
		{
		  var xmlhttp=new XMLHttpRequest();
		  xmlhttp.open("GET",path,false);
		  xmlhttp.send(null);
		  document.getElementById("disp_data").innerHTML=xmlhttp.responseText;
			
			
		}
		

		function zoom() {
					alert('set zoom level under 80%');
					document.body.style.zoom = "80%";
				}
		



		




			



