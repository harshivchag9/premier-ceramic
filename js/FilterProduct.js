function recentviewadd(a) {
	$.post('php/recentview.php', { id: a }, function () { });
}
function filter_data() {

	$('#disp_data').html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
	var maximum_price = $('#max_price').val();
	var minimum_price = $('#min_price').val();
	var color = get_filter('color');
	var type = get_filter('type');
	var thickness = get_filter('thickness');
	var size = get_filter('size');

	$.ajax({
		url: "api/fetch_data.php?minimum_price=" + minimum_price + "&maximum_price=" + maximum_price + "&color=" + color + "&type=" + type + "&thickness=" + thickness + "&size=" + size + "&action=fetch_data",
		method: "GET",
		cache: false,
		success: function (data) {
			var obj = jQuery.parseJSON(data);

			$.each(obj, function (i) {
				var img = (obj[i].productimg.hasOwnProperty('0')) ? obj[i].productimg[0][2] : "";

				var cartButton = (!obj[i].hasOwnProperty('cart')) ? "<a id='addcart' onClick='notlogged()' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add to cart</a>" : (obj[i].cart == true) ? '<a id="addcart-' + obj[i].product_id + '" onClick="click_cart(' + obj[i].product_id + ')" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a>' : "<a id='addcartdisabled' class='btn btn-primary disabled'><i class='fa fa-shopping-cart'></i>Add to cart</a>";
				$('#disp_data').append(

					'<div style="min-width:100px;min-height:120px;" class="col-lg-3 col-md-4">\
				<div class="product">\
					<div class="flip-container">\
						<div class="flipper">\
							<div class="front">\
								<a href="detail.php?id='+ obj[i].product_id + '">\
									<img src="'+ img + '" alt="" class="img-fluid">\
								</a>\
							</div>\
							<div class="back">\
								<a href="detail.php?id='+ obj[i].product_id + '">\
									<img src="'+ img + '" alt="" class="img-fluid">\
								</a>\
							</div>\
						</div>\
					</div>\
					<a href="detail.php?id='+ obj[i].product_id + '">\
						<img src="'+ img + '" alt="" class="img-fluid">\
					</a>\
					<div class="text">\
						<h3>\
							<a href=" detail.php?id='+ obj[i].product_id + ' ">' + obj[i].product_name + '</a>\
						</h3>\
						<p class="price">'+ obj[i].price + '</p>\
						<p class="buttons">\
							<a href=" detail.php?id='+ obj[i].product_id + ' " class="btn btn-outline-secondary" onclick="recentviewadd(' + obj[i].product_id + ')">View detail</a>\
							'+ cartButton + '\
						</p>\
					</div>\
				</div>\
				</div>');
			});
		}
	});
}
function clear_filter(name) {
	$('input[name=' + name + ']').each(function (index, el) { $(el).prop('checked', false); return false; });
	filter_data();
}

$('.common_selector').click(function () {
	filter_data();
});

$('priceapply').click(function () {
	filter_data();
});
function get_filter(class_name) {
	var filter = [];
	$('.' + class_name + ':checked').each(function () {
		filter.push($(this).val());
	});
	return filter;
}

$(document).ready(function () {
	filter_data();


});


