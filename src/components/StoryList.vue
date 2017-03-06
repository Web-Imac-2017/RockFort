<template>
	<div id="storyList" >
    	<div class="container-fluid storeList">
     		<div id="storyListHeader" class="row">
        		<h1>La Story</h1>
      		</div>
      	</div>
      	<div class="container">
      		<div class="row">
      			<router-link to="/story/list/article">
      			<div class="col-md-push-2 col-md-8">
      				<div class="imageArticle">
      					<img src="/src/assets/imgs/img_article.jpg" />
      				</div>
      				<h2>Lorem ipsum</h2>
      				<p>01-01-2017</p>
      				<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      				</p>
      			</div>
      			</router-link>
      		</div>
    </div>
</template>

<script>
	export default{

	}
</script>