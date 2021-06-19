<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Premier Ceramic</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100">
    <!-- owl carousel-->
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
	
</head>
<body onLoad="zoom();">
    <!-- navbar-->
    <?php 
    require('header.php')
     ?>
	
	
	
	
	
	 <div id="photo-update" tabindex="-1" role="dialog" aria-labelledby="upload" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">image preview</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" >x</span></button>
              </div>
              <div class="modal-body">
				  <script type="text/javascript">
						function up(){
							
							
							var form = $('#photoupdate')[0];
							//document.getElementById('')
							// Create an FormData object 
							var data = new FormData(form);
							var f = document.getElementsByName('imagepath').value;
							data.append('path',f);
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

										alert(document.getElementsByName('imagepath').value);
									   disp_data();
									  
									},
									error: function (e) {


									   alert('something want wrong!!!');
									
									}
								});
							
						}
					</script>
				  					

				 <img id='productimage' name="productimage" src='' height='70%' width='70%'>        
                <form method="POST" id="photoupdate" enctype="multipart/form-data">
					<input type="file" name="uploadimage" id="uploadimage" >
				    <a class='btn btn-primary' onClick="up();">upload</a>
				 </form>
				  
				  
              </div>
            </div>
          </div>
        </div>
    
	
	
	
	
	
	
	
    <div >
        <div >
            <div class="" style="width:100% , left-margin:10px !important, right-margin:10px !important">
                <div class="row">
                    
                    <div class="col-lg-6 col-xl-12">
                        <div class="box" >
                         <div class="form-group">
						   <div class="row">
								
						  
						<form method="POST" enctype="multipart/form-data" id="fileUploadForm" class="form-control">
							<div id="disp_data"></div>
								
							<div><input type="text" class="form-group" name="name" id="txtnameins" placeholder="name">
							<input type="text" class="form-group" name="color" id="txtcityins1" placeholder="color">
							<select class="form-control-sm" name="type" id="txtcityins2" placeholder="type">
								  <option value="">Type</option>
								  <option value="Double Charge">Double Charge</option>
								  <option value="Digital Tiles">Digital Tiles</option>
								  <option value="GVT">GVT</option>
								  <option value="PGVT">PGVT</option>
							</select>
							<select class="form-control-sm" name="usage" placeholder="usage" id="txtcityins3">
								  <option value="">Usage</option>
								  <option value="Wall Tiles">Wall Tiles</option>
								  <option value="Floor Tiles">Floor Tiles</option>
								  <option value="Parking Tiles">Parking Tiles</option>
								  <option value="Alivation Tiles">Alivation Tiles</option>
								  <option value="Kitchen Tiles">Kitchen Tiles</option>
							</select>
							<input type="number" class="form-group" name="stock" id="txtcityins4" placeholder="stock">
							<input type="number" class="form-group" name="price" id="txtcityins5" placeholder="price">
							<input type="number" class="form-group" name="pieceinbox" id="txtcityins6" placeholder="pieceinbox">
							<input type="number" class="form-group" name="weight" id="txtcityins7" placeholder="weight">

							<select class="form-control-sm" name="thickness" id="txtcityins8" placeholder="thickness" style="width:100px">
								  <option value="">Thickness</option>
								  <option value="8mm">8mm</option>
								  <option value="10mm">10mm</option>
								  <option value="12mm">12mm</option>
							</select>
							<select class="form-control-sm" name="size" id="txtcityins9" placeholder="size">
								  <option value="">Size</option>
								  <option value="600x600(2x2)">600x600(2x2)</option>
								  <option value="300x300(1x1)">300x300(1x1)</option>
								  <option value="800x1200(2x4)">800x1200(2x4)</option>
								  <option value="18x12">18x12</option>
								  <option value="24x12">24x12</option>
							</select>
							<input type="file" class="" name="imgfile" id="">
							<input type="button" name="upload"  class="btn btn-primary" id="upload" value="insert" onClick="ins();">
</form>	
							
	 </div>
						</div>						
							
                
                        </div>
                    </div>
			</div>
            </div>
        </div>
    </div>
	<script type="text/javascript">
//zoom();
disp_data();

function zoom() {
			alert('set zoom level under 80%');
            document.body.style.zoom = "80%";
        }
function disp_data()
{
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.open("GET","php/product.php?status=disp",false);
  xmlhttp.send(null);
  document.getElementById("disp_data").innerHTML=xmlhttp.responseText;

}


function aa(a)
{
nameid="name"+a;
txtnameid="txtname"+a;
var name=document.getElementById(nameid).innerHTML;
document.getElementById(nameid).innerHTML="<input type='text' style='width:80px;' value='"+name+"' id='"+txtnameid+"'>";
console.log(name);
	
colorid="color"+a;
txtcolorid="txtcolor"+a;
var color=document.getElementById(colorid).innerHTML;
document.getElementById(colorid).innerHTML="<input type='text' style='width:80px;' value='"+color+"' id='"+txtcolorid+"'>";
	
typeid="type"+a;
txttypeid="txttype"+a;
var type=document.getElementById(typeid).innerHTML;

if(type==' Digital Tiles '){
	document.getElementById(typeid).innerHTML="<select style='width:100px;' class='form-control' id='"+txttypeid+"' placeholder='type'><option value=''></option><option value='Double Charge'>Double Charge</option><option value='Digital Tiles' selected>Digital Tiles</option><option value='GVT'>GVT</option><option value='PGVT'>PGVT</option></select>"
}else if(type==' Double Charge '){
	document.getElementById(typeid).innerHTML="<select style='width:100px;' class='form-control' id='"+txttypeid+"' placeholder='type'><option value=''></option><option value='Double Charge' selected>Double Charge</option><option value='Digital Tiles' >Digital Tiles</option><option value='GVT'>GVT</option><option value='PGVT'>PGVT</option></select>"
}else if(type==' GVT '){
	document.getElementById(typeid).innerHTML="<select style='width:100px;' class='form-control' id='"+txttypeid+"' placeholder='type'><option value=''></option><option value='Double Charge'>Double Charge</option><option value='Digital Tiles' >Digital Tiles</option><option value='GVT' selected>GVT</option><option value='PGVT'>PGVT</option></select>"
}else if(type ==' PGVT '){
	document.getElementById(typeid).innerHTML="<select style='width:100px;' class='form-control' id='"+txttypeid+"' placeholder='type'><option value=''></option><option value='Double Charge'>Double Charge</option><option value='Digital Tiles' >Digital Tiles</option><option value='GVT'>GVT</option><option value='PGVT' selectd>PGVT</option></select>"
}
	
	

usageid="usage"+a;
txtusageid="txtusage"+a;
var usage=document.getElementById(usageid).innerHTML;
	if(usage==' Wall Tiles '){
		document.getElementById(usageid).innerHTML="<select style='width:100px;' class='form-control' placeholder='usage' id='"+txtusageid+"'><option value=''>Usage</option><option value='Wall Tiles' selected>Wall Tiles</option><option value='Floor Tiles'>Floor Tiles</option><option value='Parking Tiles'>Parking Tiles</option><option value='Alivation Tiles'>Alivation Tiles</option><option value='Kitchen Tiles'>Kitchen Tiles</option></select>";
	}
	else if(usage==' Floor Tiles '){
		document.getElementById(usageid).innerHTML="<select style='width:100px;' class='form-control' placeholder='usage' id='"+txtusageid+"'><option value=''>Usage</option><option value='Wall Tiles'>Wall Tiles</option><option value='Floor Tiles' selected>Floor Tiles</option><option value='Parking Tiles'>Parking Tiles</option><option value='Alivation Tiles'>Alivation Tiles</option><option value='Kitchen Tiles'>Kitchen Tiles</option></select>";
	}else if(usage==' Parking Tiles '){
		document.getElementById(usageid).innerHTML="<select style='width:100px;' class='form-control' placeholder='usage' id='"+txtusageid+"'><option value=''>Usage</option><option value='Wall Tiles'>Wall Tiles</option><option value='Floor Tiles'>Floor Tiles</option><option value='Parking Tiles' selected>Parking Tiles</option><option value='Alivation Tiles'>Alivation Tiles</option><option value='Kitchen Tiles'>Kitchen Tiles</option></select>";
	}else if(usage==' Alivation Tiles '){
		document.getElementById(usageid).innerHTML="<select style='width:100px;' class='form-control' placeholder='usage' id='"+txtusageid+"'><option value=''>Usage</option><option value='Wall Tiles'>Wall Tiles</option><option value='Floor Tiles'>Floor Tiles</option><option value='Parking Tiles'>Parking Tiles</option><option value='Alivation Tiles' selected>Alivation Tiles</option><option value='Kitchen Tiles'>Kitchen Tiles</option></select>";
	}else if(usage==' Kitchen Tiles '){
		document.getElementById(usageid).innerHTML="<select style='width:100px;' class='form-control' placeholder='usage' id='"+txtusageid+"'><option value=''>Usage</option><option value='Wall Tiles'>Wall Tiles</option><option value='Floor Tiles'>Floor Tiles</option><option value='Parking Tiles'>Parking Tiles</option><option value='Alivation Tiles'>Alivation Tiles</option><option value='Kitchen Tiles' selected>Kitchen Tiles</option></select>";
	} 
	//document.getElementById(usageid).innerHTML="<input style='width:60px;' type='text' value='"+usage+"' id='"+txtstockid+"'>";

	
	

	
	
	
stockid="stock"+a;
txtstockid="txtstock"+a;
var stock=document.getElementById(stockid).innerHTML;
document.getElementById(stockid).innerHTML="<input style='width:60px;' type='text' value='"+stock+"' id='"+txtstockid+"'>";

priceid="price"+a;
txtpriceid="txtprice"+a;
var price=document.getElementById(priceid).innerHTML;
document.getElementById(priceid).innerHTML="<input style='width:60px;' type='text' value='"+price+"' id='"+txtpriceid+"'>";
	
pieceinboxid="pieceinbox"+a;
txtpieceinboxid="txtpieceinbox"+a;
var pieceinbox=document.getElementById(pieceinboxid).innerHTML;
document.getElementById(pieceinboxid).innerHTML="<input style='width:60px;' type='text' value='"+pieceinbox+"' id='"+txtpieceinboxid+"'>";

weightid="weight"+a;
txtweightid="txtweight"+a;
var weight=document.getElementById(weightid).innerHTML;
document.getElementById(weightid).innerHTML="<input style='width:60px;' type='text' value='"+weight+"' id='"+txtweightid+"'>";

	
	
	
thicknessid="thickness"+a;
txtthicknessid="txtthickness"+a;
var thickness=document.getElementById(thicknessid).innerHTML;
	if(thickness==' 8mm '){
		document.getElementById(thicknessid).innerHTML="<select style='width:80px;' class='form-control' id='"+txtthicknessid+"' placeholder='thickness'><option value=''>Thickness</option><option value='8mm' selected>8mm</option><option value='10mm'>10mm</option><option value='12mm'>12mm</option></select>";
	}else if(thickness==' 10mm '){
		document.getElementById(thicknessid).innerHTML="<select style='width:80px;' class='form-control' id='"+txtthicknessid+"' placeholder='thickness'><option value=''>Thickness</option><option value='8mm'>8mm</option><option value='10mm' selected>10mm</option><option value='12mm'>12mm</option></select>";
	}else if(thickness==' 12mm '){
		document.getElementById(thicknessid).innerHTML="<select style='width:80px;' class='form-control' id='"+txtthicknessid+"' placeholder='thickness'><option value=''>Thickness</option><option value='8mm'>8mm</option><option value='10mm'>10mm</option><option value='12mm' selected>12mm</option></select>";
	}
	
	//"<input type='text' value='"+thickness+"' id='"+txtthicknessid+"'>";

sizeid="size"+a;
txtsizeid="txtsize"+a;
var size=document.getElementById(sizeid).innerHTML;

	if(size==' 600x600(2x2) '){
		document.getElementById(sizeid).innerHTML="<select style='width:100px;' class='form-control' id='"+txtsizeid+"' placeholder='size'><option value=''>Size</option><option value='600x600(2x2)' selected>600x600(2x2)</option><option value='300x300(1x1)'>300x300(1x1)</option><option value='800x1200(2x4)'>800x1200(2x4)</option><option value='18x12'>18x12</option><option value='24x12'>24x12</option></select>";
	}else if(size==' 300x300(1x1) '){
		document.getElementById(sizeid).innerHTML="<select style='width:100px;' class='form-control' id='"+txtsizeid+"' placeholder='size'><option value=''>Size</option><option value='600x600(2x2)'>600x600(2x2)</option><option value='300x300(1x1)' selected>300x300(1x1)</option><option value='800x1200(2x4)'>800x1200(2x4)</option><option value='18x12'>18x12</option><option value='24x12'>24x12</option></select>";
	}else if(size==' 800x1200(2x4) '){
		document.getElementById(sizeid).innerHTML="<select style='width:100px;' class='form-control' id='"+txtsizeid+"' placeholder='size'><option value=''>Size</option><option value='600x600(2x2)'>600x600(2x2)</option><option value='300x300(1x1)'>300x300(1x1)</option><option value='800x1200(2x4)' selected>800x1200(2x4)</option><option value='18x12'>18x12</option><option value='24x12'>24x12</option></select>";
	}else if(size==' 18x12 '){
		document.getElementById(sizeid).innerHTML="<select style='width:100px;' class='form-control' id='"+txtsizeid+"' placeholder='size'><option value=''>Size</option><option value='600x600(2x2)'>600x600(2x2)</option><option value='300x300(1x1)'>300x300(1x1)</option><option value='800x1200(2x4)'>800x1200(2x4)</option><option value='18x12' selected>18x12</option><option value='24x12'>24x12</option></select>";
	}else if(size==' 24x12 '){
		document.getElementById(sizeid).innerHTML="<select style='width:100px;' class='form-control' id='"+txtsizeid+"' placeholder='size'><option value=''>Size</option><option value='600x600(2x2)'>600x600(2x2)</option><option value='300x300(1x1)'>300x300(1x1)</option><option value='800x1200(2x4)'>800x1200(2x4)</option><option value='18x12'>18x12</option><option value='24x12' selected>24x12</option></select>";
	}
	
	
	//"<input type='text' value='"+size+"' id='"+txtsizeid+"'>";

productimgid="productimg"+a;
txtproductimgid="txtproductimg"+a;
var productimg=document.getElementById(productimgid).innerHTML;
//document.getElementById(productimgid).innerHTML="<input style='width:100px;' type='button' value='"+productimg+"' id='"+txtproductimgid+"'>";
document.getElementById('productimage').src=productimg;
document.getElementById(productimgid).innerHTML="<a class='btn btn-primary' href='' data-toggle='modal' data-target='#photo-update'>Upload</a>";
document.getElementsByName('imagepath').value = productimg;
	
	
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
	disp_data();
  });
}

function delete1(id)
{
var xmlhttp=new XMLHttpRequest();
  xmlhttp.open("GET","php/product.php?id="+id+"&status=delete",false);
  xmlhttp.send(null);
  disp_data();
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
               disp_data();
               

            },
            error: function (e) {

               
               alert('product not added successfully');
			disp_data();
            }
        });


	

	}
</script>
    <!--
    *** FOOTER ***
    _________________________________________________________
    -->
    <!-- *** COPYRIGHT END ***-->
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"></script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="js/front.js"></script>
</body>
</html>