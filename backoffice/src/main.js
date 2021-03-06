import Vue from 'vue'
import VueResource from 'vue-resource'
import VueRouter from 'vue-router'

Vue.use(VueResource)
Vue.use(VueRouter)

const router = new VueRouter({
	mode: 'history',
	routes: [{
		path:'/',
		component: require('./components/Connexion.vue')
	}, {
		path:'/accueil',
		component: require('./components/Home.vue')
	}, {
		path:'/ajouter',
		component: require('./components/Ajout.vue')
	}, {
		path:'/modifier',
		component: require('./components/Modif.vue')
	}, {
		name:'modifierAlbum',
		path:'/modifierAlbum/:id',
		component: require('./components/ModifAlbum.vue')
	}, {
		name: 'modifierArticle',
		path:'/modifierArticle/:id',
		component: require('./components/ModifArticle.vue')
	}, {
		name: 'modifierCoffret',
		path:'/modifierCoffret/:id',
		component: require('./components/ModifCoffret.vue')
	}, {
		name: 'modifierPlatine',
		path:'/modifierPlatine/:id',
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
