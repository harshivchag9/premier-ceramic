
var flat = 20.5937;
var flng = 78.9629;
var name;
var myLatLng;
var map;
var zoom = 6;

function fetchstore() {
	var name = document.getElementById('name').value;
	var city = document.getElementById('city').value;
	var state = document.getElementById('state').value;
	var country = document.getElementById('country').value;

	var obj = { "name": name, "city": city, state: state, country: country, status: "fetch" };
	var dbParam = JSON.stringify(obj);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST", "api/storeselect.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("x=" + dbParam);

	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var myObj = JSON.parse(this.responseText);
			flat = Number(myObj['lat']);
			flng = Number(myObj['lng']);
			console.log(flat)
			name = myObj['name'];
			zoom = 20;
			LoadMap();
			createmarker();
		}
	};
}

function LoadMap() {
	myLatLng = { lat: flat, lng: flng };

	// Create a map object and specify the DOM element
	// for display.
	map = new google.maps.Map(document.getElementById('map'), {
		center: myLatLng,
		zoom: zoom
	});

	// Create a marker and set its position.

}
function createmarker() {
	var marker = new google.maps.Marker({
		map: map,
		position: myLatLng,
		title: name
	});

}

function Change_Country() {

	var country = document.getElementById('country').value;
	var obj = { "country": country, "status": "country" };
	var dbParam = JSON.stringify(obj);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST", "api/storeselect.php", false);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("x=" + dbParam);
	document.getElementById("divstate").innerHTML = xmlhttp.responseText;
}
function Change_State() {

	var state = document.getElementById('state').value;
	var obj = { "State": state, "status": "state" };
	var dbParam = JSON.stringify(obj);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST", "api/storeselect.php", false);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("x=" + dbParam);
	document.getElementById("divcity").innerHTML = xmlhttp.responseText;
}
function Change_City() {

	var city = document.getElementById('city').value;
	var obj = { "City": city, "status": "city" };
	var dbParam = JSON.stringify(obj);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST", "api/storeselect.php", false);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("x=" + dbParam);
	document.getElementById("divname").innerHTML = xmlhttp.responseText;
}
function Change_Name() {


	var obj = { "status": "name" };
	var dbParam = JSON.stringify(obj);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST", "api/storeselect.php", false);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("x=" + dbParam);
	document.getElementById("divbtn").innerHTML = xmlhttp.responseText;
}

function NotSelected() {
	alert('Please Select Store');
}






