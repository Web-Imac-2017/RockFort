<template>
  <transition name="fade" appear>
    <div id="listProduct" >
      <div class="container-fluid storeList">
        <div id="lesDisques" class="row">
          <h1>Disques</h1>
        </div>
        <div class="row">
          <SearchBarComponent></SearchBarComponent>
        </div>
      </div>
      <div class="container listContainer">
        <div class="row">
          <product v-for="product in products" :product="product"></product>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>
import SearchBarComponent from './SearchBar.vue'
import Product from './ProductsLoop.vue'

export default{
  components: {
    SearchBarComponent,
    Product
  },
  created() {
    var dummy = [
      {id: 1, vinylTitle: 'Vinyle 1', bandName:"The beatles - 1969", price: 40, img:"AbbeyRoad.jpg"},
      {id: 2, vinylTitle: 'Vinyle 2', bandName:"The beatles - 1969", price: 10, img:"bowie.jpg"},
      {id: 3, vinylTitle: 'Vinyle 3', bandName:"The beatles - 1969", price: 25, img:"doors.jpg"},
      {id: 4, vinylTitle: 'Vinyle 4', bandName:"The beatles - 1969", price: 30, img:"SgtPepper.jpg"},
      {id: 5, vinylTitle: 'Vinyle 5', bandName:"The beatles - 1969", price: 40, img:"velvetandnico.jpg"},
      {id: 6, vinylTitle: 'Vinyle 6', bandName:"The beatles - 1969", price: 10, img:"StonesBlueandLonesome.jpg"},
      {id: 7, vinylTitle: 'Vinyle 7', bandName:"The beatles - 1969", price: 25, img:"AbbeyRoad.jpg"},
      {id: 8, vinylTitle: 'Vinyle 8', bandName:"The beatles - 1969", price: 30, img:"AbbeyRoad.jpg"}
    ];
    this.products = dummy
  },
  data() {
    return {
      products: []
    }
  }
}
</script>
