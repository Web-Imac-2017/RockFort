<template>
  <div class="product">
    <div class="col-md-3">
                <div class="vinyleItem">
                  <router-link link to="/vinyle/resultat.nom"><img :src="product.image" /></router-link>
                </div>
                <p class="vinylTitle">{{product.nom}}</p>
                <p class="bandName">{{ product.auteur }} - {{ product.date.substring(0,4) }}  </p>
                <div class="row">
                  <div class="col-md-6" v-if="qtyInCart == 0">
                    <button class="addToCart" @click="addToCart">
                      Ajouter au panier
                    </button>
                  </div>
                  <div class="controls" v-else>
                    <div class="col-md-3">
                      <button class="inc" @click="inc">+</button>
                    </div>
                    <div class="col-md-3">
                      <button class="dec" @click="dec">-</button>
                    </div>
                  </div>
                  <div class="col-md-4 col-md-offset-2">
                    <p class="price">{{ product.prix }}€</p>
                  </div>
                </div>
    </div>
  </div>
</template>

<script>
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
}
</script>
