import Vue from 'vue'
import VueRouter from 'vue-router'

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
		path:'/story',
		component: require('./components/Story.vue')
	}, {
		path:'/basket',
		component: require('./components/Basket.vue')
	}, {
		path:'/login',
		component: require('./components/Login.vue')
	}, {
		path:'/product',
		component: require('./components/Product.vue')
	}, {
		path:'/search',
		component: require('./components/Search.vue')
	}, {
		path:'/random',
		component: require('./components/Random.vue')
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
