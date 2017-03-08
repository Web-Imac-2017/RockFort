<template>
  <div class="body col-md-6 col-md-offset-4">
    <h2 class="midtitle">Modifier le coffret</h2>

      <div class="container form">
        <form>
          
          <div id="album" class="addform">

            <div class="form-group">
              <label>Nom du coffret</label>
              <input type="text" class="form-control" value="Janvier 2017">
            </div>

            <div class="form-group">
              <label>Prix</label>
              <input type="number" min="1" step="any" value="40">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="5">Le coffret de janvier 2017 vous fait découvrir 3 artistes : Serge Gainsbourg, Papooz ou the Do, il y en a pour tous les goûts !</textarea>
            </div>

            <div class="form-group col-md-12 img-form">
                <label class="col-md-12 img-form">Aperçu</label>
                <div class="col-md-5">
                  <img src="assets/img/coffret.jpg">
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