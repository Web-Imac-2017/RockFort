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
                  <img src="/src/assets/imgs/tick.png" class="tick" alt="">  Service client au 01 02 03 04 05
                </span>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <p class="facturationAddress">Adresse de livraison</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <form action="" v-for="user in users">
                    <div class="optionDelivery">
                      <span>{{ user.firstName }} {{ user.lastName }} {{ user.zipcode }} {{ user.street }} {{ user.city }}</span><span class="right edit" @click="editDeliveryAdd">Modifier</span>
                    </div>
                    <div class="editDeliveryAdd" v-if="editDelivery">
                      <div class="row">
                        <div class="col-md-6">
                          <input type="text" v-model="user.firstName">
                        </div>
                        <div class="col-md-6">
                          <input type="text" v-model="user.lastName">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <input type="text" v-model="user.zipcode">
                        </div>
                        <div class="col-md-6">
                          <input type="text" v-model="user.city">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <input type="text" v-model="user.street">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3">
                          <div class="validate" @click="validateEdit(user)">Valider</div>
                        </div>
                        <div class="col-md-9">
                          <div class="validateAndSave" @click="validateEdit(user)">Valider et sauvegarder mes infos pour la prochaine commande</div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <p class="facturationAddress">Adresse de facturation</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <form action="" v-for="user in users">
                    <div class="optionDelivery">
                      <span>{{ user.firstName }} {{ user.lastName }} {{ user.zipcode }} {{ user.street }} {{ user.city }}</span><span class="right edit" @click="editFacturationAdd">Modifier</span>
                    </div>
                    <div class="editFacturationAdd" v-if="editFacturation">
                      <div class="row">
                        <div class="col-md-6">
                          <input type="text" v-model="user.firstName">
                        </div>
                        <div class="col-md-6">
                          <input type="text" v-model="user.lastName">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <input type="text" v-model="user.zipcode">
                        </div>
                        <div class="col-md-6">
                          <input type="text" v-model="user.city">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <input type="text" v-model="user.street">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3">
                          <div class="validate" @click="validateEdit(user)">Valider</div>
                        </div>
                        <div class="col-md-9">
                          <div class="validateAndSave" @click="validateEdit(user)">Valider et sauvegarder mes infos pour la prochaine commande</div>
                        </div>
                      </div>
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
                    <div class="optionDelivery clickable" @click="expressOn()" v-bind:class="{ active: express }">
                      <span>24h chez vous</span><span class="right">9.90€</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="optionDelivery clickable" @click="standardOn()" v-bind:class="{ active: standard }">
                      <span>48h chez vous (livraison standard)</span><span class="right">9.90€</span>
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
                    <div class="optionDelivery clickable" @click="creditCardOn()" v-bind:class="{ active: creditCard }">
                      <span>Carte bancaire</span>
                      <img src="/src/assets/imgs/creditCards.png" class="right tick" alt="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="optionDelivery clickable" @click="paypalOn()" v-bind:class="{ active: paypal }">
                      <span>Paypal</span>
                      <img src="/src/assets/imgs/paypal.png" class="right tick" alt="">
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
    </div>
  </transition>
</template>

<script>
import _ from 'lodash'
import CartState from '../shoppingCartState'

export default {
  data() {
    return {
      items: [],
      users: [],
      editDelivery: false,
      editFacturation: false,
      express: false,
      standard: false,
      creditCard: false,
      paypal: false
    }
  },
  mounted () {
    this.$items = this.$resource('/src/getCartItems.json')
    this.$items.query().then((response) => {
      this.items = response.data
    }, (response) => {
      console.log("erreur", response)
    }),

    // this.$user = this.$resource('/src/API/user{/id}')
    this.$user = this.$resource('/src/userTest.json')
    this.$user.query().then((response) => {
      this.users = response.data
    }, (response) => {
      console.log("erreur", response)
    })
  },
  methods: {
    editDeliveryAdd () {
      this.editDelivery = true
    },
    editFacturationAdd () {
      this.editFacturation = true
    },
    validateEdit (user) {
      this.$user.update({name: user.name}).then((response) => {
        this.users = response.data
        this.editDelivery = false
      }, (response) => {
        console.log('erreur')
      })
    },
    expressOn () {
      this.standard = false,
      this.express = true
    },
    standardOn () {
      this.express = false,
      this.standard = true
    },
    creditCardOn () {
      this.paypal = false,
      this.creditCard = true
    },
    paypalOn () {
      this.creditCard = false,
      this.paypal = true
    },
    addToCart () {
      CartState.add(this.item)
    },
    inc () {
      CartState.inc(this.item)
    },
    dec () {
      CartState.dec(this.item)
    }
  }
}
</script>
