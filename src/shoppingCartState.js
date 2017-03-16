import ShoppingCart from './components/ShoppingCart.vue'
import CartDisplay from './components/CartDisplay.vue'

export default {
  data: {
    cart: []
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
        productTitle: product.nom,
        price: product.prix,
        img: product.image,
        qty: 1
      })
    }
  },
  addMultiple(product, quantity){
    console.log(product.id);
    var occurence = _.find(this.data.cart, ['id', product.id])
    if (typeof occurence != 'object') {
      this.data.cart.push({
        id: product.id,
        productTitle: product.nom,
        price: product.prix,
        img: product.image,
        qty: quantity
      })
    }else{
      var index = _.indexOf(this.data.cart, occurence)
      this.data.cart[index].qty = this.data.cart[index].qty + quantity
    }
  },
  addBox(type){
    var occurence = _.find(this.data.cart, ['productTitle', type])
    if (typeof occurence != 'object') {
      var priceBox = ''
      switch (type) {
        case "Abonnement 1 mois":
        priceBox = 19
        break;
        case "Abonnement 12 mois":
        priceBox = 150
        break;
        case "Vous offrez 1 mois d'abonnement":
        priceBox = 19
        break;
        case "box4":
        priceBox = 55
        break;
        case "box5":
        priceBox = 150
        break;
        default:
        priceBox = 150
      }
      this.data.cart.push({
        productTitle: type,
        price: priceBox,
        img: "src/assets/imgs/box.png",
        qty: 1
      })
    }else{
      var index = _.indexOf(this.data.cart, occurence)
      this.data.cart[index].qty++
    }
  },
  inc(product){
    if(product.id){
      var occurence = _.find(this.data.cart, ['id', product.id])
      if (typeof occurence == 'object') {
        var index = _.indexOf(this.data.cart, occurence)
        this.data.cart[index].qty++
      }
    }
    else{
      var occurence = _.find(this.data.cart, ['productTitle', product.productTitle])
      if (typeof occurence == 'object') {
        var index = _.indexOf(this.data.cart, occurence)
        this.data.cart[index].qty++
      }
    }
  },
  dec(product){
    if(product.id){
      var occurence = _.find(this.data.cart, ['id', product.id])
      if (typeof occurence == 'object') {
        var index = _.indexOf(this.data.cart, occurence)
        if (this.data.cart[index].qty == 1)
        this.data.cart.splice(index,1)
        else
        this.data.cart[index].qty--
      }
    }
    else{
      var occurence = _.find(this.data.cart, ['productTitle', product.productTitle])
      if (typeof occurence == 'object') {
        var index = _.indexOf(this.data.cart, occurence)
        if (this.data.cart[index].qty == 1)
        this.data.cart.splice(index,1)
        else
        this.data.cart[index].qty--
      }
    }
  },
  del (product) {
    if(product.id){
      var occurence = _.find(this.data.cart, ['id', product.id])
      if (typeof occurence == 'object') {
        var index = _.indexOf(this.data.cart, occurence)
        this.data.cart.splice(index,1)
      }
    }
    else{
      var occurence = _.find(this.data.cart, ['productTitle', product.productTitle])
      if (typeof occurence == 'object') {
        var index = _.indexOf(this.data.cart, occurence)
        this.data.cart.splice(index,1)
      }
    }
  }
}
