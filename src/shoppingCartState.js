import ShoppingCart from './components/ShoppingCart.vue'
import CartDisplay from './components/CartDisplay.vue'

export default {
  data: {
    cart: [
      {id:4,vinylTitle:"The microphones",price: 5,img:"/src/assets/imgs/bowie.jpg",qty: 1},
      {id:5,vinylTitle:"The microphones",price: 5,img:"/src/assets/imgs/bowie.jpg",qty: 1}
    ]
  },
  watch: {
    nbItems: function() {
      ShoppingCart.update(),
      CartDisplay.update()
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
  addMultiple(product, quantity){
    var occurence = _.find(this.data.cart, ['id', product.id])
    if (typeof occurence != 'object') {
      this.data.cart.push({
        id: product.id,
        vinylTitle: product.nom,
        price: product.prix,
        img: product.image,
        qty: quantity
      })
    }else{
      var index = _.indexOf(this.data.cart, occurence)
      this.data.cart[index].qty = this.data.cart[index].qty + quantity
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
