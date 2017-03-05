<template>
  <li>
    <span class="item">
      <span class="item-left">
        <img :src="'/src/assets/imgs/' + item.img" alt="" class="itemImg">
        <span class="item-info">
          <span>{{ item.vinylTitle }}</span>
          <span>{{ item.qty }} x {{ item.price }}€</span>
        </span>
      </span>
      <span class="item-right">
        <button class="inc" @click="inc">+</button>
        <button class="dec" @click="dec">-</button>
      </span>
    </span>
  </li>
</template>

<script>
import _ from 'lodash'
import CartState from '../shoppingCartState'

export default {
  props: ['item'],
  data() {
    return {
      shared: CartState.data
    }
  },
  methods: {
    addToCart() {
      CartState.add(this.item)
    },
    inc() {
      CartState.inc(this.item)
    },
    dec() {
      CartState.dec(this.item)
    }
  }
}
</script>
