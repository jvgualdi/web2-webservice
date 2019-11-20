<style>
	.publication{
		text-align: center;

	}
	.title{
		text-align: center;
	}

</style>


<h1>Página Inicial</h1>


<?php
	
	if($publications):
		foreach ($publications as $pub):
	?>
		<div class="publication">
		<span class="title"><?= $pub->getTitle() ?></span><br>

		<img src="<?= $pub->getPath() ?>" width="50%" height="400px"><br>
		<br>
		<span>Data: <?= $pub->getTime() ?></span><br>
		</div>
		
	<?php 
		endforeach;
	endif;
?>