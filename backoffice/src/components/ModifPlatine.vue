<template>
  <div class="body col-md-6 col-md-offset-4">
    <h2 class="midtitle">Modifier la platine</h2>

      <div class="container form">
        <form>
          
          <div id="album" class="addform">

            <div class="form-group">
              <label>Nom du modèle</label>
              <input type="text" class="form-control" value="Pioneer PL990">
            </div>

            <div class="form-group">
              <label>Prix</label>
              <input type="number" min="1" step="any" value="140">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="5">Profitez d'une qualité de musique exceptionnelle sur vos précieux vinyles. Cette platine Pioneer vous propose un fonctionnement automatisé, un bras haute sensibilité, un égaliseur intégré et deux vitesses pour lire vos 33 et 45 tours.</textarea>
            </div>

            <div class="form-group col-md-12 img-form">
                <label class="col-md-12 img-form">Aperçu</label>
                <div class="col-md-5">
                  <img src="assets/img/platine.png">
                </div>
                <div class="col-md-5">
                  <input type="file" class="form-control-file" aria-describedby="fileHelp" accept=".jpeg,.jpg,.png,.gif">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>

          </div>
         
         
        </form>
      </div>    

  </div>
</template>

<script>
  
</script>