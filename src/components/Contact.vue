<template>
	<transition name="fade" appear>
		<div class="container-fluid contact">
			<div id="leContact" class="row">
				<h1>Contactez-nous</h1>
			</div>
			<div class="row">
				<div class="vinyles">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12">
										<p>Pour toute question relative à l'abonnement, aux produits ou à la livraison, n'hésitez pas à nous contacter !</p>
									</div>
								</div>
								<div class="row contactForm">
									<div class="container">
										<div class="row">
							            <div class="col-md-12">
							                <div class="card">
							                  <form action="">
							                    
							                    <div class="editFacturationAdd" >
							                      <div class="row">
							                        <div class="col-md-6">
							                          <input type="text" placeholder="Nom">
							                        </div>
							                        <div class="col-md-6">
							                          <input type="text" placeholder="Prénom">
							                        </div>
							                      </div>
							                      <div class="row">
							                        <div class="col-md-6">
							                          <input type="email" placeholder="Adresse e-mail">
							                        </div>
							                        <div class="col-md-6">
							                          <input type="text" placeholder="Objet">
							                        </div>
							                      </div>
							                      <div class="row">
							                        <div class="col-md-12">
							                          <textarea type="text" rows="5" placeholder="Votre message..."></textarea>
							                        </div>
							                      </div>
							                      <div class="row">
							                        <div class="col-md-3">
							                          <button class="validate">Valider</button>
							                        </div>
							                      </div>
							                    </div>
							                  </form>
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
