<template>
  <div>
    <NavComponent></NavComponent>
    <div class="body col-md-6 col-md-offset-4">
      <h2 class="midtitle">Modifier l'album</h2>

        <div v-for="vinyle in selectProduct()" class="container form">
          <form>
            
            <div id="album" class="addform">
              <div class="form-group">
                <label>Nom de l'album</label>
                <input type="text" class="form-control" :value="vinyle.nom">
              </div>

              <div class="form-group">
                <label>Nom de l'artiste</label>
                <input type="text" class="form-control" :value="vinyle.auteur">
              </div>

              <div class="form-group">
                <label>Prix</label>
                <input type="number" min="1" step="any" :value="vinyle.prix">
              </div>

              <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" rows="5">{{ vinyle.decription }}</textarea>
              </div>

              <div class="form-group">
                  <label>Extrait</label>
                  <input type="file" class="form-control-file" aria-describedby="fileHelp" accept=".mp3,.wav">
              </div>

              <div class="form-group col-md-12 img-form">
                  <label class="col-md-12 img-form">Couverture de l'album</label>
                  <div class="col-md-5">
                    <img :src="vinyle.image">
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
    },

    data () {
      return{
        products: [],
      }
    },

    mounted () {
      this.$http.get('/src/test.json').then((response) => 
      {
        this.products = response.data
      }, (response) => {
        console.log("erreur", response)
      })
    },

    methods: {
      selectProduct(){
        var resultatsArray = this.products;

          resultatsArray = resultatsArray.filter(function(item){
            if(item.id == window.location.pathname.split('/').pop())
              return item
          })
          return resultatsArray;

      }
    }
  }
</script>