import Vue from 'vue'
import VueResource from 'vue-resource'
import VueRouter from 'vue-router'

Vue.use(VueResource)
Vue.use(VueRouter)

const router = new VueRouter({
	mode: 'history',
	routes: [{
		path:'/',
		component: require('./components/Home.vue')
	}, {
		path:'/store',
		component: require('./components/Store.vue')
	}, {
		path:'/store/vinyles',
		component: require('./components/Vinyles.vue')
	}, {
		path:'/store/platines',
		component: require('./components/Platines.vue')
	}, {
		path:'/store/coffrets',
		component: require('./components/Coffrets.vue')
	}, {
		path:'/abonnement',
		component: require('./components/Abonnement.vue')
	}, {
		path:'/offrir',
		component: require('./components/Offrir.vue')
	}, {
		path:'/story/list',
		component: require('./components/StoryList.vue')
	}, {
		path:'/story/list/article',
		component: require('./components/Story.vue')
	}, {
		path:'/product',
		component: require('./components/Product.vue')
	}, {
		path:'/store/list',
		component: require('./components/ListProduct.vue')
	}, {
		path:'/random',
		component: require('./components/Random.vue')
	}, {
		path:'/panier',
		component: require('./components/Panier.vue')
	}, {
		path:'/inscription',
		component: require('./components/Inscription.vue')
	}, {
		path:'/connexion',
		component: require('./components/Connexion.vue')
	}, {
		path:'/recherche',
		component: require('./components/Recherche.vue')
	}, {
		path:'*',
		redirect: '/'
	}]
})

new Vue({
  el: '#app',
  router,
  render: h => h(require('./App.vue'))
})
