<template>
  <div>
    <NavComponent></NavComponent>
    <div class="body col-md-6 col-md-offset-4">
      <h2 class="midtitle">Modifier l'article</h2>

        <div v-for="article in selectProduct()" class="container form">
          <form>
            
            <div id="album" class="addform">

              <div class="form-group">
                <label>Nom de l'article</label>
                <input type="text" class="form-control" :value="article.nom">
              </div>

              <div class="form-group">
                <label>Auteur</label>
                <input type="text" class="form-control" :value="article.auteur">
              </div>

              <div class="form-group">
                  <label>Contenu</label>
                  <textarea class="form-control" rows="5">{{ article.description }}</textarea>
              </div>

              <div class="form-group col-md-12 img-form">
                  <label class="col-md-12 img-form">Image</label>
                  <div class="col-md-5">
                    <img :src="article.image">
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