<template>
	<div id="storyList" >
    	<div class="container-fluid storeList">
     		<div id="storyListHeader" class="row">
        		<h1>La Story</h1>
      		</div>
      	</div>
        <div class="row">
          <SearchBarArticleComponent></SearchBarArticleComponent>
        </div>
      	<div class="container">
          <h2>{{nombreArticle}} articles pour {{stringRechercheArticle}}</h2>
          <hr />
      		<div v-for="article in rechercheArticles" class="row">
      			<router-link :to="{ name: 'story', params: { id: article.id }}">
              <div class="col-md-4">
                <img class="imageArticle" :src="article.imagecover" />
              </div>
              <div class="col-md-8">
                <h2>{{ article.titre }}</h2>
                <p>{{ article.date.split('-').reverse().join('-') }} par {{ article.auteur }} dans {{article.theme}}</p>
                <p>{{article.texte.substring(0,200)}}(...)</p>
              </div>
      			</router-link>
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
        stringRechercheArticle: "",
        themeArticle: "",
        triArticle: ""
      }
    },
    created() {
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
      this.$http.get('/src/jsonTestArticle.json').then((response) => {
        console.log("success", response)
        this.articles = response.data
      }, (response) => {
        console.log("erreur", response)
      })
    },
    computed: {
      //SEARCH
      rechercheArticles: function () {
        var articlesArray = this.articles;
        var stringRechercheArticle = this.stringRechercheArticle;
        var themeArticle = this.themeArticle;
        var triArticle = this.triArticle;

        var filtre = window.location.pathname.split("/");
                console.log("0" + filtre[0])
                console.log("1" + filtre[1])
                console.log("2" + filtre[2])
                console.log("3" + filtre[3])
                console.log("4" + filtre[4])
                console.log("5" + filtre[5])
        
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
          return articlesArray;
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

        return articlesArray;
      }
	  }
  }
</script>