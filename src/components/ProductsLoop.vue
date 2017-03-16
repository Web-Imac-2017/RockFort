<template>
  <div class="product">
    <div class="col-md-3 col-xs-6">
      <div class="vinyleItem">
        <router-link :to="{ name: 'product', params: { type:product.type , id: product.id }}"><img :src="product.image" /></router-link>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p class="vinylTitle">{{product.nom}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p class="bandName">{{ product.auteur }} - {{ product.date.substring(0,4) }}  </p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-xs-8" v-if="qtyInCart == 0">
          <button class="addToCart" @click="addToCart">
            Ajouter au panier
          </button>
        </div>

        <div class="controls" v-else>
          <div class="col-md-3 col-xs-3">
            <button class="inc" @click="inc">+</button>
          </div>
          <div class="col-md-3 col-xs-3">
            <button class="dec" @click="dec">-</button>
          </div>
        </div>
        <div class="col-md-2 col-xs-2">
          <p class="price"><span v-if="qtyInCart != 0">{{qtyInCart }}x</span>{{ product.prix }}€</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Bus } from './bus.js'
import _ from 'lodash'
import CartState from '../shoppingCartState'

export default {
  props: ['product'],
  data() {
    return {
      shared: CartState.data
    }
  },
  methods: {
    addToCart() {
      CartState.add(this.product)
    },
    inc() {
      CartState.inc(this.product)
    },
    dec() {
      CartState.dec(this.product)
    },
    handleScroll(){
      Bus.$emit('scroll-position', window.scrollY);
    }
  },
  computed: {
    qtyInCart() {
      var occurence = _.find(this.shared.cart, ['id', this.product.id])
      if (typeof occurence == 'object') {
        return occurence.qty
      }
      else {
        return 0
      }
    }
  },
  destroyed () {
    window.removeEventListener('scroll', this.handleScroll);
  }
}
</script>
