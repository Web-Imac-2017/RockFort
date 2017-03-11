<template>
  <div>
    <NavComponent></NavComponent>
    <div>

      <div class="body col-md-10 col-md-offset-2">
        <h1 id="welcome">Bienvenue, Qaurantain !</h1>

        <h2 class="midtitle">État des stocks :</h2>

        <div class="stockbutton col-md-4">
          <button type="button" class="btn btn-default" onclick="showForm(this)" value="stock-vinyles">Vinyles</button>
        </div>

        <div class="stockbutton col-md-4">
          <button type="button" class="btn btn-default" onclick="showForm(this)" value="stock-platines">Platines</button>
        </div>

        <div class="stockbutton col-md-4">
          <button type="button" class="btn btn-default" onclick="showForm(this)" value="stock-coffrets">Coffrets</button>
        </div>

        <div class="stockall">

        <div id="stock-vinyles" class="addform" style="display:none;" >

          <div v-if="vinyle.type == 'vinyles'" v-for="vinyle in products" class="col-md-4">
            <button type="button" class="btn btn-default" v-bind:style="{ 'background-color' : 'colorChanger(' + vinyle + ')' }" >
              <div class="col-md-5 img-container"><img :src="vinyle.image"></div>
              <div class="col-md-7">
                <h4>{{ vinyle.nom }}</h4>
                <h5>{{ vinyle.auteur }}</h5>
                <h4>Stock : {{ vinyle.stock }}</h4>
              </div>
            </button>
          </div>
        </div>

        <div id="stock-platines" class="addform" style="display:none;" >

          <div v-if="platine.type == 'platines'" v-for="platine in products" class="col-md-4">
            <button type="button" class="btn btn-default" v-bind:style="{ 'background-color' : 'colorChanger(' + platine + ')' }" >
              <div class="col-md-5 img-container"><img :src="platine.image"></div>
              <div class="col-md-7">
                <h4>{{ platine.nom }}</h4>
                <h4>Stock : {{ platine.stock }}</h4>
              </div>
            </button>
          </div>
        </div>

        <div id="stock-coffrets" class="addform" style="display:none;" >

          <div v-if="coffret.type == 'coffrets'" v-for="coffret in products" class="col-md-4">
            <button type="button" class="btn btn-default" v-bind:style="{ 'background-color' : 'colorChanger(' + coffret + ')' }" >
              <div class="col-md-5 img-container"><img :src="coffret.image"></div>
              <div class="col-md-7">
                <h4>{{ coffret.nom }}</h4>
                <h4>Stock : {{ coffret.stock }}</h4>
              </div>
            </button>
          </div>
        </div>

        </div>

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

    computed:{
      colorChanger: function(product){
        console.log("J'aimerais changer de couleur");
        var color = 'green';
        if(product.stock <= 10){
            color = 'red';
        }
        else if(product.stock <= 25){
            color = 'orange';
        }
        return color;
      }
    }
  }
</script>