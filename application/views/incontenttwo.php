<div class = 'thought'>
	<div class="nine columns">
		<p><img width = '100%' src = '<?php echo $content; ?>'/></p>
	</div>
	
	
	<div class="seven columns">	
		<h2><?php echo $title; ?></h2>
		By <?php echo "<a href = 'users/$userId'>$author</a>"; ?>
		
		<?php if ($rating > 0) { ?><div class = 'rating'><?php echo $rating; ?> / 5</div> <? } ?>
		
		<?php echo $afterTitle; ?>
	</div>
</div>