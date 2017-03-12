<template>
  <div class="quantitySelector">
    <div class="col-md-6">
      <div class="row">
        <div class="incrButton" @click="increment"><img src="/src/assets/imgs/incr.png" width="35%" alt=""></div>
      </div>
      <div class="row">
        <div class="decrButton" @click="decrement"><img src="/src/assets/imgs/decr.png" width="35%" alt=""></div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="quantity">
        {{ quantity }}
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return{
      quantity: 1
    }
  },
  methods: {
    increment() {
      this.quantity++
    },
    decrement() {
      if (this.quantity > 1)
      this.quantity--
    }
  }
}
</script>
