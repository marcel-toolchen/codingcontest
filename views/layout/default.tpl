<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Mediahandbook Leipzig</title>
		<script type="text/javascript">
			var base = "<?php print $this->base; ?>";
		</script>
		<script type="text/javascript" src="<?php print $this->base; ?>js/jquery.js"></script>
		<script type="text/javascript" src="<?php print $this->base; ?>js/branches.js"></script>
		<script type="text/javascript" src="<?php print $this->base; ?>js/updater.js"></script>
		<script type="text/javascript" src="<?php print $this->base; ?>js/map.js"></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<link rel="stylesheet" type="text/css" href="<?php print $this->base; ?>css/style.css">
	</head>
	<body>
		<div id="header">
			<a href="<?php print $this->base; ?>"><div id="logo"></div></a>
			<div id="menu">
				<ul class="menu">
					<li><a href="company/map" class="js" id="map-link">Übersichtskarte</a></li>
				</ul>
			</div>
		</div>
		<div class="content-container">
			<?php print $this->content; ?>
		</div>
		<div id="modal-window"></div>
		<div id="modal-window-content">
			<div id="modal-window-close">close</div>
			<div class="content"></div>
		</div>
	</body>
</html>