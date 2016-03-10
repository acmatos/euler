<?php if(isset($empty)): ?>

	<h1>Problem answer not found.</h1>
	<section>
		<article>
			We're sorry, there's no answer for this problem yet. <a href="index.php">Go back home</a>
		</article>
	</section>

<?php else: ?>

	<h1><?php echo $problem['title']; ?></h1>
	<time>Execution: <?php echo round($problem['executionTime'] * 1000,2); ?>ms</time>
	<section>
	    <article><?php echo nl2br($problem['description']); ?></article>
	    <div class="code"><?php highlight_string('<?php ' . PHP_EOL . $problem['code'] . '?>'); ?></div>
	</section>
	<footer>
		<span>Click here to view solution.</span>
		<span class="solution"><?php echo $problem['solution']; ?></span>
	</footer>

<?php endif; ?>