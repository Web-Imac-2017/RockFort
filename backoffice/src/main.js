import Vue from 'vue'
import VueResource from 'vue-resource'
import VueRouter from 'vue-router'

Vue.use(VueResource)
Vue.use(VueRouter)

const router = new VueRouter({
	mode: 'history',
	routes: [{
		path:'/accueil',
		component: require('./components/Home.vue')
	}, {
		path:'/ajouter',
		component: require('./components/Ajout.vue')
	}, {
		path:'/modifier',
		component: require('./components/Modif.vue')
	}, {
		path:'/modifierAlbum',
		component: require('./components/ModifAlbum.vue')
	}, {
		path:'/modifierArticle',
		component: require('./components/ModifArticle.vue')
	}, {
		path:'/modifierCoffret',
		component: require('./components/ModifCoffret.vue')
	}, {
		path:'/modifierPlatine',
		component: require('./components/ModifPlatine.vue')
	}, {
		path:'/supprimer',
		component: require('./components/Suppression.vue')
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
