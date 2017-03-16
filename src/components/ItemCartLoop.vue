<template>
  <li>
    <span class="item">
      <span class="item-left">
        <img :src="item.img" alt="" class="itemImg">
        <span class="item-info">
          <span class="title">{{ item.productTitle }}</span>
          <span class="qty">{{ item.qty }} x {{ item.price }}€</span>
        </span>
      </span>
      <span class="item-right">
        <button class="inc" @click="inc">+</button>
        <button class="dec" @click="dec">-</button>
        <button class="del" @click="del"><img src="/src/assets/imgs/delete.png" alt=""></button>
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
    },
    del() {
      CartState.del(this.item)
    }
  }
}
</script>
