import ShoppingCart from './components/ShoppingCart.vue'

export default {
  data: {
    cart: [],
  },
  watch: {
    nbItems: function() {
      ShoppingCart.update()
    }
  },
  add(product){
    var occurence = _.find(this.data.cart, ['id', product.id])
    if (typeof occurence != 'object') {
      this.data.cart.push({
        id: product.id,
        vinylTitle: product.nom,
        price: product.prix,
        img: product.image,
        qty: 1
      })
    }
  },
  inc(product){
    var occurence = _.find(this.data.cart, ['id', product.id])
    if (typeof occurence == 'object') {
      var index = _.indexOf(this.data.cart, occurence)
      this.data.cart[index].qty++
    }
  },
  dec(product){
    var occurence = _.find(this.data.cart, ['id', product.id])
    if (typeof occurence == 'object') {
      var index = _.indexOf(this.data.cart, occurence)
      if (this.data.cart[index].qty == 1)
        this.data.cart.splice(index,1)
      else
        this.data.cart[index].qty--
    }
  }
}
