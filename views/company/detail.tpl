<div class="company-detail">
	<?php #pr($this->company); ?>
	<h1><?php print $this->company->name; ?></h1>
	<div class="address-data data">
		<address>
			<p><?php print $this->company->street; ?> <?php print $this->company->housenumber; ?></p>
			<p><?php print $this->company->zip; ?> <?php print $this->company->city; ?></p>
		</address>
	</div>
	<div class="contact-data data">
		<p><strong>Telefon:</strong> <?php print $this->company->phone; ?></p>
		<p><strong>Fax:</strong> <?php print $this->company->fax; ?></p>
		<p><strong>Mobil:</strong> <?php print $this->company->mobile; ?></p>
		<p><strong>E-Mail:</strong> <?php print $this->company->mail; ?></p>
		<p><strong>Internet:</strong> <a href="<?php print $this->company->web; ?>" target="_blank"><?php print $this->company->web; ?></a></p>
	</div>
	<div class="map">
		<div id="map"></div>
	</div>
</div>