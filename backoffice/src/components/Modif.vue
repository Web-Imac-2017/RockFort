<template>
  <div>
    <NavComponent></NavComponent>
    <div class="body col-md-6 col-md-offset-4">
      <h2 class="midtitle">Modifier un élément</h2>

        <div class="container form">
          <form>
            <div class="form-group">
              <label for="select">Type de modification</label>
              <select class="form-control" id="select" onchange="showForm(this)">
                <option>Sélectionnez un élément...</option>
                <option value="success-album">Album</option>
                <option value="success-platine">Platine</option>
                <option value="success-coffret">Coffret</option>
                <option value="success-article">Article</option>
              </select>
            </div>


            <div id="success-album" class="addform" style="display:none;" >

              <div v-if="vinyle.type == 'vinyles'" v-for="vinyle in products" class="col-md-6 select-item">
                <button type="button" class="btn btn-default" onclick="window.location.href='modifierAlbum'">
                  <div class="col-md-5 img-container"><img :src="vinyle.image"></div>
                  <div class="col-md-7">
                    <h4>{{ vinyle.nom }}</h4>
                    <h5>{{ vinyle.auteur }}</h5>
                  </div>
                </button>
              </div>
            </div>

            <div id="success-platine" class="addform" style="display:none;" >
             
              <div v-if="platine.type == 'platines'" v-for="platine in products" class="col-md-6 select-item">
                <button type="button" class="btn btn-default" onclick="window.location.href='modifierPlatine'">
                  <div class="col-md-5 img-container"><img :src="platine.image"></div>
                  <div class="col-md-7">
                    <h4>{{ platine.nom }}</h4>
                  </div>
                </button>
              </div>
            </div>

            <div id="success-coffret" class="addform" style="display:none;">
              
              <div v-if="coffret.type == 'coffrets'" v-for="coffret in products" class="col-md-6 select-item">
                <button type="button" class="btn btn-default" onclick="window.location.href='modifierCoffret'">
                  <div class="col-md-5 img-container"><img :src="coffret.image"></div>
                  <div class="col-md-7">
                    <h4>{{ coffret.nom }}</h4>
                  </div>
                </button>
              </div>
            </div>

            <div id="success-article" class="addform" style="display:none;">

               <div v-if="article.type == 'articles'" v-for="article in products" class="col-md-6 select-item">
                <button type="button" class="btn btn-default" onclick="window.location.href='modifierArticle'">
                  <div class="col-md-5 img-container"><img :src="article.image"></div>
                  <div class="col-md-7">
                    <h4>{{ article.nom }}</h4>
                  </div>
                </button>
              </div>

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
    },

    data() {
      return {
        products: []
      }
    },

    mounted () {
      this.$http.get('/src/test.json').then((response) => 
      {
        console.log("success", response.data)
        this.products = response.data
      }, (response) => {
        console.log("erreur", response)
      })
    },
  }
  
</script>