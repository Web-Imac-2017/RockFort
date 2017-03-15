<template>
	<div id="abonnement">
		<section class="banner" style="background-image: url('/src/assets/imgs/abonnement.jpg')">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3 col-md-offset-8">
								<div class="slogan">
									<h2>La box découverte</h2>
									<p>Abonnez-vous aux meilleures des vinyles à partir de 19,00€ par mois</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								<div class="callToAction">
									<div class="row">
										<div class="col-md-6">
											<p>Faites vous plaisir, ou offrez une box à un proche !</p>
										</div>
										<div class="col-md-5 col-md-offset-1">
											<button class="scrollTo" target-id="#boxes" @click="myselfTab()">Je m'abonne</button>
											<button class="offer scrollTo" target-id="#boxes" @click="offerTab()">Je l'offre</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="description">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2>Chaque mois, c'est un vinyle dans votre boîte aux lettres</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<img src="/src/assets/imgs/boxVinyle.png" alt="">
						<p>La sélection du mois</p>
					</div>
					<div class="col-md-4">
						<img src="/src/assets/imgs/mailbox.png" alt="">
						<p>Directement dans votre boîte au lettre<br>(ou dans celle d'un ami)</p>
					</div>
					<div class="col-md-4">
						<img src="/src/assets/imgs/wowCartoon.png" alt="">
						<p>Recevez une petite surprise en souscrivant pour 12 box :)</p>
					</div>
				</div>
			</div>
		</section>
		<section id="boxes">
			<div class="container">
				<div class="row">
					<div class="col-xs-6">
						<div class="tabButton" :style="styleFormyself()" @click="changeTab()"><img src="/src/assets/imgs/box.png" alt="" style="width: 40px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Je m'abonne</div>
					</div>
					<div class="col-xs-6">
						<div class="tabButton" :style="styleOffer()" @click="changeTab()"><img src="/src/assets/imgs/gift.png" alt="" style="width: 40px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;J'offre</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<div class="boxContent">
							<div class="forMyself" v-if="forMyself">
								<div class="row">
									<div class="col-xs-12 col-md-6">
										<div class="boxChoice" @click="box1On()" v-bind:class="{ 'active': box1 }">
											<h2>1 mois - 19€</h2>
											<p>
												1 box découverte
											</p>
										</div>
									</div>
									<div class="col-xs-12 col-md-6">
										<div class="boxChoice" @click="box2On()" v-bind:class="{ 'active': box2 }">
											<h2>12 mois - 150€</h2>
											<p>
												1 box découverte par mois + une affiche surprise
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="offer" v-if="offer">
								<div class="row">
									<div class="col-xs-12">
										<div class="info">
											<h2>Tous les cadeaux sont emballés par nos soins. La facture sera envoyée sur votre adresse mail.</h2>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-md-4">
										<div class="boxChoice" @click="box3On()" v-bind:class="{ 'active': box3 }">
											<h2>1 mois - 19€</h2>
											<p>
												1 box
											</p>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="boxChoice" @click="box4On()" v-bind:class="{ 'active': box4 }">
											<h2>3 mois - 55€</h2>
											<p>
												3 box
											</p>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="boxChoice" @click="box5On()" v-bind:class="{ 'active': box5 }">
											<h2>12 mois - 150€</h2>
											<p>
												12 box + une affiche surprise
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</template>

<script>
export default{
	data() {
		return {
			forMyself: true,
			offer: false,
			box1: false,
			box2: false,
			box3: false,
			box4: false,
			box5: false
		}
	},
	methods: {
		myselfTab () {
			this.forMyself = true,
			this.offer = false
		},
		offerTab () {
			this.forMyself = false,
			this.offer = true
		},
		changeTab () {
			this.forMyself = !this.forMyself,
			this.offer = !this.offer
		},
		styleFormyself () {
			if(this.forMyself)
			return{background : 'white'}
			else
			return {background:'rgb(245, 245, 245)'}
		},
		styleOffer () {
			if(this.offer)
			return{background : 'white'}
			else
			return {background:'rgb(245, 245, 245)'}
		},
		box1On () {
			this.box1 = true,
			this.box2 = false,
			this.box3 = false,
			this.box4 = false,
			this.box5 = false
		},
		box2On () {
			this.box1 = false,
			this.box2 = true,
			this.box3 = false,
			this.box4 = false,
			this.box5 = false
		},
		box3On () {
			this.box1 = false,
			this.box2 = false,
			this.box3 = true,
			this.box4 = false,
			this.box5 = false
		},
		box4On () {
			this.box1 = false,
			this.box2 = false,
			this.box3 = false,
			this.box4 = true,
			this.box5 = false
		},
		box5On () {
			this.box1 = false,
			this.box2 = false,
			this.box3 = false,
			this.box4 = false,
			this.box5 = true
		}
	}
}
</script>
