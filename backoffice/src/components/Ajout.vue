<template>
  <div>
    <NavComponent></NavComponent>
    <div class="body col-md-6 col-md-offset-4">
      <h2 class="midtitle">Ajouter un élément au site</h2>

        <div class="container form">
          <form>
            <div class="form-group">
              <label for="select">Type d'ajout</label>
              <select class="form-control" id="select" onchange="showForm(this)">
                <option>Sélectionnez un élément...</option>
                <option value="album">Album</option>
                <option value="platine">Platine</option>
                <option value="coffret">Coffret</option>
                <option value="article">Article</option>
              </select>
            </div>


            <div id="album" class="addform" style="display:none;">
              <div class="form-group">
                <label>Nom de l'album</label>
                <input type="text" class="form-control" placeholder="Ex : Abbey Road">
              </div>

              <div class="form-group">
                <label>Nom de l'artiste</label>
                <input type="text" class="form-control" placeholder="Ex : The Beatles">
              </div>

              <div class="form-group">
                <label>Prix</label>
                <input type="number" min="1" step="any" placeholder="15">
              </div>

              <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" rows="5" placeholder="C'est le meilleur album !"></textarea>
              </div>

              <div class="form-group">
                  <label>Extrait</label>
                  <input type="file" class="form-control-file" aria-describedby="fileHelp" accept=".mp3,.wav">
              </div>

              <div class="form-group">
                  <label>Couverture de l'album</label>
                  <input type="file" class="form-control-file" aria-describedby="fileHelp" accept=".jpeg,.jpg,.png,.gif">
              </div>

              <div class="form-group">
                <label>Stock</label>
                <input type="number" min="1" step="any" placeholder="30">
              </div>

              <button type="submit" class="btn btn-primary">Ajouter</button>

            </div>

            <div id="platine" class="addform" style="display:none;">
              <div class="form-group">
                <label>Nom du modèle</label>
                <input type="text" class="form-control" placeholder="Ex : Eagletone Oneone">
              </div>

              <div class="form-group">
                <label>Prix</label>
                <input type="number" min="1" step="any" placeholder="300">
              </div>

              <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" rows="5" placeholder="C'est la meilleure platine !"></textarea>
              </div>

              <div class="form-group">
                  <label>Image</label>
                  <input type="file" class="form-control-file" aria-describedby="fileHelp" accept=".jpeg,.jpg,.png,.gif">
              </div>

              <div class="form-group">
                <label>Stock</label>
                <input type="number" min="1" step="any" placeholder="30">
              </div>

              <button type="submit" class="btn btn-primary">Ajouter</button>

            </div>

            <div id="coffret" class="addform" style="display:none;">
              <div class="form-group">
                <label>Nom du coffret</label>
                <input type="text" class="form-control" placeholder="Ex : Coffret janvier 2017">
              </div>

              <div class="form-group">
                <label>Prix</label>
                <input type="number" min="1" step="any" placeholder="40">
              </div>

              <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" rows="5" placeholder="C'est le meilleur coffret !"></textarea>
              </div>

              <div class="form-group">
                  <label>Image</label>
                  <input type="file" class="form-control-file" aria-describedby="fileHelp" accept=".jpeg,.jpg,.png,.gif">
              </div>

              <div class="form-group">
                <label>Stock</label>
                <input type="number" min="1" step="any" placeholder="30">
              </div>

              <button type="submit" class="btn btn-primary">Ajouter</button>

            </div>

            <div id="article" class="addform" style="display:none;">
              <div class="form-group">
                <label>Nom de l'article</label>
                <input type="text" class="form-control" placeholder="Ex : Naissance des vinyles">
              </div>

              <div class="form-group">
                <label>Auteur</label>
                <input type="text" class="form-control" placeholder="Ex : Qaurantain">
              </div>

              <div class="form-group">
                  <label>Contenu</label>
                  <textarea class="form-control" rows="15" placeholder="Ecrivez votre article" id="writeContent"></textarea>
              </div>

              <div class="form-group">
                  <label>Image</label>
                  <input type="file" class="form-control-file" aria-describedby="fileHelp" accept=".jpeg,.jpg,.png,.gif">
              </div>

              <div class="form-group">
                <label>Stock</label>
                <input type="number" min="1" step="any" placeholder="30">
              </div>

              <button type="submit" class="btn btn-primary">Ajouter</button>

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