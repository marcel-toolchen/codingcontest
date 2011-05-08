<?php foreach($this->companies as $company): ?>
	<div class="company"><a href="company/detail/<?php print $company->id; ?>" class="company-link"><?php print $company->name; ?></a></div>
<?php endforeach; ?>