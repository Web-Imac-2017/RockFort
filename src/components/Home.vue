<template>
	<div>
		<transition name="fade" appear>
			<div class="container-fluid">
				<section id="subMenu">
					<div class="row">
						<div class="col-md-4">
							<router-link to="/store/vinyles/tout/date-desc">
								<div class="card" style="background: url('src/assets/imgs/vinyles.jpg') center no-repeat; background-size: cover;">
									<div class="cardBg"></div>
									<h2>Vinyles</h2>
								</div>
							</router-link>
						</div>
						<div class="col-md-4">
							<router-link to="/store/platines/tout/date-desc">
								<div class="card" style="background: url('src/assets/imgs/platines.jpg') center no-repeat; background-size: cover;">
									<div class="cardBg"></div>
									<h2>Platines</h2>
								</div>
							</router-link>
						</div>
						<div class="col-md-4">
							<router-link to="/store/coffrets/tout/date-desc">
								<div class="card" style="background: url('src/assets/imgs/coffrets/muse.jpg') center no-repeat; background-size: cover;">
									<div class="cardBg"></div>
									<h2>Coffrets</h2>
								</div>
							</router-link>
						</div>
					</div>
				</section>
			</div>
		</transition>
		<section id="selection">
			<div class="container">
				<div class="row">
					<div class="col-md-4" v-for="product in selectionOldies()">
						<router-link v-on:click.native="emitGenreFromHome('oldies')" to="/store/vinyles/oldies/date-desc">
							<img :src="product.image" />
							<h2>Sélection Oldies</h2>
						</router-link>
					</div>
					<div class="col-md-4" v-for="product in coffretDuMois()">
						<router-link :to="{ name: 'product', params: { type:product.type , id: product.id }}">
							<img :src="product.image" />
							<h2>Le coffret du mois</h2>
						</router-link>
					</div>
					<div class="col-md-4" v-for="product in selectionNew()">
						<router-link :to="{ name: 'product', params: { type:product.type , id: product.id }}">
							<img :src="product.image" />
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
						<router-link to="/abonnement">
							<button>Je m'abonne</button>
						</router-link>
					</div>
				</div>
			</div>
		</section>
		<section id="originalSoundTrack">
			<div class="container">
				<div class="row">
					<div class="col-md-4" v-for="product in imagesBandeOriginale(1)">
						<router-link :to="{ name: 'product', params: { type:product.type , id: product.id }}">
							<img :src="product.image" />
						</router-link>
					</div>
					<div class="ost-right col-md-8">
						<div class="row">
							<div class="col-md-12">
								<h2 class="nomargin">Les Bandes Originales</h2>
							</div>
							<div class="col-md-3" v-for="product in imagesBandeOriginale(5)">
								<router-link :to="{ name: 'product', params: { type:product.type , id: product.id }}">
									<img :src="product.image">
								</router-link>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p>Retrouvez les plus beaux moments du cinéma sur vos platines !</p>
							</div>
						</div>
					</div>
				</div>
			</div>
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
		this.$http.get('http://localhost:80/vinylestore/api/products').then((response) => {
			console.log("success", response)
			this.products = response.data
		}, (response) => {
			console.log("erreur", response)
		})
	},
	methods: {
		emitGenreFromHome(value){
			Bus.$emit('recherche-genre', value);
		},

		imagesBandeOriginale(limit) {
			var resultatsArray = this.products;
			var filtre = "bande-originale";

			resultatsArray = resultatsArray.filter(function(item){
				if(item.theme.toLowerCase().indexOf(filtre) !== -1){
					return item;
				}
			})

			resultatsArray.sort(function(a,b){
				var myA = a.date;
				var myB = b.date;
				if(myA < myB) {
					return 1;
				}
				if(myA > myB) {
					return -1;
				}
				return 0;
			})

			if(limit == 1) {
				return resultatsArray.slice(0,1)
			}
			else {
				return resultatsArray.slice(1,limit)
			}
		},

		coffretDuMois() {
			var resultatsArray = this.products;
			var filtre = ["coffrets","month"];

			resultatsArray = resultatsArray.filter(function(item){
				if(item.type.toLowerCase().indexOf(filtre[0]) !== -1 && item.theme.toLowerCase().indexOf(filtre[1]) !== -1){
					return item;
				}
			})

			resultatsArray.sort(function(a,b){
				var myA = a.date;
				var myB = b.date;
				if(myA < myB) {
					return 1;
				}
				if(myA > myB) {
					return -1;
				}
				return 0;
			})

			return resultatsArray.slice(0,1)
		},
		selectionOldies() {
			var resultatsArray = this.products;
			var filtre = ["oldies"];

			resultatsArray = resultatsArray.filter(function(item){
				if(item.theme.toLowerCase().indexOf(filtre[0]) !== -1){
					return item;
				}
			})

			resultatsArray.sort(function(a,b){
				var myA = a.date;
				var myB = b.date;
				if(myA < myB) {
					return 1;
				}
				if(myA > myB) {
					return -1;
				}
				return 0;
			})

			return resultatsArray.slice(0,1)
		},
		selectionNew() {
			var resultatsArray = this.products;
			var filtre = ["new"];

			resultatsArray = resultatsArray.filter(function(item){
				if(item.theme.toLowerCase().indexOf(filtre[0]) !== -1){
					return item;
				}
			})

			resultatsArray.sort(function(a,b){
				var myA = a.date;
				var myB = b.date;
				if(myA < myB) {
					return 1;
				}
				if(myA > myB) {
					return -1;
				}
				return 0;
			})

			return resultatsArray.slice(0,1)
		}
	}
}
</script>
