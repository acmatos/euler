<nav>
	<div class="clearfix">
		<div class="item">
			<a href="index.php" <?php echo empty($_GET['detail']) ? 'class="selected"' : ''; ?>>
				<div>All</div>
			</a>
		</div>
		<?php foreach($methodArray as $method): ?>
			<div class="item">
				<?php $name = str_replace('problem_', '', $method->name); ?>
				<a href="?detail=<?php echo $name; ?>" <?php echo !empty($_GET['detail']) && $_GET['detail'] == $name ? 'class="selected"' : ''; ?>>
					<div><?php echo $name; ?></div>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
</nav>