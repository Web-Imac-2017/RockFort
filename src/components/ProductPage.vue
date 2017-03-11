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
										<QuantitySelector></QuantitySelector>
									</div>
									<div class="col-md-8">
										<div class="addToCart">
											Ajouter au panier
										</div>
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
						<div class="col-md-8 col-md-offset-2">
							<div class="row">
								<div class="col-md-3">
									<p class="note">Donner mon avis</p>
								</div>
							</div>
							<div class="comment">
								<div class="row mb">
									<div class="col-md-3">
										<div class="commentInfo">
											<p class="author">Michel L.</p>
											<p class="date">le 12 Fév. 2017</p>
										</div>
									</div>
									<div class="col-md-9">
										<div class="commentContent">
											<p class="commentTitle">Un classique !</p>
											<p class="commentDesc">Que du bon sur cete album. Ça fait du bien de ré-écouter ces classiques !</p>
										</div>
									</div>
								</div>
							</div>
							<div class="comment">
								<div class="row mb">
									<div class="col-md-3">
										<div class="commentInfo">
											<p class="author">Michel L.</p>
											<p class="date">le 12 Fév. 2017</p>
										</div>
									</div>
									<div class="col-md-9">
										<div class="commentContent">
											<p class="commentTitle">Un classique !</p>
											<p class="commentDesc">Que du bon sur cete album. Ça fait du bien de ré-écouter ces classiques !</p>
										</div>
									</div>
								</div>
							</div>
							<div class="comment">
								<div class="row mb">
									<div class="col-md-3">
										<div class="commentInfo">
											<p class="author">Michel L.</p>
											<p class="date">le 12 Fév. 2017</p>
										</div>
									</div>
									<div class="col-md-9">
										<div class="commentContent">
											<p class="commentTitle">Un classique !</p>
											<p class="commentDesc">Que du bon sur cete album. Ça fait du bien de ré-écouter ces classiques !</p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3 col-md-offset-9">
									<p class="moreNote">Plus d'avis</p>
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
import QuantitySelector from '../QuantitySelector.vue'

export default{
	components : { QuantitySelector },
	data () {
		return{
			products: []
		}
	},
	mounted () {
	    this.$http.get('/src/jsonTest.json').then((response) => {
	      console.log("success", response)
	      this.products = response.data
	    }, (response) => {
	      console.log("erreur", response)
	    })
  	},
  	methods:{
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

  			function shuffle(a) {
          		for (let i = a.length; i; i--) {
            		let j = Math.floor(Math.random() * i);
            		[a[i - 1], a[j]] = [a[j], a[i - 1]];
          		}
        	}
        	shuffle(resultatsArray);

        	resultatsArray = resultatsArray.filter(function(item){
	          	if(item.id != window.location.pathname.split('/').pop() && count < limit) {
	            	count++
	            	return item
	          	}
        	})
        	return resultatsArray
  		}

  	}

}
</script>
