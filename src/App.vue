<template>
	<div>
		<HeaderComponent></HeaderComponent>
	  	<router-view></router-view>
		<FooterComponent></FooterComponent>
	</div>
</template>

<script>
	import { Bus } from './components/bus.js'
	import HeaderComponent from './components/Header.vue'
	import FooterComponent from './components/Footer.vue'

	export default {
  		components: {
  			HeaderComponent,
  			FooterComponent
  		},
  		data () {
  			return {
  				user: null,
            	token: null,
            	authenticated: false
  			}
  		},
  	    created () {
	        Bus.$on('userLoggedIn', (user) => {
	        	console.log("lol4")
	            this.login(user)
	        })

	        Bus.$on('userLoggedOut', () => {
	            this.logout()
	        })

	        var token = localStorage.getItem('jwt-token')
	    	console.log("token test " + token)
	        if (token !== null && token !== 'undefined') {
	        	console.log("lol6")
	            this.$http.get('/src/jsonTestUser.json').then((response) => {
	                this.login(response.json()['data'])
	            }, (response) => {
	                this.logout()
	            })
	        }
	    },
  		methods: {
	        login: function (user) {
	        		console.log("lol5")
	                this.user = user
	                this.authenticated = true
	                this.token = localStorage.getItem('jwt-token')
	                console.log("token" + this.token)
	            },

	            logout: function () {
	                this.user = null
	                this.token = null
	                this.authenticated = false
	                localStorage.removeItem('jwt-token')
	                if (this.$route.auth) this.$route.router.go('/auth/login')
	            }
	    }
	}
</script>
