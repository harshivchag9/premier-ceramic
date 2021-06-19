/*  

	-------** Blog Curd operation javascript **------

	blogup()       -->    for edit operation
	blogdata()     -->    send data to popup
	blogdelete()   -->    this is for delete operation
	blogadd()      -->    insert new blog 
*/


				
/*----------------------------blogup()--------------------------------------*/

							function blogup(){

							var form = $('#blogupdate')[0];
							//document.getElementById('')
							// Create an FormData object 
							var data = new FormData(form);
							//var f = document.getElementsByName('imagepath').value;
							//data.append('path',f);
							 $.ajax({
									type: "POST",
									enctype: 'multipart/form-data',
									url: "php/adminaddblog.php?status=update",
									data: data,
									processData: false,
									contentType: false,
									cache: false,
									timeout: 600000,
									success: function (data) {

										document.getElementById('error').innerHTML=data;

									    disp_data('php/adminaddblog.php?status=disp');
									  
									},
									error: function (e) {

										
									   alert('something want wrong!!!');
									   disp_data('php/adminaddblog.php?status=disp');
									}
								});
							
						}
/*----------------------------------blogdata()--------------------------------------------------*/					

				function blogdata(a)
				{
					blogtitle="title-"+a;
					blogdescription="description-"+a;
					blogimgid="img-"+a;
						var title=document.getElementById(blogtitle).innerHTML;
						var blogimg=document.getElementById(blogimgid).src;
						var description=document.getElementById(blogdescription).innerHTML;
						document.getElementById('blogimage').src=blogimg.trim();
						document.getElementById('blogpath').value = blogimg.trim();
						document.getElementById('blogedittitle').value=title.trim();
						document.getElementById('blogdescription').value=description.trim();
						document.getElementById('blogid').value=a;
						document.getElementById('blogpath').value = '../../'+blogimg.substring(25);

				}


/*----------------------------blogdata()------------------------------------*/

					 function blogdelete(a){
						 $.post("php/adminaddblog.php?status=delete",{id:a},function(data){
							 disp_data('php/adminaddblog.php?status=disp');
						
						 });
					 }



/*---------------------------blogadd()--------------------------------------*/


					function blogadd(){
					
						var form = $('#insertblog')[0];
							var data = new FormData(form);
							 $.ajax({
									type: "POST",
									enctype: 'multipart/form-data',
									url: "php/adminaddblog.php?status=ins",
									data: data,
									processData: false,
									contentType: false,
									cache: false,
									timeout: 600000,
									success: function (data) {

									    disp_data('php/adminaddblog.php?status=disp');
										document.getElementById('error').innerHTML=data;
									},
									error: function (e) {

									   alert('something want wrong!!!');
									   disp_data('php/adminaddblog.php?status=disp');

									}
								});	
							
					}

