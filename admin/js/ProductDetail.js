/*  
		-------------** Curd operation for Product detail **------------
		
		aa()            -->         edit operation to product detail (make label to textbox)
		bb()            -->         update data from edit to database
		update_value()  -->         this operation is sub function of bb() for update data to database
		delete1()       -->         it is for delete the product 
		ins()           -->         this function is use for insert new product
		
		*/  

function productphotodelete(id,d){
	
	$.post("php/updateproductphoto.php",{id:id,status:'delete'},function(){
		alert('Product Image Deleted');
	   disp_data('php/product.php?status=disp');
	  disp_product_photo(d);});
}
function addproductimage(id){
							
							
							var form = $('#addnewproductimage')[0];
							//document.getElementById('')
							// Create an FormData object 
							var data = new FormData(form);
							//var f = document.getElementsByName('imagepath').value;
							data.append('status','add');
							 $.ajax({
									type: "POST",
									enctype: 'multipart/form-data',
									url: "php/updateproductphoto.php",
									data: data,
									processData: false,
									contentType: false,
									cache: false,
									timeout: 600000,
									success: function (data) {

										alert('Image Add Successfully');
									   disp_data('php/product.php?status=disp');
									  disp_product_photo(id);
									},
									error: function (e) {


									   alert('something want wrong!!!');
									
									}
								});
							
						}

		function up(id,d){
							
							var formid="id"+id;
							
							var form = $('#'+formid)[0];
							var data = new FormData(form);
							data.append('status','update');
							 $.ajax({
									type: "POST",
									enctype: 'multipart/form-data',
									url: "php/updateproductphoto.php",
									data: data,
									processData: false,
									contentType: false,
									cache: false,
									timeout: 600000,
									success: function (data) {

										alert('Picture Update Successfully');
									   disp_data('php/product.php?status=disp');
										disp_product_photo(d);
									  
									},
									error: function (e) {


									   alert('something want wrong!!!');
										
									}
								});
							
						}
		function disp_product_photo(id)
		{
			
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("POST", "php/FetchProductPhoto.php?id="+id+"&status=imageupdate", false);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send(null);
			document.getElementById("disp_update_photo").innerHTML=xmlhttp.responseText;

		}
		function aa(a)
		{
		nameid="name"+a;
		txtnameid="txtname"+a;
		var name=document.getElementById(nameid).innerHTML;
		document.getElementById(nameid).innerHTML="<input type='text' style='width:80px;' value='"+name.trim()+"' id='"+txtnameid+"'>";
		console.log(name);

		colorid="color"+a;
		txtcolorid="txtcolor"+a;
		var color=document.getElementById(colorid).innerHTML;
		document.getElementById(colorid).innerHTML="<input type='text' style='width:80px;' value='"+color.trim()+"' id='"+txtcolorid+"'>";

		typeid="type"+a;
		txttypeid="txttype"+a;
		var type=document.getElementById(typeid).innerHTML;
			
			document.getElementById(typeid).innerHTML="<select style='width:100px;' class='form-control' id='"+txttypeid+"' placeholder='type'><option value=''></option><option value='Double Charge'>Double Charge</option><option value='Digital Tiles'>Digital Tiles</option><option value='GVT'>GVT</option><option value='PGVT'>PGVT</option></select>";
			$("#"+txttypeid+" option[value='"+type.trim()+"']").prop('selected', true);
		
		usageid="usage"+a;
		txtusageid="txtusage"+a;
		var usage=document.getElementById(usageid).innerHTML;
			
			document.getElementById(usageid).innerHTML="<select style='width:100px;' class='form-control' placeholder='usage' id='"+txtusageid+"'><option value=''>Usage</option><option value='Wall Tiles'>Wall Tiles</option><option value='Floor Tiles'>Floor Tiles</option><option value='Parking Tiles'>Parking Tiles</option><option value='Alivation Tiles'>Alivation Tiles</option><option value='Kitchen Tiles'>Kitchen Tiles</option></select>";
			$("#"+txtusageid+" option[value='"+usage.trim()+"']").prop('selected', true);
			
		stockid="stock"+a;
		txtstockid="txtstock"+a;
		var stock=document.getElementById(stockid).innerHTML;
		document.getElementById(stockid).innerHTML="<input style='width:60px;' type='text' value='"+stock.trim()+"' id='"+txtstockid+"'>";

		priceid="price"+a;
		txtpriceid="txtprice"+a;
		var price=document.getElementById(priceid).innerHTML;
		document.getElementById(priceid).innerHTML="<input style='width:60px;' type='text' value='"+price.trim()+"' id='"+txtpriceid+"'>";

		pieceinboxid="pieceinbox"+a;
		txtpieceinboxid="txtpieceinbox"+a;
		var pieceinbox=document.getElementById(pieceinboxid).innerHTML;
		document.getElementById(pieceinboxid).innerHTML="<input style='width:60px;' type='text' value='"+pieceinbox.trim()+"' id='"+txtpieceinboxid+"'>";

		weightid="weight"+a;
		txtweightid="txtweight"+a;
		var weight=document.getElementById(weightid).innerHTML;
		document.getElementById(weightid).innerHTML="<input style='width:60px;' type='text' value='"+weight.trim()+"' id='"+txtweightid+"'>";

		thicknessid="thickness"+a;
		txtthicknessid="txtthickness"+a;
		var thickness=document.getElementById(thicknessid).innerHTML;
			
			document.getElementById(thicknessid).innerHTML="<select style='width:80px;' class='form-control' id='"+txtthicknessid+"' placeholder='thickness'><option value=''>Thickness</option><option value='8mm' >8mm</option><option value='10mm'>10mm</option><option value='12mm'>12mm</option></select>";
			$("#"+txtthicknessid+" option[value='"+thickness.trim()+"']").prop('selected', true);

		sizeid="size"+a;
		txtsizeid="txtsize"+a;
		var size=document.getElementById(sizeid).innerHTML;

			document.getElementById(sizeid).innerHTML="<select style='width:100px;' class='form-control' id='"+txtsizeid+"' placeholder='size'><option value=''>Size</option><option value='600x600(2x2)' >600x600(2x2)</option><option value='300x300(1x1)'>300x300(1x1)</option><option value='800x1200(2x4)'>800x1200(2x4)</option><option value='18x12'>18x12</option><option value='24x12'>24x12</option></select>";
			$("#"+txtsizeid+" option[value='"+size.trim()+"']").prop('selected', true);
			

		productimgid="productimg"+a;
		txtproductimgid="txtproductimg"+a;
		var productimg=document.getElementById(productimgid).innerHTML;
			productimg=productimg.trim();
			console.log(productimg);
			var Upload="Upload";
			//document.getElementById(productimgid).innerHTML="<a class='btn btn-primary' onClick=\'disp_product_photo('"+productimg+"');\'>Upload</a>";
			//document.getElementById(productimgid).innerHTML="<a class='btn btn-primary' onClick=\"disp_product_photo('"+productimg+"');\" data-toggle='modal' data-target='#photo-update'>"+Upload+"</a>";
			document.getElementById(productimgid).innerHTML="<button class='btn btn-primary' onClick=\"disp_product_photo('"+productimg+"');\"  data-toggle='modal' data-target='#photo-update' >Upload</button>";
		//document.getElementById(productimgid).innerHTML="<input style='width:100px;' type='button' value='"+productimg+"' id='"+txtproductimgid+"'>";
		/*document.getElementById('productimage').src='../'+productimg.trim();
		
		document.getElementsByName('imagepath').value = productimg.trim();
		document.getElementsByName('path').value = productimg.trim();
			*/
		


		updateid="update"+a;
		editid="edit"+a;
		document.getElementById(editid).style.visibility="hidden";
		document.getElementById(updateid).style.visibility="visible";
		}








		function bb(b)
		{
		var nameid="txtname"+b;
		var name=document.getElementById(nameid).value;

		var  colorid="txtcolor"+b;
		var color =document.getElementById(colorid).value;

		var  typeid="txttype"+b;
		var type =document.getElementById(typeid).value;

		var  usageid="txtusage"+b;
		var usage=document.getElementById(usageid).value;

		var  stockid="txtstock"+b;
		var stock=document.getElementById(stockid).value;

		var  priceid="txtprice"+b;
		var price=document.getElementById(priceid).value;

		var  pieceinboxid="txtpieceinbox"+b;
		var pieceinbox=document.getElementById(pieceinboxid).value;

		var  weightid="txtweight"+b;
		var weight=document.getElementById(weightid).value;

		var  thicknessid="txtthickness"+b;
		var thickness=document.getElementById(thicknessid).value;

		var  sizeid="txtsize"+b;
		var size=document.getElementById(sizeid).value;

		//var  productimgid="txtproductimg"+b;
		//var productimg=document.getElementById(productimgid).files[0].name;

		update_value(b,name,color,type,usage,stock,price,pieceinbox,weight,thickness,size);


		document.getElementById(b).style.visibility="visible";
		document.getElementById("update"+b).style.visibility="hidden";


		document.getElementById("name"+b).innerHTML=name;
		document.getElementById("color"+b).innerHTML=color;
		document.getElementById("type"+b).innerHTML=type;
		document.getElementById("usage"+b).innerHTML=usage;
		document.getElementById("stock"+b).innerHTML=stock;
		document.getElementById("price"+b).innerHTML=price;
		document.getElementById("pieceinbox"+b).innerHTML=pieceinbox;
		document.getElementById("weight"+b).innerHTML=weight;
		document.getElementById("thickness"+b).innerHTML=thickness;
		document.getElementById("size"+b).innerHTML=size;
		//document.getElementById("productimg"+b).innerHTML=productimg;
		}
		function update_value(id,name,color,type,usage,stock,price,pieceinbox,weight,thickness,size)
		{

			$.post("php/product.php?status=update",{

				id1:id , name1:name , color1:color , type1:type , usage1:usage , stock1:stock , price1:price , pieceinbox1:pieceinbox , weight1:weight , thickness1:thickness , size1:size 


			} ,function(){
			disp_data("php/product.php?status=disp");
		  });
		}

		function delete1(id)
		{
		var xmlhttp=new XMLHttpRequest();
		  xmlhttp.open("GET","php/product.php?id="+id+"&status=delete",false);
		  xmlhttp.send(null);
		  disp_data('php/product.php?status=disp');
		}

		function ins()	
		{
				event.preventDefault();

				// Get form
				var form = $('#fileUploadForm')[0];

				// Create an FormData object 
				var data = new FormData(form);




				$.ajax({
					type: "POST",
					enctype: 'multipart/form-data',
					url: "php/product.php?ins=ins",
					data: data,
					processData: false,
					contentType: false,
					cache: false,
					timeout: 600000,
					success: function (data) {

						alert('product added successfully!!');
					   disp_data('php/product.php?status=disp');


					},
					error: function (e) {


					   alert('product not added successfully');
					disp_data('php/product.php?status=disp');
					}
				});
		}