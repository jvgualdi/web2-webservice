<main>
    <div class="container">
      <div class="row">
        <div class="col-8 py-5">
          <h1>Enviar Publicação</h1>

          <form enctype="multipart/form-data" action="index.php?controller=Publication&action=create" method="post">

            <div class="form-group">
              <label for="exampleInputEmail1">Título</label>
              <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Título">
              <small id="emailHelp" class="form-text text-muted">Dê um título ao seu meme</small>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Selecionar arquivo</label>
              <input type="file" name="meme" class="form-control-file" id="exampleFormControlFile1">
            </div>

            <button type="submit" name="save" class="btn btn-primary">Enviar</button>
          </form>
        </div>
      </div>
    </div>
</main>
