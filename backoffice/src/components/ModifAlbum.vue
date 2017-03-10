<template>
  <div>
    <NavComponent></NavComponent>
    <div class="body col-md-6 col-md-offset-4">
      <h2 class="midtitle">Modifier l'album</h2>

        <div class="container form">
          <form>
            
            <div id="album" class="addform">
              <div class="form-group">
                <label>Nom de l'album</label>
                <input type="text" class="form-control" value="Psycho Tropical Berlin">
              </div>

              <div class="form-group">
                <label>Nom de l'artiste</label>
                <input type="text" class="form-control" value="La Femme">
              </div>

              <div class="form-group">
                <label>Prix</label>
                <input type="number" min="1" step="any" value="15">
              </div>

              <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" rows="5">Sorti en 2013, le premier album de la Femme est ultra stylé. Si vous demandez gentiment à Pauline, elle vous le chantera !</textarea>
              </div>

              <div class="form-group">
                  <label>Extrait</label>
                  <input type="file" class="form-control-file" aria-describedby="fileHelp" accept=".mp3,.wav">
              </div>

              <div class="form-group col-md-12 img-form">
                  <label class="col-md-12 img-form">Couverture de l'album</label>
                  <div class="col-md-5">
                    <img src="../assets/imgs/AlbumCover.png">
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
  </div>
</template>

<script>
  import NavComponent from './Nav.vue'

  export default {
    components: {
      NavComponent
    }
  }
</script>