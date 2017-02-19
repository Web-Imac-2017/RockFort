<template>
	<div>
		<HeaderComponent></HeaderComponent>
	  	<router-view></router-view>
		<FooterComponent></FooterComponent>
	</div>
</template>

<script>
	import HeaderComponent from './components/Header.vue'
	import FooterComponent from './components/Footer.vue'

	export default {
  		components: {
  			HeaderComponent,
  			FooterComponent
  		}
	}
</script>
