<template>
			<div class="sortBar mb">
	          <div class="container">
	            <div class="row">
	              <div class="col-md-3">
	                <select name="sortBy">
	                  <option value="default" selected>Trier par</option>
	                  <option value="date">Date de sortie</option>
	                  <option value="price">Prix</option>
	                  <option value="alphabet">Ordre alphabétique</option>
	                </select>
	              </div>
	              <div class="col-md-3">
	                <select name="genre">
	                  <option value="default" selected>Genre</option>
	                  <option value="date">Rock</option>
	                  <option value="price">Prix</option>
	                  <option value="alphabet">Ordre alphabétique</option>
	                </select>
	              </div>
	              <div class="col-md-3">
	                <form class="right" action="/search">
	                  <input type="text" placeholder="rechercher un vinyle" />
	                </form>
	              </div>
	              <div class="col-md-3">
	                <button class="random">random</button>
	              </div>
	            </div>
	          </div>
	        </div>
</template>

<script>
	export default{

	}
</script>