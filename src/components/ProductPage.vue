<template>
	<transition name="fade" appear>
		<div id="productPage" >
			<div class="container">
				<div class="row">
					<div v-for="product in selectProduct(1, false)" class="col-md-8 col-md-offset-2">
						<div class="row">
							<div class="col-md-6">
								<img class="vinyleImg" :src="product.image" />
							</div>
							<div class="col-md-6">
								<h1 class="vinyleTitle">{{product.nom}}</h1>
								<h4 class="bandName">{{product.auteur}} - {{product.date.substring(0,4)}}</h4>
								<div class="row">
									<div class="col-md-4">
										<div class="price">{{product.prix}}€</div>
									</div>
									<div class="col-md-8">
										<div class="notation">
											Notation system
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="quantitySelector">
									    <div class="col-md-6">
									      <div class="row">
									        <div class="incrButton" @click="inc()"><img src="/src/assets/imgs/incr.png" width="35%" alt=""></div>
									      </div>
									      <div class="row">
									        <div class="decrButton" @click="dec()"><img src="/src/assets/imgs/decr.png" width="35%" alt=""></div>
									      </div>
									    </div>
									    <div class="col-md-6">
									      <div class="quantity">
									        {{ quantity }}
									      </div>
									    </div>
									  </div>
									</div>
									<div class="col-md-8">
										<button class="addToCart" @click="addToCart">
											Ajouter au panier
										</button>
									</div>
								</div>
								<div class="row">
									<div class="col-md-8 col-md-offset-4">
										<div class="deliveryInfos">Livraison sous 4 jours</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="musicPlayer">
											Ecouter un extrait
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="desc">
									{{product.description}}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p class="more">Vous aimerez aussi</p>
							</div>
						</div>
						<div class="row">
							<div v-for="product in selectProduct(4, false)" class="col-md-3">
								<div @click="selectProduct(1,true)" class="vinyleItem">
									<router-link :to="{ name: 'product', params: { type:product.type , id: product.id }}"><img :src="product.image" /></router-link>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="ratingArea">
				<div class="container">
					<div class="row">
						<div class="col-md-3" v-on:click="commentFormToggle()">
							<p v-if="isActive" class="note">Donner mon avis</p>
							<p v-else class="note">Annuler</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div v-bind:class="{ commentFormHidden: isActive }">
								<div class="commentForm">
									<form v-on:submit.prevent="submitCommentaire()">
										<div class="row">
											<div class="col-md-2">
												<input type="text" placeholder="Pseudo" v-model="auteur"/>
											</div>
											<div class="col-md-push-1 col-md-9">
												<input type="text" placeholder="Titre" v-model="titre"/>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<textarea rows="6" placeholder="Votre commentaire..." v-model="texte"></textarea>
											</div>
										</div>
										<div class="row">
											<div class="col-md-2">
												<button class="validate">ENVOYER</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					<div v-for="comment in selectComments(commentLimit)" class="comment">
						<div class="row mb">
							<div class="col-md-3">
								<div class="commentInfo">
									<p class="author">{{comment.auteur}}</p>
									<p class="date">le {{comment.date}}</p>
								</div>
							</div>
							<div class="col-md-9">
								<div class="commentContent">
									<p class="commentTitle">{{comment.titre}}</p>
									<p class="commentDesc">{{comment.texte}}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</transition>
</template>

<script>
import CartState from '../shoppingCartState'

export default{
	data () {
		return{
			shownProduct: [],
			products: [],
			commentaires: [],
			commentLimit:3,
			isActive : true,
			auteur: "",
			titre: "",
			texte:"",
			quantity: 1
		}
	},
	mounted () {
		this.$http.get('http://localhost:80/vinylestore/api/products/').then((response) => {
			console.log("success", response)
			this.products = response.data
		}, (response) => {
			console.log("erreur", response)
		})
		this.$http.get('http://localhost:80/vinylestore/api/products/'+window.location.pathname.split('/').pop()).then((response) => {
			console.log("success", response)
			this.shownProduct = response.data
		}, (response) => {
			console.log("erreur", response)
		})
		this.$http.get('/src/jsonTestCommentaire.json').then((response) => {
			console.log("success", response)
			this.commentaires = response.data
		}, (response) => {
			console.log("erreur", response)
		})
	},
	created() {
		window.addEventListener('scroll', this.handleScroll)
	},
	methods:{
		inc () {
			this.quantity++
		},

		dec () {
			if (this.quantity > 1){
				this.quantity--
			}
		},

		addToCart() {
			CartState.addMultiple(this.shownProduct, this.quantity)
		},

		selectProduct(limit, update){
			var resultatsArray = this.products;
			var count = 0;
			var filtre = ["coupdecoeur"];

			if(update == true){
				this.$forceUpdate();
			}

			if(limit == 1){
				resultatsArray = resultatsArray.filter(function(item){
					if(item.id == window.location.pathname.split('/').pop())
					return item
				})
				return resultatsArray;
			}
			resultatsArray = resultatsArray.filter(function(item){
				if(item.id != window.location.pathname.split('/').pop() && item.theme.toLowerCase().indexOf(filtre[0]) !== -1 && count < limit) {
					count++
					return item
				}
			})
			return resultatsArray
		},

		commentFormToggle() {
			console.log(!this.isActive)
			this.isActive = !this.isActive;
			return this.isActive;
		},
		submitCommentaire(){

		},
		selectComments(limit){
			var resultatsArray = this.commentaires;
			var count = 0;

			resultatsArray = resultatsArray.filter(function(item){
				if(count < limit) {
					count++
					return item
				}
			})
			return resultatsArray

		},

		handleScroll() {
			console.log(document.documentElement.scrollHeight - document.documentElement.clientHeight)
			var currentScrollPosition = window.scrollY;
			if(currentScrollPosition >= document.documentElement.scrollHeight - document.documentElement.clientHeight){
				this.commentLimit += 3
			}
		}

	},
	destroyed () {
		window.removeEventListener('scroll', this.handleScroll);
	}
}
</script>
