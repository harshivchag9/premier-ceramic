function recentviewadd(a){
	$.post('php/recentview.php',{id:a},function(){
		
	});
	
	
}
function filter_data()
		{
			
			//$('.filter_data').html('<div id="loading" style="" ></div>');
			var action = 'fetch_data';
			var maximum_price = $('#max_price').val();
			var minimum_price = $('#min_price').val();
			var color = get_filter('color');
			var type = get_filter('type');
			var thickness = get_filter('thickness');
			var size = get_filter('size');
			
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.open("GET","fetch_data.php?minimum_price="+minimum_price+"&maximum_price="+maximum_price+"&color="+color+"&type="+type+"&thickness="+thickness+"&size="+size+"&action=fetch_data",false);
			xmlhttp.send(null);
			document.getElementById("disp_data").innerHTML=xmlhttp.responseText;

			
			//$.ajax({
		//		url:"fetch_data.php",
		//		method:"POST",
		//		data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, color:color, type:type, thickness:thickness, size:size},
		//		success:function(data){
		//			$('.filter_data').html(data);
		//		}
		//	});
		}
 function clear_filter(name){
		  $('input[name='+name+']').each(function(index, el) { $(el).prop('checked', false); return false; });
			filter_data();
		}
		
		$('.common_selector').click(function(){
        filter_data();
    	});
		  
		$('priceapply').click(function(){
			filter_data();
		});
		function get_filter(class_name)
		{
			var filter = [];
			$('.'+class_name+':checked').each(function(){
				filter.push($(this).val());
			});
			return filter;
		}
	
	  $(document).ready(function(){
		  filter_data();

		  
   });

	  
	