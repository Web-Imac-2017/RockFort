<template>
	<div id="laStory" >
		<div class="container-fluid storeList">
			<div class="container">
				<div class="row">
					<div v-for="article in selectionArticles(1, false)" class="col-md-9">
						<h2>{{article.titre}}</h2>
						<p>le {{ article.date }} par {{article.auteur}}</p>
						<p>
							{{article.texte}}
						</p>
					</div>
					<div class="col-md-offset-1 col-md-2">
						<h3>Nos coups de coeur</h3>
						<div v-for="product in coupDeCoeur(5)"  class="coupDeCoeur">
							<router-link :to="{ name: 'product', params: { type:product.type , id: product.id }}">
								<img :src="product.image">
								<span>{{product.nom}}</span>
							</router-link>
						</div>
					</div>
				</div>
				<hr />
				<div class="row selection">
					<h2>Sélection de nos articles</h2>
					<div v-for="article in selectionArticles(4,false)" class="col-md-3">
						<div @click="selectionArticles(1,true)">
							<router-link :to="{ name: 'story', params: { id: article.id }}">
								<img :src="article.imagecover" />
								<h3>{{article.titre}}</h3>
							</router-link>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default{
	data () {
		return {
			article: [],
			articles: [],
			products: []
		}
	},
	mounted () {
		this.$http.get('/src/jsonTestArticle.json').then((response) => {
			console.log("success", response)
			this.articles = response.data
		}, (response) => {
			console.log("erreur", response)
		}),
		this.$http.get('/src/jsonTest.json').then((response) => {
			console.log("success", response)
			this.products = response.data
		}, (response) => {
			console.log("erreur", response)
		})
	},
	methods:{
		coupDeCoeur(limit){
			var resultatsArray = this.products
			var count = 0

			function shuffle(a) {
				for (let i = a.length; i; i--) {
					let j = Math.floor(Math.random() * i);
					[a[i - 1], a[j]] = [a[j], a[i - 1]];
				}
			}
			shuffle(resultatsArray);

			resultatsArray = resultatsArray.filter(function(item){
				if(item.genre.toLowerCase().indexOf("coupdecoeur") !== -1 && count < limit) {
					count++
					return item
				}
			})
			return resultatsArray
		},
		selectionArticles(limit, update){
			var resultatsArray = this.articles
			var count = 0

			console.log(update)
			if(update == true){
				this.$forceUpdate();
			}

			if(limit==1){
				resultatsArray = resultatsArray.filter(function(item){
					if(item.id == window.location.pathname.split('/').pop()) {
						return item
					}
				})
				return resultatsArray;
			}

			resultatsArray = resultatsArray.filter(function(item){
				if(item.id != window.location.pathname.split('/').pop() && count<limit) {
					count++;
					return item
				}
			})

			function shuffle(a) {
				for (let i = a.length; i; i--) {
					let j = Math.floor(Math.random() * i);
					[a[i - 1], a[j]] = [a[j], a[i - 1]];
				}
			}
			shuffle(resultatsArray);
			return resultatsArray
		}
	}
}
</script>
