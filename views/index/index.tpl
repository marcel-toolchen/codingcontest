<?php #pr($this->branches); ?>
<div class="branches">
	<?php foreach($this->branches as $branch): ?>
		<div class="branch-container">
			<div class="branch">
				<a href="branch/companies/<?php print $branch->id; ?>" class="branch-link"><?php print $branch->name; ?> (<?php print $branch->companies; ?>)</a>
			</div>
			<div class="companies"></div>
		</div>
	<?php endforeach; ?>
	<div class="clear"></div>
</div>