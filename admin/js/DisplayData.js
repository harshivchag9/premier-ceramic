
function disp_data(path) {

	$.ajax({
		url: path,
		method: "GET",
		success: function (data) {
			document.getElementById("disp_data").innerHTML = data;
		},
		error: function (textStatus, errorThrown) {
		},
		complete: function () {
		}
	});

}



// -------------------------------------------------------------------------------------------
// Admin Product stock
// -------------------------------------------------------------------------------------------



function displayStockScreen(searchData = "") {
	$.cookie("tab", 7, { expires: 30, secure: true });
	$(".nav-link").removeClass('active');
	$("#AdminStock").addClass('active');
	$.ajax({
		url: "api/get-stock.php",
		method: "POST",
		data: { search: searchData },
		cache: false,
		success: function (data) {

			var obj = jQuery.parseJSON(data);

			var html = '<div class="form-row" style="margin-left: 10px">\
			<input type="text" id="searchdata" value="'+ searchData + '" class="form-row" placeholder="Search" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\
			<input  type="button" class="btn btn-primary" value="Search"  onClick="displayStockScreen(searchdata.value);" >\
			</div><br/>';
			html += "<table class='table table-striped table-bordered table-hover table-condensed' border='1px' style='width: 100%;'><thead >\
			<tr><th>Id</th>	<th>Product Name</th><th>Stock</th>	</tr></thead>";

			$.each(obj, function (i) {
				html +=
					'<tr>\
					<td><span id="id'+ obj[i].product_id + '">' + obj[i].product_id + '</span></td>\
					<td><span id="name'+ obj[i].product_id + '">' + obj[i].product_name + '</span></td>\
					<td>\
						<span id="stock'+ obj[i].product_id + '" >\
							<div id="stock-'+ obj[i].product_id + '" onClick="editStock(' + obj[i].product_id + ')">\
							'+ obj[i].stock + '\
							</div>\
						</span>\
					</td>\
				</tr>';
			});
			html += '</table>';
			$("#disp_data").html(html);

		}
	});
}

function editStock(id) {
	$("#stock" + id).html("<input type='number' id='txtstock" + id + "' value='" + $("#stock-" + id).html().trim() + "' class='form-control' Onblur='updateStock(" + id + ")'>");
}

function updateStock(id) {
	var data = {
		id: id,
		stock: $("#txtstock" + id).val()
	}
	$.ajax({
		url: "api/update-stock.php",
		method: "POST",
		data: data,
		success: function () {
			$("#stock" + id).html("<div id='stock-" + id + "' Onblur='changestock(" + id + ");'>" + data.stock + "</div>");
		}
	});
}



// -------------------------------------------------------------------------------------------
// Admin Product
// -------------------------------------------------------------------------------------------


function displayProductScreen() {
	$.cookie("tab", 1, { expires: 30, secure: true });
	$(".nav-link").removeClass('active');
	$("#addproductnav").addClass('active');

	$.ajax({
		url: "api/get-products.php",
		method: "GET",
		cache: false,
		success: function (data) {

			var obj = jQuery.parseJSON(data);
			var html = '<div class="row">' +
				'				<form method="POST" enctype="multipart/form-data" id="fileUploadForm" class="form-control">' +
				'					<div id="disp_data"></div>' +
				'					<input type="text" class="form-group" value="product1" name="name" id="txtnameins" placeholder="name">' +
				'					<input type="text" class="form-group" value="black" name="color" id="txtcityins1" placeholder="color">' +
				'					<select class="form-control-sm" name="type"  id="txtcityins2" placeholder="type">' +
				'							<option value="">Type</option>' +
				'							<option selected value="Double Charge">Double Charge</option>' +
				'							<option value="Digital Tiles">Digital Tiles</option>' +
				'							<option value="GVT">GVT</option>' +
				'							<option value="PGVT">PGVT</option>' +
				'					</select>' +
				'					<select class="form-control-sm" name="usage" placeholder="usage" id="txtcityins3">' +
				'							<option value="">Usage</option>' +
				'							<option selected value="Wall Tiles">Wall Tiles</option>' +
				'							<option value="Floor Tiles">Floor Tiles</option>' +
				'							<option value="Parking Tiles">Parking Tiles</option>' +
				'							<option value="Alivation Tiles">Alivation Tiles</option>' +
				'							<option value="Kitchen Tiles">Kitchen Tiles</option>' +
				'					</select>' +
				'					<input type="number" value="100" class="form-group" name="stock" id="txtcityins4" placeholder="stock">' +
				'					<input type="number" value="200" class="form-group" name="price" id="txtcityins5" placeholder="price">' +
				'					<input type="number" value="8" class="form-group" name="pieceinbox" id="txtcityins6" placeholder="pieceinbox">' +
				'					<input type="number" value="20" class="form-group" name="weight" id="txtcityins7" placeholder="weight">' +
				'					<select class="form-control-sm" name="thickness" id="txtcityins8" placeholder="thickness" style="width:100px">' +
				'							<option value="">Thickness</option>' +
				'							<option selected value="8mm">8mm</option>' +
				'							<option value="10mm">10mm</option>' +
				'							<option value="12mm">12mm</option>' +
				'					</select>' +
				'					<select class="form-control-sm" name="size" id="txtcityins9" placeholder="size">' +
				'							<option value="">Size</option>' +
				'							<option selected value="600x600(2x2)">600x600(2x2)</option>' +
				'							<option value="300x300(1x1)">300x300(1x1)</option>' +
				'							<option value="800x1200(2x4)">800x1200(2x4)</option>' +
				'							<option value="18x12">18x12</option>' +
				'							<option value="24x12">24x12</option>' +
				'					</select>' +
				'					<input type="file" name="files[]" class="form-control-sm" multiple >' +
				'					<input type="button" name="upload"  class="btn btn-primary" id="upload" value="insert" onClick="insertProduct();">' +
				'				</form>	' +
				'			</div>';
			html += "<table class='table table-striped table-bordered table-hover table-condensed' border='1px' style= ''><thead ></thead>\
			<tr><th>Id</th>	<th>Product_Name</th> <th>Color</th> <th>Type</th> <th>Usage</th> <th>Stock</th> <th>price</th>	<th>piece</th> <th>weight</th> <th>thickness</th><th>size</th> <th>product Image</th> <th>Action</th> </tr> </thead>";

			$.each(obj, function (i) {
				html += "<tr> <td style='width:30px;'> <span id=img" + obj[i].product_id + " >" + obj[i].product_id + "</span></td>"
				html += " <td style='width:150px;'> <span id=name" + obj[i].product_id + " >" + obj[i].product_name + "</span></td>"
				html += " <td style='width:80px;'> <span id=color" + obj[i].product_id + " >" + obj[i].color + "</span></td>"
				html += " <td style='width:120px;'> <span id=type" + obj[i].product_id + " >" + obj[i].type + "</span></td>"
				html += " <td style='width:120px;'> <span id=usage" + obj[i].product_id + " >" + obj[i].usage + "</span></td>"
				html += " <td style='width:90px;'> <span id=stock" + obj[i].product_id + " >" + obj[i].stock + "</span></td>"
				html += " <td style='width:8px;'> <span id=price" + obj[i].product_id + " >" + obj[i].price + "</span></td>"
				html += " <td style='width:60px;'> <span id=pieceinbox" + obj[i].product_id + " >" + obj[i].pieceinbox + "</span></td>"
				html += " <td style='width:75px;'> <span id=weight" + obj[i].product_id + " >" + obj[i].weight + "</span></td>"
				html += " <td style='width:100px;'> <span id=thickness" + obj[i].product_id + " >" + obj[i].thickness + "</span></td>"
				html += " <td style='width:100px;'> <span id=size" + obj[i].product_id + " >" + obj[i].size + "</span></td>"
				html += " <td style='width:;'> <span id=productimg" + obj[i].product_id + " >" + obj[i].productimg + "</span></td><td>"

				html += '<input type="button" name="' + obj[i].product_id + '" id="delete' + obj[i].product_id + '" class="btn btn-danger"  value="delete" onClick="deleteProduct(this.name)">\
				<input type="button" id="edit'+ obj[i].product_id + '"  class="btn btn-success"  value="edit" onClick="editProduct(' + obj[i].product_id + ')"> \
				<input type="button" id="update'+ obj[i].product_id + '" class="btn btn-info" name="' + obj[i].product_id + '" value="update"  style="visibility:hidden " onClick="updateProduct(this.name)"></td>';

			});
			html += "</td> </tr> </table>"






			$("#disp_data").html(html);
		},
		complete: function () {
		}
	});

}

function displayProductImage(id) {
	$.ajax({
		url: "api/get-product-image.php",
		method: "GET",
		data: { id: id },
		cache: false,
		success: function (data) {
			var obj = jQuery.parseJSON(data);
			var html = "";
			$.each(obj, function (i) {
				html += '<div class="col-lg-4 col-md-4">\
							<div class="product">\
								<img height="350px" width="350px" id="img-" src="../'+ obj[i][2] + '" alt="">\
								<div class="text">\
									<form id="id'+ obj[i][0] + '" >\
										<input type="file" name="uploadimage" >\
										<input type="hidden" name="path" value="'+ obj[i][2] + '" >\
										<input type="hidden" name="product_id" value="'+ obj[i][0] + '" >\
									</form>\
									<p class="buttons">\
										<input type="button" class="btn btn-primary" name="update" value="upload" onClick="updateProductImage('+ obj[i][0] + ',' + id + ');"> \
										<input type="button" class="btn btn-danger" name="delete" value="Delete" onClick="deleteProductImage('+ obj[i][0] + ',' + id + ');"> \
									</p>\
								</div>\
							</div>\
						</div>';
			});
			html += '<br><br><br>\
			<h4><b>Add New Image</b></h4>\
			<form id="addnewproductimage">\
				<input type="file" id="addphoto" name="addphoto">\
				<input type="hidden" name="id" value="'+ id + '">\
				<input class="btn btn-primary" value="Add Image" onClick="addProductImage('+ id + ');">\
			</form>';
			$("#disp_update_photo").html(html);
		},
	});
}

function deleteProductImage(imageId, productId) {
	var response = confirm("Are you sure to delete this item?");
	if (response == true) {
		$.post("api/delete-product-image.php", { id: imageId }, function () {
			displayProductImage(productId);
		});
	}

}

function addProductImage(id) {
	var form = $('#addnewproductimage')[0];
	var data = new FormData(form);
	var validImageTypes = ["image/gif", "image/jpeg", "image/png"];

	if ($('#addphoto')[0].files.length === 0) {
		alert("No file selected");
	}
	else {
		var fileType = $("#addphoto")[0].files[0]["type"];
		if ($.inArray(fileType, validImageTypes) < 0) {
			alert("file should be jpg, png and gif only");
		}
		else {
			$.ajax({
				type: "POST",
				enctype: 'multipart/form-data',
				url: "api/add-product-image.php",
				data: data,
				processData: false,
				contentType: false,
				cache: false,
				timeout: 600000,
				success: function (data) {

					alert('Image Add Successfully');
					displayProductImage(id);
				},
				error: function (e) {
					alert('something want wrong!!!');
				}
			});
		}
	}



}

function updateProductImage(imageId, productId) {

	var formid = "id" + imageId;

	var form = $('#' + formid)[0];
	var data = new FormData(form);
	$.ajax({
		type: "POST",
		enctype: 'multipart/form-data',
		url: "api/update-product-image.php",
		data: data,
		processData: false,
		contentType: false,
		cache: false,
		timeout: 600000,
		success: function (data) {

			alert('Picture Update Successfully');
			displayProductImage(productId);

		},
		error: function (e) {


			alert('something want wrong!!!');

		}
	});

}

function insertProduct() {
	event.preventDefault();

	var form = $('#fileUploadForm')[0];
	var data = new FormData(form);

	$.ajax({
		type: "POST",
		enctype: 'multipart/form-data',
		url: "api/insert-product.php",
		data: data,
		processData: false,
		contentType: false,
		cache: false,
		timeout: 600000,
		success: function (data) {

			alert('product added successfully!!');
			// displayProductScreen();


		},
		error: function (e) {


			alert('product not added successfully');
			// displayProductScreen();
		}
	});
}
function updateProduct(id) {


	var data = {
		id: id,
		name: $("#txtname" + id).val(),
		color: $("#txtcolor" + id).val(),
		type: $("#txttype" + id).val(),
		usage: $("#txtusage" + id).val(),
		stock: $("#txtstock" + id).val(),
		price: $("#txtprice" + id).val(),
		pieceinbox: $("#txtpieceinbox" + id).val(),
		weight: $("#txtweight" + id).val(),
		thickness: $("#txtthickness" + id).val(),
		size: $("#txtsize" + id).val()
	}

	$.ajax({
		url: "api/update-product.php",
		method: "POST",
		data: data,
		complete: function () {

			$("#name" + id).html(data.name);
			$("#color" + id).html(data.color);
			$("#type" + id).html(data.type);
			$("#usage" + id).html(data.usage);
			$("#stock" + id).html(data.stock);
			$("#price" + id).html(data.price);
			$("#pieceinbox" + id).html(data.pieceinbox);
			$("#weight" + id).html(data.weight);
			$("#thickness" + id).html(data.thickness);
			$("#size" + id).html(data.size);
			$("#productimg" + id).html("");

			$("#update" + id).hide();
			$("#edit" + id).show();
		}
	});

}


function editProduct(id) {

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
	$("#pieceinbox" + id).html("<input type='text' style='width:60px;' value='" + $("#pieceinbox" + id).html().trim() + "' id='txtpieceinbox" + id + "'>");

	var thickness = $("#thickness" + id).html().trim();
	$("#thickness" + id).html("<select style='width:80px;' class='form-control' id='txtthickness" + id + "' placeholder='thickness'><option value=''>Thickness</option><option value='8mm' >8mm</option><option value='10mm'>10mm</option><option value='12mm'>12mm</option></select>");
	$('#txtthickness' + id).val(thickness);

	var size = $("#size" + id).html().trim();
	$("#size" + id).html("<select style='width:100px;' class='form-control' id='txtsize" + id + "' placeholder='size'><option value=''>Size</option><option value='600x600(2x2)' >600x600(2x2)</option><option value='300x300(1x1)'>300x300(1x1)</option><option value='800x1200(2x4)'>800x1200(2x4)</option><option value='18x12'>18x12</option><option value='24x12'>24x12</option></select>");
	$('#txtsize' + id).val(size);

	$("#productimg" + id).html("<button class='btn btn-primary' onClick=\"displayProductImage('" + id + "');\"  data-toggle='modal' data-target='#photo-update' >Upload</button>");



	$("#update" + id).css("visibility", "visible ");
	$("#update" + id).show();
	$("#edit" + id).hide();

}

function deleteProduct(id) {
	var response = confirm("Are you sure to delete this item?");
	if (response == true) {
		$.get("api/delete-product.php?id=" + id, function (data) {
			$($("#delete" + id).closest("tr")).remove();
		});
	}
}

// -------------------------------------------------------------------------------------------
// Admin Inquiry
// -------------------------------------------------------------------------------------------




function displayInquiryScreen() {
	$.cookie("tab", 2, { expires: 30, secure: true });
	$(".nav-link").removeClass('active');
	$("#contactinquirynav").addClass('active');
	$.ajax({
		url: "api/get-inquiries.php",
		method: "GET",
		cache: false,
		success: function (data) {

			var obj = jQuery.parseJSON(data);

			var html = "<table class='table table-striped table-bordered table-hover table-condensed' border='1px' >\
			<tr> <th>Id</th> <th>Fname</th>	<th>Lname</th> <th>Email</th> <th>Subject</th> <th>Message</th>	<th>Remark</th>	<th>Status</th>	</tr>";

			$.each(obj, function (i) {
				html += "<tr> <td > " + obj[i].cformid + "</td>";
				html += " <td > <span id=fname" + obj[i].cformid + " >" + obj[i].fname + "</span></td>";
				html += " <td > <span id=lname" + obj[i].cformid + " >" + obj[i].lname + "</span></td>";
				html += " <td > <span id=email" + obj[i].cformid + " >" + obj[i].email + "</span></td>";
				html += " <td > <span id=subject" + obj[i].cformid + " >" + obj[i].subject + "</span></td>";
				html += " <td > <span id=message" + obj[i].cformid + " >" + obj[i].message + "</span></td>";

				if (obj[i].status == 0) {
					html += '<td><div id="remark1' + obj[i].cformid + '"><textarea rows="2" cols="50" type="text" id="remark' + obj[i].cformid + '">' + obj[i].remark + '</textarea> </div> </td>';
					html += ' <td >  <input type="button" id="status' + obj[i].cformid + '" class="btn btn-primary"  value="unchecked" onClick="checkInquiry(' + obj[i].cformid + ')"> </td></tr>';

				}
				else if (obj[i].status == 1) {
					html += '<td><div id="remark1' + obj[i].cformid + '">' + obj[i].remark + '</div> </td><td><input type="button" class="btn btn-primary disabled" id="status' + obj[i].cformid + '" value="checked"></td></tr>';
				}
			});
			html += " </table>"
			$("#disp_data").html(html);
		},
		error: function (textStatus, errorThrown) {
		},
		complete: function () {
		}
	});

}


function checkInquiry(id) {
	var remark = $("#remark" + id).val();

	if (!remark) {
		alert("The remark should not be empty");
		return;
	}
	$.ajax({
		url: "api/check-inquiry.php",
		method: "POST",
		data: { id: id, remark: remark },
		success: function (data) {
			$("#remark1" + id).html(remark);
			$("#status" + id).val("checked");
			$("#status" + id).addClass("disabled");
		}
	});
}



// -------------------------------------------------------------------------------------------
// Admin Manage User
// -------------------------------------------------------------------------------------------



function displayUsers() {
	$.cookie("tab", 3, { expires: 30, secure: true });
	$(".nav-link").removeClass('active');
	$("#manageusernav").addClass('active');
	$.ajax({
		url: "api/get-users.php",
		method: "GET",
		cache: false,
		success: function (data) {

			var obj = jQuery.parseJSON(data);
			var html = "<table class='table table-striped table-bordered table-hover table-condensed' border='1px' style=''><thead >\
			<tr> <th>Id</th> <th>User Name</th> <th>Email</th> <th>Role</th> <th>Action</th> </tr></thead>";


			$.each(obj, function (i) {
				html += '<tr>' +
					'<td><span id="userid' + obj[i].user_id + '">' + obj[i].user_id + '</span></td>' +
					'<td><span id="username' + obj[i].user_id + '">' + obj[i].username + '</span></td>' +
					'<td><div id="email' + obj[i].user_id + '">' + obj[i].email + '</div></td>' +
					'<td><div id="role' + obj[i].user_id + '">' + obj[i].role + '</div></td>' +
					'<td>\
					<input type="button" id="delete' + obj[i].user_id + '" class="btn btn-danger" name="' + obj[i].user_id + '" value="delete" onClick="deleteUser(this.name)">\
					<input type="button" id="edit' + obj[i].user_id + '" name="' + obj[i].user_id + '" class="btn btn-success"  value="edit" onClick="editUser(this.name)"> \
					<input type="button" id="update' + obj[i].user_id + '" class="btn btn-info" name="' + obj[i].user_id + '" value="update"  style="visibility:hidden " onClick="updateUser(this.name)">\
					</td>';
			});
			html += '</tr></table>'
			$("#disp_data").html(html);

		}
	});
}

function editUser(id) {
	$("#username" + id).html("<input type='text' value='" + $("#username" + id).html().trim() + "' id='txtusername" + id + "'>");

	var email = $("#email" + id).html();
	$("#email" + id).html("<input type='text' value='" + $("#email" + id).html().trim() + "' id='txtemail" + id + "'>");


	var role = $("#role" + id).html().trim();
	$("#role" + id).html("<select style='width:100px;' class='form-control' id='txtrole" + id + "' placeholder='size'><option value='user' >User</option><option value='admin'  >Admin</option><option value='marketing'>Marketing Dept.</option><option value='production'>Production Dept.</option>");
	$('#txtrole' + id).val(role);



	$("#update" + id).css("visibility", "visible ");
	$("#edit" + id).hide();


}
function updateUser(id) {
	var data = {
		id: id,
		username: $("#txtusername" + id).val(),
		email: $("#txtemail" + id).val(),
		role: $("#txtrole" + id).val()
	}


	$.ajax({
		url: "api/update-user.php",
		method: "POST",
		data: data,
		complete: function () {
			$("#username" + id).html(data.username);
			$("#email" + id).html(data.email);
			$("#role" + id).html(data.role);

			$("#update" + id).hide();
			$("#edit" + id).show();

		}
	});
}

function deleteUser(id) {
	var response = confirm("Are you sure to delete this item?");
	if (response == true) {
		$.post("api/delete-user.php", { id: id }, function () {
			$($("#delete" + id).closest("tr")).remove();
		});
	}
}

// -------------------------------------------------------------------------------------------
// Admin Blog
// -------------------------------------------------------------------------------------------


function displayBlogs() {
	$.cookie("tab", 4, { expires: 30, secure: true });
	$(".nav-link").removeClass('active');
	$("#addblognav").addClass('active');
	$.ajax({
		url: "api/get-blogs.php",
		method: "GET",
		cache: false,
		success: function (data) {

			var obj = jQuery.parseJSON(data);
			var html = '<a style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#blog-insert">Add New Blog</a><br/><br/><br/>\
			<div class="form-group">\
			   <div class="row">\
				  <div class="row">';

			$.each(obj, function (i) {

				html += '<div  class="col-lg-4">\
				  <div class="product">\
					 <a  class="visible"><img height="350px" width="550px" id="img-'+ obj[i].blog_id + '" src="../' + obj[i].blogimage + '" alt=""></a>\
					 <div class="text">\
						<h3><a id="title-'+ obj[i].blog_id + '" href="detail.html">' + obj[i].title + '</a></h3>\
						<p id="date-'+ obj[i].blog_id + '" > ' + obj[i].date + '  </p>\
						<p id="description-'+ obj[i].blog_id + '" > ' + obj[i].description + ' </p>\
						<p class="buttons">\
						   <a class="btn btn-danger" onClick="blogDelete('+ obj[i].blog_id + ');" >Delete</a>\
						   <a class="btn btn-primary" onClick="editBlog('+ obj[i].blog_id + ');" data-toggle="modal" data-target="#blog-edit">Edit</a>\
								</p>\
							</div>\
						</div>\
					</div> ';
			});
			html += '</div></div></div>'
			$("#disp_data").html(html);

		}
	});
}

function addBlog() {

	var form = $('#insertblog')[0];
	var data = new FormData(form);

	var validImageTypes = ["image/gif", "image/jpeg", "image/png"];

	if ($('#blogImage')[0].files.length === 0) {
		alert("No file selected");
	}
	else {
		var fileType = $("#blogImage")[0].files[0]["type"];
		if ($.inArray(fileType, validImageTypes) < 0) {
			alert("file should be jpg, png and gif only");
		}
		else {
			$.ajax({
				type: "POST",
				enctype: 'multipart/form-data',
				url: "api/add-blog.php",
				data: data,
				processData: false,
				contentType: false,
				cache: false,
				timeout: 600000,
				success: function (data) {
					displayBlogs();
				}
			});
		}
	}

}

function blogDelete(id) {
	var response = confirm("Are you sure to delete Blog?");
	if (response == true) {
		$.ajax({
			url: "api/delete-blog.php",
			data: { id: id },
			method: "POST",
			success: function (data) {
				displayBlogs();
			}
		});
	}
}

function editBlog(id) {

	var image = $("#img-" + id).attr('src').trim();
	var title = $("#title-" + id).html().trim();
	var description = $("#description-" + id).html().trim();
	$("#blogimage").prop('src', image);
	$("#blogpath").val(image);
	$("#blogedittitle").val(title);
	$("#blogdescription").val(description);
	$("#blogid").val(id);
	$("#blogpath").val("../" + image);

}


function updateBlog() {
	var form = $('#blogupdate')[0];
	var data = new FormData(form);
	var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
	var flag = true;


	if (!$('#updateBlogImage')[0].files.length === 0) {
		var fileType = $("#updateBlogImage")[0].files[0]["type"];
		if ($.inArray(fileType, validImageTypes) < 0) {
			alert("file should be jpg, png and gif only");
			flag = false;
		}
	}

	if (flag) {
		$.ajax({
			type: "POST",
			enctype: 'multipart/form-data',
			url: "api/update-blog.php",
			data: data,
			processData: false,
			contentType: false,
			cache: false,
			timeout: 600000,
			success: function (data) {

			},
			error: function (e) {
				alert('something want wrong!!!');
			}
		});
	}
}

// -------------------------------------------------------------------------------------------
// Admin Order
// -------------------------------------------------------------------------------------------



function displayOrders() {
	$.cookie("tab", 5, { expires: 30, secure: true });
	$(".nav-link").removeClass('active');
	$("#AdminOrder").addClass('active');
	$.ajax({
		url: "api/get-orders.php",
		method: "GET",
		cache: false,
		success: function (data) {

			var obj = jQuery.parseJSON(data);
			var html = '<div id="Order_Details" tabindex="-1" role="dialog" aria-labelledby="upload" aria-hidden="true" class="modal fade">' +
				'   <div class="modal-dialog modal-lg">' +
				'      <div class="modal-content">' +
				'         <div class="modal-header">' +
				'            <h5 class="modal-title">Order Details</h5>' +
				'            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" >x</span></button>' +
				'         </div>' +
				'         <div class="modal-body">' +
				'           <div id="orderDetailsData" class="table-responsive"></div>' +
				'         </div>' +
				'      </div>' +
				'   </div>' +
				'</div>' +

				'	<div id="Order_Address" tabindex="-1" role="dialog" aria-labelledby="upload" aria-hidden="true" class="modal fade">' +
				'   <div class="modal-dialog modal-sm">' +
				'      <div class="modal-content">' +
				'         <div class="modal-header">' +
				'            <h5 class="modal-title">Address</h5>' +
				'            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" >x</span></button>' +
				'         </div>' +
				'         <div class="modal-body">' +
				'            <table >' +
				'               <tbody>' +
				'                  <tr>' +
				'                     <td><label><b>Address Id :</b></label> </td>' +
				'                     <td><label id=\'addid\'></label> </td>' +
				'                  </tr>' +
				'                  <tr>' +
				'                     <td><label><b>Order Id :</b></label> </td>' +
				'                     <td><label id=\'addorderid\'></label> </td>' +
				'                  </tr>' +
				'                  <tr>' +
				'                     <td><label><b>Frist Name :</b></label></td>' +
				'                     <td><label id=\'addfname\'></label> </td>' +
				'                  </tr>' +
				'                  <tr>' +
				'                     <td><label><b>Last Name :</b></label> </td>' +
				'                     <td><label id=\'addlname\'></label></td>' +
				'                  </tr>' +
				'                  <tr>			' +
				'                     <td><label><b>House No. :</b></label> </td>' +
				'                     <td><label id=\'addhouse\'></label> </td>' +
				'                  </tr>' +
				'                  <tr>' +
				'                     <td><label><b>Street :</b></label> </td>' +
				'                     <td><label id=\'addstreet\'></label> </td>' +
				'                  </tr> 						  				' +
				'                  <tr>' +
				'                     <td><label><b>City :</b></label> </td>' +
				'                     <td><label id=\'addcity\'></label> </td>' +
				'                  </tr>' +
				'                  <tr>' +
				'                     <td><label><b>Zip Code :</b></label> </td>' +
				'                     <td><label id=\'addzipcode\'></label> </td>' +
				'                  </tr> 			' +
				'                  <tr>' +
				'                     <td> <label><b>State :</b></label> </td>' +
				'                     <td><label id=\'addstate\'></label> </td>' +
				'                  </tr>' +
				'                  <tr>' +
				'                     <td><label><b>Country :</b></label> </td>' +
				'                     <td><label id=\'addcountry\'></label> </td>' +
				'                  </tr>' +
				'                  <tr>' +
				'                     <td><label><b>Phone No. :</b></label> </td>' +
				'                     <td><label id=\'addphone\'></label> </td>' +
				'                  </tr>  					' +
				'                  <tr>' +
				'                     <td><label><b>Email :</b></label>	 </td>' +
				'                     <td><label id=\'addemail\'></label> </td>' +
				'                  </tr>' +
				'               </tbody>' +
				'            </table>				  ' +
				'         </div>' +
				'      </div>' +
				'   </div>' +
				'</div>' +
				'<div id="Order_Payment" tabindex="-1" role="dialog" aria-labelledby="upload" aria-hidden="true" class="modal fade">' +
				'          <div class="modal-dialog modal-lg">' +
				'            <div class="modal-content">' +
				'              <div class="modal-header">' +
				'                <h5 class="modal-title">Payment</h5>' +
				'                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" >x</span></button>' +
				'              </div>' +
				'              <div class="modal-body">' +
				'				' +
				'					<table >' +
				'						<tbody>' +
				'							<tr>' +
				'' +
				'								<td><label><b>Payment Id :</b></label> </td>' +
				'								<td><label id=\'payid\'></label> </td>' +
				'							</tr>' +
				'							<tr>' +
				'								<td><label><b>Order Id :</b></label> </td>' +
				'								<td><label id=\'payorderid\'></label> </td>' +
				'							</tr>' +
				'							<tr>' +
				'								<td><label><b>Transaction Id :      </b></label></td>' +
				'								<td><label id=\'paytranid\'></label> </td>' +
				'							</tr>' +
				'							<tr>' +
				'								<td><label><b>Amount :</b></label> </td>' +
				'								<td><label id=\'payamount\'></label></td>' +
				'							</tr>' +
				'							<tr>			' +
				'								<td><label><b>Pament Mode :</b></label> </td>' +
				'								<td><label id=\'paymode\'></label> </td>' +
				'							</tr>' +
				'							<tr>' +
				'								<td><label><b>Currency :</b></label> </td>' +
				'								<td><label id=\'paycurrency\'></label> </td>' +
				'							</tr> 						  				' +
				'							<tr>' +
				'								<td><label><b>Date Of Payment :</b></label> </td>' +
				'								<td><label id=\'paydate\'></label> </td>' +
				'							</tr>' +
				'							<tr>' +
				'								<td><label><b>Status :</b></label> </td>' +
				'								<td><label id=\'paystatus\'></label> </td>' +
				'							</tr> 			' +
				'							<tr>' +
				'								<td> <label><b>Response Code :</b></label> </td>' +
				'								<td><label id=\'payrespcode\'></label> </td>' +
				'							</tr>' +
				'							<tr>' +
				'								<td><label><b>Response Message :</b></label> </td>' +
				'								<td><label id=\'payrespmsg\'></label> </td>' +
				'							</tr>' +
				'							<tr>' +
				'								<td><label><b>Gateway Name :</b></label> </td>' +
				'								<td><label id=\'paygateway\'></label> </td>' +
				'							</tr> ' +
				'							<tr>' +
				'								<td><label><b>Bank Transaction Id :</b></label> </td>' +
				'								<td><label id=\'paybanktranid\'></label> </td>' +
				'							</tr>  					' +
				'							<tr>' +
				'								<td><label><b>Bank Name :</b></label>	 </td>' +
				'								<td><label id=\'paybankname\'></label> </td>' +
				'							</tr>' +
				'						</tbody>' +
				'					</table>				  ' +
				'              </div>' +
				'            </div>' +
				'          </div>' +
				'        </div>';
			html += "<table class='table table-striped table-bordered table-hover table-condensed' border='1px' style='width: 100%;'><tr>\
			<th>Id</th>	<th>Order id</th> <th>Date</th> <th>Amount</th> <th>Status</th> <th>Address Info</th> <th>Payment Info</th> </tr></thead>";

			$.each(obj, function (i) {

				html += '<tr> \
					<td>  <span id="id'+ obj[i].paymentid + '">' + obj[i].paymentid + '</span>  </td>\
					<td>  <div id="orderid'+ obj[i].paymentid + '">' + obj[i].ORDERID + '</span>  </td>\
					<td>  <div id="date'+ obj[i].paymentid + '">' + obj[i].TXNDATE + '</span>  </td>\
					<td>  <div id="amount'+ obj[i].paymentid + '">' + obj[i].TXNAMOUNT + '</span>  </td>\
					<td>  \
						<span id="status'+ obj[i].paymentid + '">\
							<div id="status-' + obj[i].paymentid + '" onClick="editOrderStatus(' + obj[i].paymentid + ');" >' + obj[i].orderstatus + '</div>\
						</span> </td>\
					<td>  <div id="order'+ obj[i].paymentid + '"><input type="button" class="btn btn-primary" name="' + obj[i].ORDERID + '" onClick="popupOrderDetail(this.name)" id="order' + obj[i].ORDERID + '" data-toggle="modal" data-target="#Order_Details" value="Order"> </div></td>\
					<td>  <div id="address'+ obj[i].paymentid + '"><input type="button" class="btn btn-primary" name="' + obj[i].ORDERID + '" onClick="popupOrderAddress(this.name)" id="address' + obj[i].ORDERID + '" data-toggle="modal" data-target="#Order_Address" value="Address"> </div></td>\
					<td>  <div id="payment'+ obj[i].paymentid + '"><input type="button" class="btn btn-primary" name="' + obj[i].ORDERID + '" onClick="popupOrderPayment(this.name);"  data-toggle="modal" data-target="#Order_Payment" value="Payment"> </div> </td>\
				';
			});
			html += '</tr></table>'
			$("#disp_data").html(html);

		}
	});
}

function popupOrderDetail(id) {
	$.ajax({
		url: "../pdf.php?orderid=" + id,
		method: "GET",
		success: function (data) {
			$("#orderDetailsData").html(data);
		}
	});
}
function editOrderStatus(id) {
	var value = $("#status-" + id).html().trim();

	var html = "<select id='txtstatus" + id + "' class='form-control' onchange=\"updateOrderStatus(" + id + ");\"><option value='Placed'>Placed</option> <option value='Dispatched'>Dispatched</option> <option value='Delivered'>Delivered</option></select>"
	$("#status" + id).html(html);
	$('#txtstatus' + id).val(value);
}

function updateOrderStatus(id) {
	var data = { id: id, data: $("#txtstatus" + id).val() };

	$.post("api/update-order-status.php", data, function () {
		$("#status" + id).html("<div id='status-" + id + "' onClick='AdminOrderStatus(" + id + ")'>" + data.data + "</div>");
	});
}

function popupOrderPayment(id) {
	$("#payid").empty();
	$("#payorderid").empty();
	$("#payamount").empty();
	$("#paytranid").empty();
	$("#paymode").empty();
	$("#paycurrency").empty();
	$("#paydate").empty();
	$("#paystatus").empty();
	$("#payrespcode").empty();
	$("#payrespmsg").empty();
	$("#paybanktranid").empty();
	$("#paybankname").empty();
	$("#paygateway").empty();
	$.ajax({
		url: "api/get-order-payment.php",
		method: "POST",
		data: { id: id },
		success: function (data) {
			var obj = jQuery.parseJSON(data);

			$("#payid").html(obj[0].paymentid);
			$("#payorderid").html(obj[0].ORDERID);
			$("#paytranid").html(obj[0].TXNID);
			$("#payamount").html(obj[0].TXNAMOUNT);
			$("#paymode").html(obj[0].PAYMENTMODE);
			$("#paycurrency").html(obj[0].CURRENCY);
			$("#paydate").html(obj[0].TXNDATE);
			$("#paystatus").html(obj[0].STATUS);
			$("#payrespcode").html(obj[0].RESPCODE);
			$("#payrespmsg").html(obj[0].RESPMSG);
			$("#paygateway").html(obj[0].GATEWAYNAME);
			$("#paybanktranid").html(obj[0].BANKTXNID);
			$("#paybankname").html(obj[0].BANKNAME);
		}
	});

}


function popupOrderAddress(id) {
	$("#addid").empty();
	$("#addorderid").empty();
	$("#addfname").empty();
	$("#addlname").empty();
	$("#addhouse").empty();
	$("#addstreet").empty();
	$("#addcity").empty();
	$("#addzipcode").empty();
	$("#addstate").empty();
	$("#addcountry").empty();
	$("#addphone").empty();
	$("#addemail").empty();
	$.ajax({
		url: "api/get-order-address.php",
		method: "POST",
		data: { id: id },
		success: function (data) {
			var obj = jQuery.parseJSON(data);

			$("#addid").html(obj[0].id);
			$("#addorderid").html(obj[0].orderid);
			$("#addfname").html(obj[0].fristname);
			$("#addlname").html(obj[0].lastname);
			$("#addhouse").html(obj[0].houseno);
			$("#addstreet").html(obj[0].street);
			$("#addcity").html(obj[0].city);
			$("#addzipcode").html(obj[0].zipcode);
			$("#addstate").html(obj[0].state);
			$("#addcountry").html(obj[0].country);
			$("#addphone").html(obj[0].phone);
			$("#addemail").html(obj[0].email);
		}
	});
}





// -------------------------------------------------------------------------------------------
// Admin Store
// -------------------------------------------------------------------------------------------





function displayStores() {
	$.cookie("tab", 6, { expires: 30, secure: true });
	$(".nav-link").removeClass('active');
	$("#Map").addClass('active');
	$.ajax({
		url: "api/get-stores.php",
		method: "GET",
		cache: false,
		success: function (data) {
			var obj = jQuery.parseJSON(data);
			var html = "<table class='table table-striped table-bordered table-hover  w-100 ' border='1px' ><thead >\
			<tr> <th>Id</th> <th>Name</th> <th>Address</th> <th>City</th> <th>State</th> <th>Country</th> <th>lat</th> <th>lng</th> <th>Action</th> </tr></thead> ";
			$.each(obj, function (i) {

				html += '<tr>\
				<td> <span id="id'+ obj[i].id + '">' + obj[i].id + '</span> </td> \
				<td><span id="name'+ obj[i].id + '" ><div id="name-' + obj[i].id + '" onClick="storeedit(' + obj[i].id + ',' + "'name'" + ');" > ' + obj[i].name + ' </div></span></td>\
				<td><span id="address'+ obj[i].id + '" ><div id="address-' + obj[i].id + '" onClick="storeedit(' + obj[i].id + ',' + "'address'" + ');" > ' + obj[i].address + ' </div></span></td>\
				<td><span id="city'+ obj[i].id + '" ><div id="city-' + obj[i].id + '" onClick="storeedit(' + obj[i].id + ',' + "'city'" + '); " > ' + obj[i].City + ' </div></span></td>\
				<td><span id="state'+ obj[i].id + '" ><div id="state-' + obj[i].id + '" onClick="storeedit(' + obj[i].id + ',' + "'state'" + '); " > ' + obj[i].State + ' </div></span></td>\
				<td><span id="country'+ obj[i].id + '" ><div id="country-' + obj[i].id + '" onClick="storeedit(' + obj[i].id + ',' + "'country'" + '); " > ' + obj[i].Country + ' </div></span></td>\
				<td><span id="lat'+ obj[i].id + '" ><div id="lat-' + obj[i].id + '" onClick="storeedit(' + obj[i].id + ',' + "'lat'" + '); " > ' + obj[i].lat + ' </div></span></td>\
				<td><span id="lng'+ obj[i].id + '" ><div id="lng-' + obj[i].id + '" onClick="storeedit(' + obj[i].id + ',' + "'lng'" + '); " > ' + obj[i].lng + ' </div></span></td>\
				<td><button id="delete'+ obj[i].id + '" type="button" onClick="deleteStore(' + obj[i].id + '); " class="btn btn-danger" >Delete</button></td>\
				</tr>';
			});
			html += '<tr>\
			<form>\
				<td></td>\
				<td><input type="text" class="form-control" id="insname" required></td>\
				<td><textarea type="text" class="form-control" id="insaddress" required></textarea></td>\
				<td><input type="text" class="form-control" id="inscity" required></td>\
				<td><input type="text" class="form-control" id="insstate" required></td>\
				<td><input type="text" class="form-control" id="inscountry" required></td>\
				<td><input type="number" class="form-control" id="inslat" style="display: none;" value="NULL" ></td>\
				<td><input type="number" class="form-control" id="inslng" style="display: none;" value="NULL" ></td>\
				<td>\
					<input type="button" id="add" class="btn btn-primary" onClick="addStore()" value="Add" required><br><br>\
					<input type="checkbox" id="toggle" onClick="toggle();" checked > Automatic lat And lng fetch\
				</td>\
			</form></tr>\
		<tr>\
			<td colspan="8"></td>\
			<td >\
				<a type="button" id="gotomap" align="right" class="btn btn-primary" href="adminmap.php" target="_blank" >Admin Map</a>\
			</td>\
		</tr>';

			html += '</table>'
			$("#disp_data").html(html);
		}
	});
}

function addStore() {

	if ($("#insname").val() == '' && $("#insaddress").val() == '') { alert('please enter value'); } else {

		data = {
			name: $("#insname").val(),
			address: $("#insaddress").val(),
			city: $("#inscity").val(),
			state: $("#insstate").val(),
			country: $("#inscountry").val(),
			lat: $("#inslat").val(),
			lng: $("#inslng").val()
		}


		$.post("api/add-store.php", data, function () {
			setTimeout(function () {
				var temp = confirm('do you want to check map view? ');
				if (temp) {
					window.open("adminmap.php", '_blank');
				}
			}, 500);
		});


	}
}


function storeedit(id, column) {
	var html = "<input type='text' id='" + "txt" + column + id + "' value='" + $("#" + column.toString() + "-" + id).html().trim() + "' class='form-control'";
	"updateStore(38,'city')"
	html += 'Onblur="updateStore(' + id + ",'" + column.toString() + "')\">"
	console.warn(html);
	$("#" + column + id).html(html);
}

function updateStore(id, column) {
	var data = { id: id, data: $("#txt" + column + id).val(), column: column };

	$.post("api/update-store.php", data, function () {
		$("#" + column + id).html("<div id='" + column + "-" + id + "' onClick=\"storeedit('" + id + "','" + column + "');\">" + data.data + "</div>");
	});
}


function deleteStore(id) {
	var response = confirm("Are you sure to delete Store?");
	if (response == true) {
		$.get("api/delete-store.php?id=" + id, function (data) {
			$($("#delete" + id).closest("tr")).remove();
		});
	}
}

function zoom() {
	alert('set zoom level under 80%');
	document.body.style.zoom = "80%";
}



function remembered() {
	switch ($.cookie("tab")) {
		case '1':
			displayProductScreen();
			break;
		case '2':
			displayInquiryScreen();
			break;
		case '3':
			displayUsers();
			break;
		case '4':
			displayBlogs();
			break;
		case '5':
			displayOrders();
			break;
		case '6':
			displayStores();
			break;
		case '7':
			displayStockScreen();
			break;
	}
	// alert($.cookie("tab"));
}


function clearCookie() {
	$.cookie("tab", null);
}






