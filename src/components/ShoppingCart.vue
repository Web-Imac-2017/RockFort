<template>
  <ul class="nav navbar-nav navbar-right cart">
    <li class="dropdown">
      <span class="dropdown-toggle" role="button" aria-expanded="false">
        <img src="/src/assets/imgs/cartIcon.png" style="width: 35px" alt="" class="itemImg">
        <span class="glyphicon glyphicon-shopping-cart"></span>
        {{ nbItems }} Produits<span class="caret"></span>
      </span>
      <ul class="dropdown-menu dropdown-cart" role="menu">
        <p class="cartEmpty" v-if="total == 0">Votre panier est vide :/</p>
        <div class="cartContent" v-else>
          <Item v-for="item in items" :item="item"></Item>
          <li class="divider"></li>
          <li><a class="text-center" href="">Total : {{ total }}€</a></li>
          <router-link link to="/panier">
            <li class="text-center">View Cart</li>
          </router-link>
        </div>
      </ul>
    </li>
  </ul>
</template>

<script>
import CartState from '../shoppingCartState'
import Item from './ItemCartLoop.vue'
import _ from 'lodash'

export default {
  components: {
    Item
  },
  props: ['item'],
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
      alert(this.item)
      CartState.inc(this.item)
    },
    dec() {
      CartState.dec(this.item)
    }
  }
}
</script>
