<template>
	<div>
		<transition name="fade" appear>
			<div class="container-fluid">
				<section id="subMenu">
					<div class="row">
						<div class="col-md-4">
							<router-link to="/store/vinyles">
								<h2>Vinyles</h2>
								<img src="src/assets/imgs/vinyles.jpg" />
							</router-link>
						</div>
						<div class="col-md-4">
							<router-link to="/store/platines">
								<h2>Platines</h2>
								<img src="src/assets/imgs/platines.jpg" />
							</router-link>
						</div>
						<div class="col-md-4">
							<router-link to="/store/coffrets">
								<h2>Coffrets</h2>
								<img src="src/assets/imgs/muse.jpg" />
							</router-link>
						</div>
					</div>
				</section>
			</div>
		</transition>
		<section id="selection">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<router-link v-on:click.native="emitGenreFromHome('Oldies')" to="/store/vinyles/oldies/date-desc">
							<img src="src/assets/imgs/oasis.jpg" />
							<h2>Sélection Oldies</h2>
						</router-link>
					</div>
					<div class="col-md-4">
						<img src="src/assets/imgs/coffretBeatles.jpg" />
						<h2>Le coffret du mois</h2>
					</div>
					<div class="col-md-4">

						<router-link v-on:click.native="emitGenreFromHome('Nouveautés')" to="/store/vinyles/nouveautes/date-desc">
							<img src="src/assets/imgs/lalaland.jpg" />
							<h2>Sélection Nouveautés</h2>
						</router-link>
					</div>
				</div>
			</div>
		</section>
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
		<section id="originalSoundTrack">
			<router-link v-on:click.native="emitGenreFromHome('Bande Originale')" to="/store/vinyles/bande-originale/date-desc">
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
			Bus.$emit('recherche-genre', value);
		}
	},
	computed: {
		imagesBandeOriginale: function () {
			var resultatsArray = this.products;
			var filtre = "bande originale"
			var counter = 0;

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
