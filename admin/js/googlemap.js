var map;
var geocoder;

function LoadMap() {
  var myLatLng = { lat: 20.593683, lng: 78.962883 };

  // Create a map object and specify the DOM element
  // for display.
  map = new google.maps.Map(document.getElementById('map'), {
    center: myLatLng,
    zoom: 6
  });

  // Create a marker and set its position.

  var jsondata = JSON.parse(document.getElementById('fetcheddata').innerHTML);
  geocoder = new google.maps.Geocoder();
  codeAddress(jsondata);

  var alldata = JSON.parse(document.getElementById('allfetcheddata').innerHTML);
  ShowAllStore(alldata);

}

function ShowAllStore(alldata) {
  Array.prototype.forEach.call(alldata, function (data) {
    var marker = new google.maps.Marker({
      map: map,
      position: new google.maps.LatLng(data.lat, data.lng),
      title: data.name
    });
  });
}

function codeAddress(jsondata) {
  Array.prototype.forEach.call(jsondata, function (data) {
    var address = data.name + ' ' + data.address + ' ' + data.City + ' ' + data.State + ' ' + data.Country;
    geocoder.geocode({ 'address': address }, function (results, status) {
      if (status == 'OK') {
        map.setCenter(results[0].geometry.location);
        var points = {};
        points.id = data.id;
        points.lat = map.getCenter().lat();
        points.lng = map.getCenter().lng();
        updatedata(points);
        //var marker = new google.maps.Marker({
        //  map: map,
        //position: results[0].geometry.location
        // });
      } else {
        alert('Geocode was not successful for the following reason: ' + status);
      }
    });
  });
}
function updatedata(points) {
  $.post("api/insert-latlng.php", { points: points }, function (data) {
    console.log(data);
    location.reload();
  });

}

