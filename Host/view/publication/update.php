<?php
  $pub = $viewModel['publication'];
?>

<main>
    <div class="container">
      <div class="row">
        <div class="py-5">
          <h1>Editar Publicação</h1>

          <form enctype="multipart/form-data" action="index.php?controller=Publication&action=update&id=<?= $pub->getId() ?>" method="post">
            <div class="form-group">
              <div class="col-md-6">
                <div class="card mb-6 shadow-sm publication">
                  <img class="img-fluid" src="<?= $pub->getPath() ?>"><br>
                  <div class="card-body">
                    <label for="exampleInputEmail1">Título</label>
                      <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Título" value="<?= $pub->getTitle() ?>">
                    <p class="card-text text-center"><small class="text-muted">Publicado em: <?= $pub->getTime() ?></small></p>
                    <center>
                      <button type="submit" name="save" class="btn btn-info">Alterar</button>
                      <a href="index.php"class="btn btn-light">Voltar</a>
                    </center>
                  </div>
                </div>
              </div>
            </div>           
          </form>
        </div>
      </div>
    </div>
</main>

