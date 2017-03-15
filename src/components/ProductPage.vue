<template>
<<<<<<< HEAD
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
                    <QuantitySelector></QuantitySelector>
                  </div>
                  <div class="col-md-8">
                    <button class="addToCart" @click="addToCart">Ajouter au panier</button>
                  </div>
                  <div class="row">
                    <div class="col-md-8 col-md-offset-4">
                      <div class="deliveryInfos">Livraison sous 4 jours</div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="musicPlayer">Ecouter un extrait</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="desc">{{product.description}}</div>
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
                    <router-link :to="{ name: 'product', params: { type:product.type , id: product.id }}">
                      <img :src="product.image" />
                    </router-link>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="ratingArea">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="row">
                  <div class="col-md-3" v-on:click="commentFormToggle()">
                    <p v-if="isActive" class="note">Donner mon avis</p>
                    <p v-else class="note">Annuler</p>
                  </div>
                </div>
                <div class=" row commentForm" v-bind:class="{ commentFormHidden: isActive }">
                  <form>
                    <input class="col-md-2"  type="text" placeholder="Nom"/>
                    <input class="col-md-push-1 col-md-9" type="text" placeholder="Titre"/>
                    <textarea class="col-md-12" rows="6" placeholder="Mon commentaire..."></textarea>
                    <button>ENVOYER</button>
                  </form>
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
        </div>
      </div>
    </div>
  </transition>
=======
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
										<QuantitySelector></QuantitySelector>
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
	</div>
</div>
</div>
</div>
</transition>
>>>>>>> 10d3e5723ed2a4054f373b73d672f38db46e7660
</template>

<script>
import CartState from '../shoppingCartState'
import QuantitySelector from '../QuantitySelector.vue'

export default{
	components : { QuantitySelector },
	data () {
		return{
			products: [],
			commentaires: [],
<<<<<<< HEAD
	  	commentLimit:3,
			isActive : true
=======
			commentLimit:3,

			isActive : true,
			auteur: "",
			titre: "",
			texte:""
>>>>>>> 10d3e5723ed2a4054f373b73d672f38db46e7660
		}
	},
	mounted () {
		this.$http.get('/src/jsonTest.json').then((response) => {
			console.log("success", response)
			this.products = response.data
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
		addToCart() {
			CartState.add(this.products[parseInt(window.location.pathname.split('/').pop())-1])
		},

		selectProduct(limit, update){
			var resultatsArray = this.products;
			var count = 0;

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
				if(item.id != window.location.pathname.split('/').pop() && item.genre.indexOf('coupdecoeur') !== -1 && count < limit) {
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
<<<<<<< HEAD

=======
		submitCommentaire(){

		},
>>>>>>> 10d3e5723ed2a4054f373b73d672f38db46e7660
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
			console.log("Scrolling down"+ currentScrollPosition);
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
