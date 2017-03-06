<template>
	<div>
		<div class="container">
			<section id="subMenu">
				<router-link to="/store/vinyles">
					<div class="col-md-4">
						<h2>Vinyles</h2>
						<img src="src/assets/imgs/vinyles.jpg" />
					</div>
				</router-link>
				<router-link to="/store/platines">
					<div class="col-md-4">
						<h2>Platines</h2>
						<img src="src/assets/imgs/platines.jpg" />
					</div>
				</router-link>
				<router-link to="/store/coffrets">
					<div class="col-md-4">
						<h2>Coffrets</h2>
						<img src="src/assets/imgs/coffrets.jpg" />
					</div>
				</router-link>
			</section>
		</div>
		<section id="callToAction">
			<div class="row nomargin">
				<div class="slogan col-md-3">
					<img src="src/assets/imgs/popart.png" />
				</div>
				<div class="slogan col-md-3">
					<div>
						<h2>L'abonnement <br />Vinyl Store</h2>
						<p>Les psychologues<br /> le détestent !</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="border" >
						<p class="price">
							Le secret de la bonne humeur :<br />
							3 vinyles / mois <br />
							40€ <br />
						</p>
						<p class="hook">
							Les nouveautés comme les grands classiques dans votre boîte aux lettres.
						</p>
					</div>
				</div>
			</div>
		</section>
		<div class="container">
			<section id="selection">
				<router-link v-on:click.native="emitGenreFromHome('Oldies')" to="/store/vinyles">
					<div class="col-md-4">
						<img src="src/assets/imgs/vinyles.jpg" />
						<h2>Sélection Oldies</h2>
					</div>
				</router-link>
				<a href="#">
					<div class="col-md-4">
						<img src="src/assets/imgs/platines.jpg" />
						<h2>Le coffret du mois</h2>
					</div>
				</a>
				<router-link v-on:click.native="emitGenreFromHome('Nouveautés')" to="/store/vinyles">
					<div class="col-md-4">
						<img src="src/assets/imgs/coffrets.jpg" />
						<h2>Sélection Nouveautés</h2>
					</div>
				</router-link>
			</section>
		</div>
			<section id="originalSoundTrack">
				<router-link v-on:click.native="emitGenreFromHome('Bande Originale')" to="/store/vinyles">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<img src="src/assets/imgs/vinyles.jpg" />
						</div>
						<div class="ost-right col-md-8">
							<h2 class="nomargin">Les Bandes Originales</h2>
							<img :src="product.image" v-for="product in imagesBandeOriginale">
							<p>Retrouvez les plus beaux moments du cinéma sur vos platines !</p>
						</div>
					</div>
				</div>
				</router-link>
			</section>
	</div>
</template>

<script>
	import { Bus } from './bus.js'

	export default {
		data () {
		    return {
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
		methods: {
			emitGenreFromHome(value){
				console.log("Bus.$emit('recherche-genre', value) => " + value)
				Bus.$emit('recherche-genre', value);
			}
		},
		computed: {
			imagesBandeOriginale: function () {
				var resultatsArray = this.products;
				var filtre = "bande originale"
				var counter = 0				

				resultatsArray = resultatsArray.filter(function(item){
                    if(counter>5 || item.genre.toLowerCase().indexOf(filtre) !== -1){
                    	counter++;
                        return item;
                	}
                })

				resultatsArray.shift();
                return resultatsArray;
			}
		}
	}
</script>
