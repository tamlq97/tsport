<template>
  <v-container>
    <v-layout row wrap>
      <v-flex v-if="cart.length > 0">
        <h3>Your cart</h3>
        <v-simple-table>
          <template #default>
            <thead>
              <tr>
                <!-- <th>Product Code</th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Color</th>
              <th>Size</th>
              <th>Image</th>
                <th>Action</th>-->
                <th>Item</th>
                <th>Quantity</th>
                <th>SubTotal</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(prod,k) in cart" :key="k">
                <td>
                  <div class="d-flex">
                    <div class="mr-3">
                      <v-img
                        max-width="90"
                        contain
                        height="125"
                        :alt="prod.slug"
                        @click="$router.push({name:'product',params:{
                                cate_type:prod.categories[0].parent.name,
                                name:prod.slug+'-'+prod.color.name+'-'+prod.id
                            }})"
                        :src="
                            prod.color.pictures[0].src.includes('//')
                            ? 'http'+prod.color.pictures[0].src
                            : prod.imgLink+'/colors/'+prod.color.id+'/'+prod.color.pictures[0].type+'/'+prod.color.pictures.src
                            "
                      />
                    </div>
                    <div>
                      <v-list-item-title class="text-wrap" v-html="prod.product_name"></v-list-item-title>
                      <v-list-item-subtitle class="body-2">{{prod.color.sizes.name}}</v-list-item-subtitle>
                      <v-list-item-subtitle class="body-2 mb-2">${{prod.product_price}} USD</v-list-item-subtitle>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="d-flex">
                    <v-btn @click="descCartItem(prod)" class="mr-1">-</v-btn>
                    <div :style="$vuetify.breakpoint.smAndDown ? 'width:100%' : 'width:10%'">
                      <v-text-field
                        @change="checkQuantity(prod)"
                        class="p-0"
                        @input="changeCartItemQuantity(prod)"
                        v-model="prod.color.sizes.quantity"
                        type="number"
                        min="1"
                        :value="prod.color.sizes.quantity"
                      ></v-text-field>
                    </div>
                    <v-btn class="ml-1 mb-2" @click="incCartItem(prod)">+</v-btn>
                    <v-btn class="ml-2" @click="removeCartItem(prod)">Remove</v-btn>
                  </div>
                </td>
                <td>${{prod.product_price * prod.color.sizes.quantity}} USD</td>
                <!-- <td>{{order.prodCode}}</td>
              <td>{{order.prodName}}</td>
              <td>{{order.prodPrice}}</td>
              <td>{{order.quantity}}</td>
              <td>{{order.color}}</td>
              <td>{{order.size}}</td>
              <td>
                <img :src="order.image" />
                </td>-->
              </tr>
              <tr>
                <td>
                  <router-link :to="{name:'collection'}" class='headline'>Continues shopping</router-link>
                </td>
                <td  class='headline'>Total</td>
                <td  class='headline'>${{totalCartPrice}} USD</td>
              </tr>
            </tbody>
          </template>
        </v-simple-table>
        <br />
        <div class="text-right">
          <p>FREE STANDARD SHIPPING WHEN YOU SPEND $75</p>
          <v-btn
            color="primary"
            :disabled="totalCartPrice > 0 ? false : true"
            @click="gotoCart"
            :style="$vuetify.breakpoint.smAndDown ? 'width:100%' : 'width:20%'"
          >Checkout</v-btn>
        </div>
      </v-flex>
      <v-flex v-if="cart.length <= 0">
        <h1>
          Your cart is empty.
          <router-link :to="{name:'collection'}">Continues shopping</router-link>
        </h1>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      orders: [],
      cart: [],
      totalCartPrice: 0,
      badge: 0
    };
  },
  created() {
    this.viewCart();
    // this.fetchOrdersByUserID(this.$root["user"]["id"]);
  },
  methods: {
    async fetchOrdersByUserID(uid) {
      let {
        data: { orders }
      } = await this.$store.dispatch("OrderIndex/fetchOrdersByUserID", uid);
      this.orders = orders;
    },
    confirmUpdateOrDelete(product, type = "delete") {
      if (type == "delete") {
        this.$swal({
          title: "Are you sure?",
          text: `You won't revert this action!`,
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Delete",
          confirmButtonColor: "#dd4b39",
          focusCancel: true,
          reverseButtons: true
        }).then(result => {
          if (result.value) {
            this.cart.splice(this.cart[this.getIndexCartItem(product)], 1);
            this.$awn.success("Your cart item has been deleted.");
            this.setCart();
          }
        });
      }
      if (type == "update") {
        this.$swal({
          title: "Are you sure?",
          text: `Change quantity less than 1 will be delete!`,
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Delete",
          confirmButtonColor: "#dd4b39",
          focusCancel: true,
          reverseButtons: true
        }).then(result => {
          if (result.value) {
            this.cart.splice(this.cart[this.getIndexCartItem(product)], 1);
            console.log(this.cart.length);
            this.$awn.success("Your cart item has been deleted.");
            this.setCart();
          }
        });
      }
    },
    descCartItem(prod) {
      if (prod.color.sizes.quantity - 1 <= 0) {
        this.confirmUpdateOrDelete(prod, "update");
      } else {
        this.cart[this.getIndexCartItem(prod)].color.sizes.quantity--;
        this.setCart();
      }
    },
    changeCartItemQuantity(prod) {
      if (prod.color.sizes.quantity > 0) {
        this.cart[this.getIndexCartItem(prod)].color.sizes.quantity =
          prod.color.sizes.quantity;
        this.setCart();
      }
    },
    incCartItem(prod) {
      this.cart[this.getIndexCartItem(prod)].color.sizes.quantity++;
      this.setCart();
    },
    getIndexCartItem(product) {
      return this.cart.findIndex(
        prod =>
          prod.id == product.id &&
          prod.color.name == product.color.name &&
          prod.color.sizes.name == product.color.sizes.name
      );
    },
    removeCartItem(prod) {
      this.confirmUpdateOrDelete(prod);
    },
    checkQuantity(prod) {
      if (prod.color.sizes.quantity < 1) {
        this.confirmUpdateOrDelete(prod, "update");
      }
    },
    viewCart() {
      if (localStorage.cart) {
        this.cart = JSON.parse(localStorage.cart);
        this.totalCartPrice = this.cart.reduce((total, item) => {
          return total + item.product_price * item.color.sizes.quantity;
        }, 0);
        this.badge = this.cart.length;
      }
    },
    gotoCart() {
      if (sessionStorage.userLoggedIn) {
        if (this.$route.name != "cart-checkout") {
          this.$router.push({ name: "cart-checkout" });
        }
      } else this.$router.push({ name: "login" });
    },
    setCart() {
      localStorage.setItem("cart", JSON.stringify(this.cart));
      this.$eventHub.$emit("viewCart");
      this.viewCart();
    }
  }
};
</script>

<style>
</style>