<template>
  <div class="sortBar mb">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <select v-model="triPar" @click="emitRechercheSearchBar()">
            <option value="date-desc">Date de sortie &darr;</option>
            <option value="date-asc">Date de sortie &uarr;</option>
            <option value="prix-desc">Prix &darr;</option>
            <option value="prix-asc">Prix &uarr;</option>
            <option value="alphabet-desc">Ordre alphabétique &darr;</option>
            <option value="alphabet-asc">Ordre alphabétique &uarr;</option>
          </select>
        </div>
        <div class="col-md-3">
          <select v-model="filtreGenre" @click="emitRechercheSearchBar()">
            <option value="tout">Genre : Tout</option>
            <option value="bande-originale">Bande Originale</option>
            <option value="classique">Classique</option>
            <option value="electro">Electro</option>
            <option value="jazz">Jazz</option>
            <option value="nouveautes">Nouveautés</option>
            <option value="oldies">Oldies</option>
            <option value="pop">Pop</option>
            <option value="rap">Rap</option>
            <option value='rock'>Rock</option>
            <option value="variete">Variété</option>            
          </select>
        </div>
        <div class="col-md-3">
          <form>
            <input type="text" v-model="rechercheString" placeholder="rechercher un vinyle" @keyup="emitRechercheSearchBar()" />
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Bus } from './bus.js'

export default{
  data () {
    return{
      triPar: window.location.pathname.split("/").slice(4,5).pop(),
      filtreGenre: window.location.pathname.split("/").slice(3,4).pop(),
      rechercheString: ""
    }
  },
  created() {
    Bus.$on('recherche-string', rechercheString => {
      this.rechercheString = rechercheString;
    }),
    Bus.$on('recherche-genre', filtreGenre => {
      this.filtreGenre = filtreGenre;
    })
  },
  methods: {
    emitRechercheSearchBar(){
      var type = window.location.pathname.split('/');
      this.$router.push({ name: 'store', params: { type: type[2], genre: this.filtreGenre, sort: this.triPar  }})
      Bus.$emit('tri-par', this.triPar);
      Bus.$emit('recherche-genre', this.filtreGenre);
      Bus.$emit('recherche-string', this.rechercheString);
    }
  }
}
</script>
