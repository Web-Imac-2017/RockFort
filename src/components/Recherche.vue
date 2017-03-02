<template>
	<div id="Recherche" >
		<div class="container-fluid storeList">
     		<div id="rechercheHeader" class="row">
        		<h1>Recherche</h1>
      		</div>
      	</div>
      	
	    <SearchBarComponent></SearchBarComponent>
        
      	<div class="container">
      		<h2>XX résultats pour votre recherche : Lorem Ipsum</h2>
      		<hr />
      		<a href="#">
      		<div class="result col-md-4">
      			<img src="/src/assets/imgs/AbbeyRoad.jpg" />
      			<h2>Lorem Ipsum</h2>
      		</div>
      		</a>
      		<a href="#">
      		<div class="result col-md-4">
      			<img src="/src/assets/imgs/AbbeyRoad.jpg" />
      			<h2>Lorem Ipsum</h2>
      		</div>
      		</a>
      		<a href="#">
      		<div class="result col-md-4">
      			<img src="/src/assets/imgs/AbbeyRoad.jpg" />
      			<h2>Lorem Ipsum</h2>
      		</div>
      		</a>
      		<a href="#">
      		<div class="result col-md-4">
      			<img src="/src/assets/imgs/AbbeyRoad.jpg" />
      			<h2>Lorem Ipsum</h2>
      		</div>
      		</a>
      		<a href="#">
      		<div class="result col-md-4">
      			<img src="/src/assets/imgs/AbbeyRoad.jpg" />
      			<h2>Lorem Ipsum</h2>
      		</div>
      		</a>
      		<a href="#">
      		<div class="result col-md-4">
      			<img src="/src/assets/imgs/AbbeyRoad.jpg" />
      			<h2>Lorem Ipsum</h2>
      		</div>
      		</a>
      		<a href="#">
      		<div class="result col-md-4">
      			<img src="/src/assets/imgs/AbbeyRoad.jpg" />
      			<h2>Lorem Ipsum</h2>
      		</div>
      		</a>
      		<a href="#">
      		<div class="result col-md-4">
      			<img src="/src/assets/imgs/AbbeyRoad.jpg" />
      			<h2>Lorem Ipsum</h2>
      		</div>
      		</a>
      		<a href="#">
      		<div class="result col-md-4">
      			<img src="/src/assets/imgs/AbbeyRoad.jpg" />
      			<h2>Lorem Ipsum</h2>
      		</div>
      		</a>
      	</div>
    </div>
</template>

<script>
	import SearchBarComponent from './SearchBar.vue'
	export default{
		components: {
  			SearchBarComponent
  		}
	}
</script>