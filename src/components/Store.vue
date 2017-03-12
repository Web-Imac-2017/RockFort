<template>
	<transition name="fade" appear>
		<div class="container-fluid storeList">
			<div id="leStore" class="row">
				<h1>Le store</h1>
			</div>
			<div class="row">
				<div class="vinyles">
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-12">
										<h2>Vinyles</h2>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<p>Fouillez, découvrez, cherchez, trouvez ! Les dernières nouveautés comme les grands classiques sont au Vinyl Store !</p>
										<h3>Nos coups de coeur : </h3>
									</div>
								</div>
								<div class="row">
									<div class="productList">
										<div class="col-md-3" v-for="product in coupDeCoeur('vinyles','coupdecoeur', 5)">
											<div class="vinyleItem">
												<router-link :to="{ name: 'product', params: { type:'vinyles' , id: product.id }}"><img :src="product.image" /></router-link>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="productContent">
									<div class="row">
										<div class="col-md-12">
											<div v-for="product in coupDeCoeur('vinyles','coupdecoeur', 1)" class="vinyleItem">
												<router-link :to="{ name: 'product', params: { type:'vinyles' , id: product.id }}"><img  :src="product.image" /></router-link>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<h4>Sélection nouveautés</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="platines">
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-12">
										<h2>Platines</h2>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<p>Pour écouter les meilleurs disques, il faut le meilleur matériel.</p>
										<h3>Nos coups de coeur : </h3>
									</div>
								</div>
								<div class="row">
									<div class="productList">
										<div class="col-md-3" v-for="product in coupDeCoeur('platines', 'coupdecoeur' , 5)">
											<div class="vinyleItem">
												<router-link :to="{ name: 'product', params: { type:'platines' , id: product.id }}"><img :src="product.image" /></router-link>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="coffrets">
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-12">
										<h2>Coffrets</h2>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<p>Retrouvez les coffrets des mois précédents.</p>
									</div>
								</div>
								<div class="row">
									<div class="productList">
										<div class="col-md-3" v-for="product in coupDeCoeur('coffrets','month', 5)">
											<div class="vinyleItem">
												<router-link :to="{ name: 'product', params: { type:'coffrets' , id: product.id }}"><img :src="product.image" /></router-link>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="productContent">
									<div class="row">
										<div class="col-md-12">
											<div v-for="product in coupDeCoeur('coffrets','month', 1)" class="vinyleItem">
												<router-link :to="{ name: 'product', params: { type:'coffrets' , id: product.id }}">
													<img :src="product.image" />
												</router-link>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<h4>Le coffret du mois</h4>
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
</template>

<script>
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
		coupDeCoeur(type, genre, limit) {
			var resultatsArray = this.products
			var filtre = [type, genre]

			resultatsArray = resultatsArray.filter(function(item){
				if(item.type.toLowerCase().indexOf(filtre[0]) !== -1 && item.genre.toLowerCase().indexOf(filtre[1]) !== -1){
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
        	else{
				return resultatsArray.slice(1,limit)
			}
		}
	}
}
</script>
