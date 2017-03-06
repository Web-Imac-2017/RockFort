<template>
	<transition name="fade" appear>
		<div id="basket" >
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h3>Finaliser ma commande !</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<p>Adresse de livraison</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="card delivery">
							<form action="">
								<div class="optionAdress">
									<input type="radio" name="delivery" value="defaultDelivery"><span>Prénom Nom et adresse de livraison</span><br>
								</div>
								<div class="optionAdress">
									<input type="radio" name="delivery" value="other"><span>Ajouter une adresse</span>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
				</div>
			</div>
		</div>
	</transition>
</template>

<script>
export default{

}
</script>
