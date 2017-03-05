<template>
  <ul class="nav navbar-nav navbar-right cart">
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-shopping-cart"></span> {{ nbItems }} - Items<span class="caret"></span></a>
      <ul class="dropdown-menu dropdown-cart" role="menu">
        <p class="cartEmpty" v-if="total == 0">Your shopping cart is empty</p>
        <div class="cartContent" v-else>
          <li v-for="item in items">
            <span class="item">
              <span class="item-left">
                <img src="/src/assets/imgs/AbbeyRoad.jpg" alt="" class="itemImg">
                <span class="item-info">
                  <span>{{ item.vinylTitle }}</span>
                  <span>{{ item.qty }} x {{ item.price }}€</span>
                </span>
              </span>
            </span>
          </li>
          <li class="divider"></li>
          <li><a class="text-center" href="">Total : {{ total }}€</a></li>
          <li><a class="text-center" href="">View Cart</a></li>
        </div>
      </ul>
    </li>
    <!-- <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-shopping-cart"></span> <span>{{ nbItems }} - Items</span><span class="caret"></span></a>
    <ul class="dropdown-menu dropdown-cart" role="menu">
    <p class="cartEmpty" v-if="total == 0">Your shopping cart is empty</p>
    <div class="cartContent" v-else>
    <li class="item" v-for="item in items">
    <div class="test">
    <div class="col-md-6">
    <img src="/src/assets/imgs/AbbeyRoad.jpg" alt="" class="itemImg">
  </div>
  <div class="col-md-6">
  <div class="row">
  <div class="col-md-12">
  <p class="itemTitle">{{ item.vinylTitle }}</p>
</div>
</div>
<div class="row">
<div class="col-md-6">
<span>x{{ item.qty }}</span>
</div>
<div class="col-md-6">
<span class="right">{{ item.qty * item.price }}€</span>
</div>
</div>
</div>
</div>
</li>
<hr>
<div class="cartTotal">
<span>Total</span>
<span class="right">{{ total }} €</span>
</div>
<a class="text-center" href="">View Cart</a>
</div>
</ul>
</li> -->
</ul>
</template>

<script>
import CartState from '../shoppingCartState'
import _ from 'lodash'

export default {
  props: ['shoppingCart'],
  data() {
    return {
      items: CartState.data.cart,
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
  }
}
</script>
