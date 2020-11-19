import $ from "jquery";

export default class GMap {
  constructor(){
    let self = this;
    $('.acf-map').each(function(){
      self.new_map($(this));
    });
  }

  new_map($el){

    let $markers = $el.find('.marker');

    let args = {
      zoom: 16,
      center: new google.maps.LatLng(0, 0),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    let map = new google.maps.Map($el[0], args);

    map.markers = [];

    let that = this;

    $markers.each(function(){
      that.add_marker($(this), map);
    });

    this.center.map(map);

  }

  add_marker($marker, map){

    //osäker på denna
    let latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));

    let marker = new google.maps.Marker({
      position: latlng,
      map: map
    });

    map.markers.push(marker);

    if($marker.html()){
      let infoWindow = new google.maps.InfoWindow({
        content: $marker.html()
      });

      google.maps.event.addListener(marker, 'click', function(){
        infoWindow.open(map, marker);
      });
    }
  }
}