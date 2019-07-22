window.onload = function(){

  initMap(55.926282, -3.289526);
}

function initMap(mlat, mlng){

var styledMapType = new google.maps.StyledMapType(
[{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType": "administrative.country","elementType": "geometry.stroke","stylers": [{"color": "#808080"}]},{"featureType": "administrative.country", "elementType": "labels.text.fill", "stylers": [{"color": "#397dc6"}]},{"featureType": "administrative.locality","elementType": "labels.text.fill","stylers": [{"color": "#3981c6"}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":35}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":10}]}],
 {name: 'Styled Map'}
 );

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 11,
    center: {lat: mlat, lng: mlng},
  backgroundColor: '#141414',
  scrollwheel: false,
  gestureHandling: 'cooperative',
  disableDefaultUI: true
});

 	map.mapTypes.set('styled_map', styledMapType);
    map.setMapTypeId('styled_map');

  var marker = new google.maps.Marker({
    position: {lat: mlat, lng: mlng},
    map: map,
    icon: 'img/marker.png'
  });

}