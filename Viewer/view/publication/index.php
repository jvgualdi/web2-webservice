<main role="main">
  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading"><strong># CodeHumor</strong></h1>
      <p class="lead text-muted">Dedicated to humor and jokes relating to programmers and programming.</p>
			<p>
				<a href="//localhost/web2-webservice/Host/index.php?target=ws" class="btn btn-primary my-2">Json recebido</a>
			 	<a href="//localhost/web2-webservice/Host/index.php" class="btn btn-secondary my-2">Paínel de administrador</a>
		 </p>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
			<?php
				if($publications):
					foreach ($publications as $pub):
				?>
        <div class="col-md-6">
          <div class="card mb-6 shadow-sm publication">
            <img class="img-fluid" src="<?= $pub->getPath() ?>"><br>
            <div class="card-body">
              <p class="card-text text-center"><strong><?= $pub->getTitle() ?></strong></p>
							<p class="card-text text-center"><small class="text-muted">Publicado em: <?= $pub->getTime() ?></small></p>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
				<?php
					endforeach;
				endif;
			?>
      </div>
    </div>
  </div>

</main>
