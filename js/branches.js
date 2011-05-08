$(document).ready(function() {
	$('a.branch-link').each(function() {
		$(this).click(function(event) {
			$('div.branch').addClass('branch-disabled');
			$('div.branch').removeClass('branch-active');
			$(this).parent().removeClass('branch-disabled');
			$(this).parent().addClass('branch-active');
			
			$('div.company').hide(600);
			
			if($(this).parent().parent().find('div.company').length > 0) {
				$(this).parent().parent().find('div.company:eq(0)').show('fast', function () {
					$(this).next('div').show('fast', arguments.callee);
				});
			} else {
				$.ajax({
					url: $(this).attr('href'),
					context: $(this),
					success: function(data) {
						$(this).parent().parent().find('div.companies').append(data);
						$(this).parent().parent().find('div.company:eq(0)').show('fast', function () {
							$(this).next('div').show('fast', arguments.callee);
						});
						
						$('a.company-link').each(function() {
							$(this).click(function(event) {
								$.ajax({
									url: $(this).attr('href'),
									context: $(this),
									dataType: 'json',
									success: function(data) {
										showModalWindow(data);
									}
								});
								event.preventDefault();
							});
						});
					}
				});
			}
			
			event.preventDefault();
		});
	});
	
	$('#modal-window-close').click(function() {
		$('#modal-window').hide();
		$('#modal-window-content').hide();
	});
});

function showModalWindow(data) {
	$('#modal-window-content .content').html(data.content);
	
	if(data.company.lat != 0 && data.company.lon != 0) {
		var latlng = new google.maps.LatLng(data.company.lat, data.company.lon);
		var myOptions = {
				zoom: 14,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
		};
	    map = new google.maps.Map(document.getElementById('map'), myOptions);
	    
		marker = new google.maps.Marker({
			map: map,
			position: latlng
		});
	}
	
	$('#modal-window').show();
	$('#modal-window-content').show();
}