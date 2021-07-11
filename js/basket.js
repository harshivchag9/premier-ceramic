
function remove(id) {
	$.post('api/removecartitem.php', { id: id }, function (data) {
		$('#product-' + id).remove();

		var at = document.getElementById("alltotal").innerHTML;
		console.log(at);
		var ti = document.getElementById('total-' + id).innerHTML;
		console.log(ti);
		Math.abs(at) + Number(ti);
		document.getElementById("alltotal").innerHTML = "&#8377;" + Math.abs(at) + Number(ti);
		alert('product removed from cart');
	});
}
function f1(cartid) {
	var price = document.getElementById("price-" + cartid).value;
	var q = document.getElementById("quantity-" + cartid).value;
	var t = Number(price) * Number(q);
	console.log(price);
	document.getElementById('total-' + cartid).innerHTML = Number(t);

	t1();
	cartdbupdate(cartid, q);
}
function t1() {
	var t = 0, i = 0, v = 0;
	var tc = document.getElementById('tcount').value;

	for (i = 1; i <= tc; i++) {
		var v = document.getElementById("price-" + i).innerHTML;
		var q1 = document.getElementsByName('quantity1-' + i)[0].value;
		t = Number(t) + (Number(v) * Number(q1));
	}
	document.getElementById("alltotal").innerHTML = "&#8377;" + Number(t);
}
function cartdbupdate(cart_id, quantity) {

	$.post('php/cartquantity.php', { cart_id: cart_id, quantity: quantity }, function (data) {
		//alert('product added to cart')
	});
}
function f2(t) {
	document.getElementById('alltotal').innerHTML = Number(t);
}

function click_cart(id) {

	var productid = $('#productid').val();
	$.ajax({
		url: "api/add-to-cart.php",
		method: "POST",
		data: { id: id },
		success: function (data) {
			var obj = jQuery.parseJSON(data);
			switch (obj.responseNumber) {
				case 200:
					alert(obj.responseMessage);
					$('#addcart-' + id).addClass("btn btn-primary disabled")
					$('#addcart-' + id).prop("onclick", null);
					break;
				case 404:
					alert(obj.responseMessage);
					break;
				case 505:
					alert(obj.responseMessage);
					$('#addcart-' + id).addClass("btn btn-primary disabled")
					$('#addcart-' + id).prop("onclick", null);
					break;
				default:
					alert("Something Went Wrong. Please Try After Sometime.");
					break;
			}
		}
	});
}
