/*  
		-------------** Curd operation for Product detail **------------
		
		aa()            -->         edit operation to product detail (make label to textbox)
		bb()            -->         update data from edit to database
		update_value()  -->         this operation is sub function of bb() for update data to database
		delete1()       -->         it is for delete the product 
		ins()           -->         this function is use for insert new product
		
		*/

function productphotodelete(id, d) {

	$.post("php/updateproductphoto.php", { id: id, status: 'delete' }, function () {
		alert('Product Image Deleted');
		disp_data('php/product.php?status=disp');
		disp_product_photo(d);
	});
}
function addproductimage(id) {


	var form = $('#addnewproductimage')[0];
	//document.getElementById('')
	// Create an FormData object 
	var data = new FormData(form);
	//var f = document.getElementsByName('imagepath').value;
	data.append('status', 'add');
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

function up(id, d) {

	var formid = "id" + id;

	var form = $('#' + formid)[0];
	var data = new FormData(form);
	data.append('status', 'update');
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
			disp_product_photo(id);

		},
		error: function (e) {


			alert('something want wrong!!!');

		}
	});

}
function disp_product_photo(id) {

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST", "php/FetchProductPhoto.php?id=" + id + "&status=imageupdate", false);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send(null);
	document.getElementById("disp_update_photo").innerHTML = xmlhttp.responseText;

}
function bb(id) {


	$("#name" + id).html("<input type='text' style='width:80px;' value='" + $("#name" + id).html().trim() + "' id='" + 'txtname' + id + "'>");
	$("#color" + id).html("<input type='text' style='width:80px;' value='" + $("#color" + id).html().trim() + "' id='" + 'txtcolor' + id + "'>");

	var type = $("#type" + id).html().trim();
	$("#type" + id).html("<select style='width:100px;' class='form-control' id='txttype" + id + "' placeholder='type'><option value=''></option><option value='Double Charge'>Double Charge</option><option value='Digital Tiles'>Digital Tiles</option><option value='GVT'>GVT</option><option value='PGVT'>PGVT</option></select>");
	$('#txttype' + id).val(type);

	var type = $("#usage" + id).html().trim();
	$("#usage" + id).html("<select style='width:100px;' class='form-control' placeholder='usage' id='txtusage" + id + "'><option value=''>Usage</option><option value='Wall Tiles'>Wall Tiles</option><option value='Floor Tiles'>Floor Tiles</option><option value='Parking Tiles'>Parking Tiles</option><option value='Alivation Tiles'>Alivation Tiles</option><option value='Kitchen Tiles'>Kitchen Tiles</option></select>");
	$('#txtusage' + id).val(type);

	$("#stock" + id).html("<input type='text' style='width:60px;' value='" + $("#stock" + id).html().trim() + "' id='txtstock" + id + "'>");
	$("#price" + id).html("<input type='text' style='width:60px;' value='" + $("#price" + id).html().trim() + "' id='txtprice" + id + "'>");
	$("#weight" + id).html("<input type='text' style='width:60px;' value='" + $("#weight" + id).html().trim() + "' id='txtweight" + id + "'>");

	var thickness = $("#thickness" + id).html().trim();
	$("#thickness" + id).html("<select style='width:80px;' class='form-control' id='txtthickness" + id + "' placeholder='thickness'><option value=''>Thickness</option><option value='8mm' >8mm</option><option value='10mm'>10mm</option><option value='12mm'>12mm</option></select>");
	$('#txtthickness' + id).val(thickness);

	var size = $("#size" + id).html().trim();
	$("#size" + id).html("<select style='width:100px;' class='form-control' id='txtsize" + id + "' placeholder='size'><option value=''>Size</option><option value='600x600(2x2)' >600x600(2x2)</option><option value='300x300(1x1)'>300x300(1x1)</option><option value='800x1200(2x4)'>800x1200(2x4)</option><option value='18x12'>18x12</option><option value='24x12'>24x12</option></select>");
	$('#txtsize' + id).val(size);









	// productimgid = "productimg" + a;
	// txtproductimgid = "txtproductimg" + a;
	// var productimg = document.getElementById(productimgid).innerHTML;
	// productimg = productimg.trim();
	// console.log(productimg);
	// var Upload = "Upload";
	// //document.getElementById(productimgid).innerHTML="<a class='btn btn-primary' onClick=\'disp_product_photo('"+productimg+"');\'>Upload</a>";
	// //document.getElementById(productimgid).innerHTML="<a class='btn btn-primary' onClick=\"disp_product_photo('"+productimg+"');\" data-toggle='modal' data-target='#photo-update'>"+Upload+"</a>";
	// document.getElementById(productimgid).innerHTML = "<button class='btn btn-primary' onClick=\"disp_product_photo('" + productimg + "');\"  data-toggle='modal' data-target='#photo-update' >Upload</button>";
	// //document.getElementById(productimgid).innerHTML="<input style='width:100px;' type='button' value='"+productimg+"' id='"+txtproductimgid+"'>";
	// /*document.getElementById('productimage').src='../'+productimg.trim();

	// document.getElementsByName('imagepath').value = productimg.trim();
	// document.getElementsByName('path').value = productimg.trim();
	// 	*/


	$("update" + id).hide();
	$("edit" + id).show();
	updateid = "update" + a;
	editid = "edit" + a;
	document.getElementById(editid).style.visibility = "hidden";
	document.getElementById(updateid).style.visibility = "visible";
}








function bb1(id) {









	document.getElementById(b).style.visibility = "visible";
	document.getElementById("update" + b).style.visibility = "hidden";


	document.getElementById("name" + b).innerHTML = name;
	document.getElementById("color" + b).innerHTML = color;
	document.getElementById("type" + b).innerHTML = type;
	document.getElementById("usage" + b).innerHTML = usage;
	document.getElementById("stock" + b).innerHTML = stock;
	document.getElementById("price" + b).innerHTML = price;
	document.getElementById("pieceinbox" + b).innerHTML = pieceinbox;
	document.getElementById("weight" + b).innerHTML = weight;
	document.getElementById("thickness" + b).innerHTML = thickness;
	document.getElementById("size" + b).innerHTML = size;
	//document.getElementById("productimg"+b).innerHTML=productimg;
}
function update_value(id, name, color, type, usage, stock, price, pieceinbox, weight, thickness, size) {

	$.post("php/product.php?status=update", {

		id1: id, name1: name, color1: color, type1: type, usage1: usage, stock1: stock, price1: price, pieceinbox1: pieceinbox, weight1: weight, thickness1: thickness, size1: size


	}, function () {
		disp_data("php/product.php?status=disp");
	});
}

function delete1(id) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "php/product.php?id=" + id + "&status=delete", false);
	xmlhttp.send(null);
	disp_data('php/product.php?status=disp');
}

function ins() {
	event.preventDefault();

	var form = $('#fileUploadForm')[0];
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