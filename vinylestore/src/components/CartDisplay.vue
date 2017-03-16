<template>
  <span class="cart">
    <div class="row">
      <div class="col-md-12">
        <p class="nbProducts">{{ nbItems }} Produits</p>
      </div>
    </div>
    <p class="cartEmpty" v-if="total == 0">Votre panier est vide :/</p>
    <div class="cartContent" v-else>
      <Item v-for="item in items" :item="item"></Item>
      <p class="text-center" href="">Total : {{ total }}€</p>
    </div>
  </span>
</template>

<script>
import CartState from '../shoppingCartState'
import Item from './ItemCartPageLoop.vue'
import _ from 'lodash'

export default {
  components: {
    Item
  },
  data() {
    return {
      items: CartState.data.cart
    }
  },
  computed: {
    total() {
      return _.sumBy(this.items, function(item) {
        return (item.qty * item.price)
      })
    },
    nbItems() {
      return _.sumBy(this.items, function(item) {
        return item.qty
      })
    }
  },
  methods: {
    inc() {
      CartState.inc(this.item)
    },
    dec() {
      CartState.dec(this.item)
    }
  }
}
</script>
