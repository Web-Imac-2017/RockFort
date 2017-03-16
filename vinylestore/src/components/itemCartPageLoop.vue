<template>
  <div class="itemCard">
    <div class="row">
      <div class="col-md-5">
        <img :src="item.img" alt="" class="itemImg">
      </div>
      <div class="col-md-7">
        <div class="row">
          <div class="col-md-12">
            <span class="title">{{ item.vinylTitle }}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <span class="qty">{{ item.qty }} x {{ item.price }}€</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <span class="item-right">
              <button class="inc" @click="inc">+</button>
              <button class="dec" @click="dec">-</button>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>

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
