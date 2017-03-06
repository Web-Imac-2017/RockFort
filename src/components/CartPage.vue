<template>
  <transition name="fade" appear>
    <div id="cartPage" >
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-12">
                <h3 class="finalise">Finaliser ma commande !</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <span class="assurance">
                  <img src="/src/assets/imgs/tick.png" class="tick" alt="">  Expédition garantie anti-casse
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <img src="/src/assets/imgs/tick.png" class="tick" alt="">  Service client au 01 02 03 04 05</span>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <p class="deliveryAddress">Adresse de livraison</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <form action="">
                      <div class="optionDelivery">
                        <input type="radio" name="delivery" value="defaultDelivery"><span>Prénom Nom et adresse de livraison</span><br>
                      </div>
                      <div class="optionDelivery">
                        <input type="radio" name="delivery" value="other"><span>Ajouter une adresse</span>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <p class="deliveryMode">Mode de livraison</p>
                </div>
              </div>
              <div class="row">
                <div class="card">
                  <form action="">
                    <div class="col-md-6">
                      <div class="optionDelivery">
                        <input type="radio" name="delivery" value="defaultDelivery"><span>24h chez vous</span><span class="right">9.90€</span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="optionDelivery">
                        <input type="radio" name="delivery" value="defaultDelivery"><span>48h chez vous (livraison standard)</span><span class="right">9.90€</span>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <p class="deliveryPayment">Mode de paiement</p>
                </div>
              </div>
              <div class="row">
                <div class="card">
                  <form action="">
                    <div class="col-md-6">
                      <div class="optionDelivery">
                        <input type="radio" name="delivery" value="defaultDelivery"><span>Carte bancaire</span><span class="right"><img src="/src/assets/imgs/creditCards.png" class="tick" alt=""></span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="optionDelivery">
                        <input type="radio" name="delivery" value="defaultDelivery"><span>Paypal</span><span class="right"><img src="/src/assets/imgs/paypal.png" class="tick" alt=""></span>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="purchase">
                    <button class="validate">Valider la commande</button>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-md-4">
              <div class="basket">
                <div class="row">
                  <div class="col-md-12">
                    <h3>Mon panier</h3>
                  </div>
                </div>
                <div class="item" v-for="item in items">
                  <div class="content">
                    <div class="row">
                      <div class="col-md-3"><img :src="item.img" alt="" style="width:100%" class="itemImg"></div>
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-12"><p class="title">{{ item.vinylTitle }}</p></div>
                        </div>
                        <div class="row ">
                          <div class="col-md-4">{{ item.qty }} x {{ item.price }}€</div>
                          <div class="col-md-4">
                            <button class="inc" @click="inc">+</button>
                            <button class="dec" @click="dec">-</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </template>

    <script>
    import _ from 'lodash'
    import CartState from '../shoppingCartState'

    export default {
      props: ['item'],
      data() {
        return {
          items: []
        }
      },
      mounted () {
        this.$http.get('/src/getCartItems.json').then((response) => {
          console.log("success", response)
          this.items = response.data
        }, (response) => {
          console.log("erreur", response)
        })
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
