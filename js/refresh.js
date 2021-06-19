 function click_cart(id){

 	var productid = $('#productid').val();  
	$.post('php/cart.php' , { id:id } , function(data){
		jQuery('#addcart-'+id).addClass("btn btn-primary disabled");
		$('#addcart-'+id).prop("onclick", null);
		alert('Item Added To Cart');
	//$('#form')[0].reset();
	
})
}


