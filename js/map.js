$(document).ready(function() {
	$('a.js').each(function() {
		$(this).click(function(event) {
			event.preventDefault();
		});
	});
	
	$('a#map-link').click(function() {
		$.ajax({
			url: base + $(this).attr('href'),
			context: $(this),
			dataType: 'json',
			success: function(data) {
				$('#modal-window-content .content').html(data.content);
					var latlng = new google.maps.LatLng(51.361492, 12.380219);
					var myOptions = {
							zoom: 12,
							center: latlng,
							mapTypeId: google.maps.MapTypeId.ROADMAP
					};
				    map = new google.maps.Map(document.getElementById('map'), myOptions);
				    
				    var infowindow = new google.maps.InfoWindow();
				    var marker, i;
				    
				    for(i = 0; i < data.companies.length; i++) {
				    	if(data.companies[i].lat != 0 && data.companies[0].lon != 0) {
				    		marker = new google.maps.Marker({
								map: map,
								position: new google.maps.LatLng(data.companies[i].lat, data.companies[i].lon)
							});
				    		
			    			google.maps.event.addListener(marker, 'click', (function(marker, i) {
			    				return function() {
			    					infowindow.setContent('<p><b>' + data.companies[i].name + '</b></p>' +
			    							data.companies[i].street + ' ' + data.companies[i].housenumber + '<br/>' + 
			    							data.companies[i].zip + ' ' + data.companies[i].city + '<br/>');
			    					infowindow.open(map, marker);
			    				}
			    			})(marker, i));
				
			    			$('#modal-window').show();
			    			$('#modal-window-content').show();
				    	}
				    }
			}
		});
	});
});
