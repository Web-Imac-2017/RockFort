<template>
	<transition name="fade" appear>
		<div id="productPage" >
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="row">
							<div class="col-md-6">
								<img class="vinyleImg" src="src/assets/imgs/AbbeyRoad.jpg" />
							</div>
							<div class="col-md-6">
								<h1 class="vinyleTitle">Abbey Road</h1>
								<h4 class="bandName">The Beatles - 1969</h4>
								<div class="row">
									<div class="col-md-4">
										<div class="price">20€</div>
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
									Paul McCartney, au nom de tout le groupe, contacte le producteur George Martin pour lui proposer d'enregistrer un album « comme avant ». Le 20 août 1969, les quatre Beatles sont réunis pour la toute dernière fois dans les studios EMI qui seront plus tard renommés Abbey Road.
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p class="more">Vous aimerez aussi</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="vinyleItem">
									<a href="#"><img src="src/assets/imgs/bowie.jpg" /></a>
								</div>
							</div>
							<div class="col-md-3">
								<div class="vinyleItem">
									<a href="#"><img src="src/assets/imgs/SgtPepper.jpg" /></a>
								</div>
							</div>
							<div class="col-md-3">
								<div class="vinyleItem">
									<a href="#"><img src="src/assets/imgs/StonesBlueandLonesome.jpg" /></a>
								</div>
							</div>
							<div class="col-md-3">
								<div class="vinyleItem">
									<a href="#"><img src="src/assets/imgs/doors.jpg" /></a>
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
}
</script>
