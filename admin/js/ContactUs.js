function AddContactUs(){
	event.preventDefault();

				// Get form
				var form = $('#admincontact')[0];

				// Create an FormData object 
				var data = new FormData(form);




				$.ajax({
					type: "POST",
					enctype: 'multipart/form-data',
					url: "php/AdminChangeContactUs.php",
					data: data,
					processData: false,
					contentType: false,
					cache: false,
					timeout: 600000,
					success: function (data) {
					   alert('Changed successfully');
					   disp_data('php/AdminChangeContactUS.php?status=disp');


					},
					error: function (e) {

						alert('Failed !!');
					disp_data('php/AdminChangeContactUS.php?status=disp');
					}
				});
}