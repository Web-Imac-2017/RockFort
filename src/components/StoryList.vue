<template>
  <div id="storyList" >
    <div class="container-fluid storeList">
      <div id="storyListHeader" class="row">
        <h1>La Story</h1>
      </div>
    </div>
    <div class="row nomargin">
      <div class="col-md-12 nopadding">
        <SearchBarArticleComponent></SearchBarArticleComponent>
      </div>
    </div>
    <div class="container">
      <h2>{{nombreArticle}} articles {{recherchePrefixe}} {{stringRechercheArticle}}</h2>
      <hr>
      <div v-for="article in rechercheArticles" class="row">
        <router-link :to="{ name: 'story', params: { id: article.id }}">
          <div class="col-sm-4 col-xs-12">
            <img class="imageArticle" :src="article.image" />
          </div>
          <div class="col-sm-8 col-xs-12">
            <div class="articleContent">
              <h2 class="title">{{ article.nom }}</h2>
              <p class="infos"><!--{{ article.date.split('-').reverse().join('-') }} par {{ article.auteur }} dans {{article.theme}} --></p>
              <p class="desc">{{article.contenu.substring(0,200)}}(...)</p>
            </div>
          </div>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import { Bus } from './bus.js'
import SearchBarArticleComponent from './SearchBarArticle.vue'

export default{
  components: {
    SearchBarArticleComponent
  },
  data () {
    return {
      articles: [],
      nombreArticle: 0,
      recherchePrefixe:"",
      stringRechercheArticle: "",
      themeArticle: "",
      triArticle: "",
      limit: 3
    }
  },
  created() {
    window.addEventListener('scroll', this.handleScroll)
    Bus.$on('tri-article', triArticle => {
      this.triArticle = triArticle;
    }),
    Bus.$on('recherche-theme', themeArticle => {
      this.themeArticle = themeArticle;
    }),
    Bus.$on('recherche-string', stringRechercheArticle=> {
      console.log('looool')
      this.stringRechercheArticle = stringRechercheArticle;
    })
  },
  mounted () {
    this.$http.get('http://localhost:80/vinyleStore/RockFort/api/articles').then((response) => {
      console.log("success", response)
      this.articles = response.data
    }, (response) => {
      console.log("erreur", response)
    })
  },
  computed: {
    //SEARCH
    rechercheArticles(limit) {
      var articlesArray = this.articles;
      var stringRechercheArticle = this.stringRechercheArticle;
      var themeArticle = this.themeArticle;
      var triArticle = this.triArticle;
      var limit = this.limit
      var filtre = window.location.pathname.split("/");

      if(!stringRechercheArticle && !themeArticle && !triArticle){
        this.nombreArticle = articlesArray.length;
        articlesArray.sort(function(a,b){
          var myA = a.date;
          var myB = b.date;
        if(myA < myB) {
          return 1;
        }
        if(myA > myB) {
          return -1;
        }
          return 0;
        });
        return articlesArray.slice(0,limit);
      }

      stringRechercheArticle = stringRechercheArticle.trim().toLowerCase();
      articlesArray = articlesArray.filter(function(item){
        if(filtre[2] =='tout' || item.theme.toLowerCase().indexOf(filtre[2]) !== -1){
          if(stringRechercheArticle == "" || item.titre.toLowerCase().indexOf(stringRechercheArticle) !== -1){
            return item;
          }
        }
      })

      //SORT
      if(filtre[3] == "date-asc"){
        articlesArray.sort(function(a,b){
          var myA = a.date;
          var myB = b.date;
          if(myA > myB) {
            return 1;
          }
          if(myA < myB) {
            return -1;
          }
          return 0;
        });
      }else if(filtre[3] == "date-desc"){
        articlesArray.sort(function(a,b){
          var myA = a.date;
          var myB = b.date;
          if(myA < myB) {
            return 1;
          }
          if(myA > myB) {
            return -1;
          }
          return 0;
        });
      }

      if(stringRechercheArticle) {
        this.recherchePrefixe = "pour votre recherche ";
      }else{
        this.recherchePrefixe = "";
      }

      this.nombreArticle = articlesArray.length;
      return articlesArray.slice(0, limit);
    }
  },
  methods:{
    handleScroll(){
      var currentScrollPosition = window.scrollY;
      if(currentScrollPosition >= document.documentElement.scrollHeight - document.documentElement.clientHeight){
        this.limit += 3;
      }else if(!currentScrollPosition){
        this.limit = 3;
      }
    }
  },
  destroyed () {
    window.removeEventListener('scroll', this.handleScroll);
  }
}
</script>
