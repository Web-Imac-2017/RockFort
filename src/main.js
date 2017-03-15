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
		path:'/recherche',
		component: require('./components/ListProduct.vue')
	}, {
		path:'/store/vinyles',
		component: require('./components/ListProduct.vue')
	}, {
		name: 'store',
		path:'/store/:type/:genre/:sort',
		component: require('./components/ListProduct.vue')
	}, {
		path:'/store/platines',
		component: require('./components/ListProduct.vue')
	}, {
		path:'/store/coffrets',
		component: require('./components/ListProduct.vue')
	}, {
		name:'product',
		path:'/store/:type/:id',
		component: require('./components/ProductPage.vue')
	},
	{
		path:'/abonnement',
		component: require('./components/Abonnement.vue')
	}, {
		path:'/cartPage',
		component: require('./components/CartPage.vue')
	}, {
		name: 'storylist',
		path:'/story/:theme/:sort',
		component: require('./components/StoryList.vue')
	}, {
		name:'story',
		path:'/story/:id',
		component: require('./components/Story.vue')
	}, {
		path:'/ProductPage',
		component: require('./components/ProductPage.vue')
	}, {
		path:'/inscription',
		component: require('./components/Inscription.vue')
	}, {
<<<<<<< HEAD
=======
		path:'/connexion',
		component: require('./components/Connexion.vue')
	}, {
		path:'/contact',
		component: require('./components/Contact.vue')
	}, {
		path:'/lequipe',
		component: require('./components/Equipe.vue')
	}, {
		path:'/mentionslegales',
		component: require('./components/Mentions.vue')
	}, {
>>>>>>> 10d3e5723ed2a4054f373b73d672f38db46e7660
		path:'*',
		redirect: '/'
	}],
	scrollBehavior (to, from, savedPosition) {
		return { x: 0, y: 0 }
	}
})

new Vue({
	el: '#app',
	router,
	render: h => h(require('./App.vue'))
})
