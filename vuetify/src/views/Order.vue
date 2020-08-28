<template>
  <v-container>
    <v-row v-if="customer">
      <v-col sm="12" md="6" lg="6">
        <v-row>
          <v-breadcrumbs>
            <v-breadcrumbs-item
              class="headline"
              @click="step = 0"
              :disabled="step != 0 ? true : false"
            >Information</v-breadcrumbs-item>

            <v-breadcrumbs-divider>
              <v-icon>mdi-arrow-right</v-icon>
            </v-breadcrumbs-divider>
            <v-breadcrumbs-item
              class="headline"
              @click="step = 1"
              :disabled="step != 1 ? true : false"
            >Shipping</v-breadcrumbs-item>
            <v-breadcrumbs-divider>
              <v-icon>mdi-arrow-right</v-icon>
            </v-breadcrumbs-divider>
            <v-breadcrumbs-item
              class="headline"
              @click="step = 2"
              :disabled="step != 2 ? true : false"
            >Payment</v-breadcrumbs-item>
          </v-breadcrumbs>
        </v-row>
        <validation-observer v-if="step == 0" ref="observerContactInfo">
          <v-form>
            <v-card flat>
              <div class="d-flex justify-space-around">
                <p>Contact Information</p>
                <p v-if="userLoggedIn == null">
                  Already have an account?
                  <router-link :to="{path:'/login'}">Login</router-link>
                </p>
              </div>
              <validation-provider v-slot="{errors}" name="Email" rules="required|email">
                <v-text-field
                  type="email"
                  :error-messages="errors"
                  label="Email"
                  v-model="customer.email"
                ></v-text-field>
              </validation-provider>

              <p>Shipping Address</p>
              <v-row>
                <v-col sm="12" md="6" lg="6">
                  <validation-provider v-slot="{errors}" name="First Name" rules="required">
                    <v-text-field
                      type="text"
                      :error-messages="errors"
                      label="First name"
                      v-model="customer.contact_fname"
                    ></v-text-field>
                  </validation-provider>
                </v-col>
                <v-col sm="12" md="6" lg="6">
                  <validation-provider v-slot="{errors}" name="Last Name" rules="required">
                    <v-text-field
                      type="text"
                      :error-messages="errors"
                      label="Last name"
                      v-model="customer.contact_lname"
                    ></v-text-field>
                  </validation-provider>
                </v-col>
              </v-row>

              <validation-provider v-slot="{errors}" name="Address" rules="required">
                <v-text-field
                  type="text"
                  :error-messages="errors"
                  label="Address"
                  v-model="customer.address"
                ></v-text-field>
              </validation-provider>

              <validation-provider v-slot="{errors}" name="City" rules="required">
                <v-text-field
                  type="text"
                  :error-messages="errors"
                  label="City"
                  v-model="customer.city"
                ></v-text-field>
              </validation-provider>

              <v-row>
                <v-col sm="12" md="6" lg="6">
                  <validation-provider v-slot="{errors}" name="Country" rules="required">
                    <v-text-field
                      type="text"
                      :error-messages="errors"
                      label="Country"
                      v-model="customer.country"
                    ></v-text-field>
                  </validation-provider>
                </v-col>
                <v-col sm="12" md="6" lg="6">
                  <validation-provider v-slot="{errors}" name="Phone" rules="required">
                    <v-text-field
                      v-model="customer.phone"
                      :error-messages="errors"
                      type="tel"
                      label="Phone"
                    >
                      <v-tooltip slot="append" bottom>
                        <template v-slot:activator="{ on }">
                          <v-icon
                            v-on="on"
                            style="border-radius:50%;"
                            small
                            class="pa-1 bg-secondary"
                            color="text--white"
                            dark
                          >mdi-help</v-icon>
                        </template>
                        <span>
                          In case we need to contact
                          <br />you about your order.
                        </span>
                      </v-tooltip>
                    </v-text-field>
                  </validation-provider>
                </v-col>
              </v-row>

              <v-checkbox label="Save this information for next time." v-model="saveInforNextTime" />
            </v-card>
            <div class="d-flex justify-content-between">
              <v-btn v-if="step == 0" @click="$router.push({name:'cart'})">Back to cart</v-btn>
              <v-btn v-if="step != 2" @click="submitContactInfo">Next</v-btn>
            </div>
          </v-form>
        </validation-observer>
        <v-form v-if="step == 1">
          <v-card>
            <v-simple-table>
              <template v-slot:default>
                <tbody>
                  <tr>
                    <td>Contact</td>
                    <td>{{customer.email}}</td>
                    <td class="text-right">
                      <v-btn text small @click="step=0">Change</v-btn>
                    </td>
                  </tr>
                  <tr>
                    <td>Ship to</td>
                    <td>{{customer.address}},{{customer.city}},{{customer.country}}</td>
                    <td class="text-right">
                      <v-btn text small @click="step=1">Change</v-btn>
                    </td>
                  </tr>
                </tbody>
              </template>
            </v-simple-table>
          </v-card>
          <p class="ma-5 ml-0 headline">Shipping Method</p>
          <v-card class="mb-5">
            <v-radio-group class="ml-5" v-model="customer.shipping_method">
              <div
                v-for="(ship,k) in shippings"
                :key="k"
                class="d-flex justify-space-between"
                style="cursor:pointer"
              >
                <v-radio :label="ship.shipping_type +'('+ship.description+')'" :value="ship"></v-radio>
                <span class="mr-3">Free</span>
              </div>
            </v-radio-group>
          </v-card>
          <div class="d-flex justify-content-between">
            <v-btn v-if="step > 0 && step <= 2" @click="prevStep">Back</v-btn>
            <v-btn
              v-if="step != 2"
              :disabled="customer.shipping_method.shipping_type != '' ? false : true"
              @click="submitShipping"
            >Next</v-btn>
          </div>
        </v-form>
        <v-form v-if="step == 2">
          <v-card>
            <v-simple-table>
              <template v-slot:default>
                <tbody>
                  <tr>
                    <td>Contact</td>
                    <td>{{customer.email}}</td>
                    <td class="text-right">
                      <v-btn text small @click="step=0">Change</v-btn>
                    </td>
                  </tr>
                  <tr>
                    <td>Ship to</td>
                    <td>{{customer.address}},{{customer.city}},{{customer.country}}</td>
                    <td class="text-right">
                      <v-btn text small @click="step=0">Change</v-btn>
                    </td>
                  </tr>
                  <tr>
                    <td>Delivery</td>
                    <td>{{customer.shipping_method.company_name }} ({{customer.shipping_method.description}}) - Free</td>
                    <td class="text-right">
                      <v-btn text small @click="step=1">Change</v-btn>
                    </td>
                  </tr>
                </tbody>
              </template>
            </v-simple-table>
          </v-card>
          <p class="ma-5 ml-0 headline">Payment</p>
          <v-card flat>
            <v-radio-group class="ml-5" v-model="customer.payment_method">
              <div
                v-for="(payment,k) in payments"
                :key="k"
                class="d-flex justify-space-between"
                style="cursor:pointer"
              >
                <v-radio :label="payment.payment_type" :value="payment"></v-radio>
              </div>
            </v-radio-group>
          </v-card>
          <div class="d-flex justify-content-between">
            <v-btn v-if="step > 0 && step <= 2" @click="prevStep">Back</v-btn>
            <v-btn
              @click="orderMethod"
              :disabled="customer.payment_method.payment_type == '' ? true : false"
            >Order</v-btn>
          </div>
        </v-form>
      </v-col>
      <v-col sm="12" md="6" lg="6">
        <v-card>
          <v-simple-table>
            <template v-slot:default>
              <colgroup>
                <col style="width:50px" />
                <col style="width:500px" />
                <col style="width:100px" />
              </colgroup>
              <tbody>
                <tr v-for="(prod,i) in cartComp" :key="i">
                  <td>
                    <v-badge
                      color="secondary"
                      :content="prod.color.sizes.quantity"
                      :value="prod.color.sizes.quantity"
                      class="mt-5"
                      overlap
                    >
                      <v-img
                        max-width="90"
                        contain
                        height="125"
                        :alt="prod.slug"
                        :src="
                  prod.color.pictures[0].src.includes('//')
                  ? 'http'+prod.color.pictures[0].src
                  : prod.imgLink+'/colors/'+prod.color.id+'/'+prod.color.pictures[0].type+'/'+prod.color.pictures.src
                  "
                        class="position-relative"
                      ></v-img>
                    </v-badge>
                  </td>
                  <td>
                    <p class="text-wrap" v-html="prod.product_name"></p>
                    <p class="body-2">{{prod.color.sizes.name}}</p>
                  </td>
                  <td>
                    <p class="body-2 mb-2">${{cartItemPriceComp(prod)}} USD</p>
                  </td>
                </tr>
              </tbody>
              <tfoot>
                <tr style="border-bottom:1px solid black">
                  <td>
                    <p>Subtotal</p>
                    <p>Shipping</p>
                  </td>
                  <td></td>
                  <td>
                    <p>$32</p>
                    <p>Not calculate</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Total</p>
                  </td>
                  <td></td>
                  <td>
                    <p>${{totalCartPrice}} USD</p>
                  </td>
                </tr>
              </tfoot>
            </template>
          </v-simple-table>
          <v-divider />
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { apiURL } from "@/utils";
import { ValidationProvider, ValidationObserver } from "vee-validate";
export default {
  //component code
  components: {
    ValidationProvider,
    ValidationObserver
  },
  data() {
    let userLoggedIn = sessionStorage.userLoggedIn
      ? sessionStorage.userLoggedIn
      : null;
    return {
      userLoggedIn,
      step: 0,
      customer:{
        shipping_method: { id: "", company_name: "" },
        payment_method: { id: "", payment_type: "" }
      },
      contact_info: {
        supplier: {},
        email: "WizardStep@gmai.com",
        shipping_method: { id: "", company_name: "" },
        payment_method: { id: "", payment_type: "" }
      },
      shippings: [],
      payments: [],
      saveInforNextTime: false,
      cart: [],
      totalCartPrice: 0
    };
  },

  created() {
    this.me();
    // if (sessionStorage.userLoggedIn) {
    //   // this.contact_info = JSON.parse(sessionStorage.user);
    //   // this.contact_info
    //   this.$store
    //     .dispatch("UserSingle/fetch", this.$root["user"])
    //     .then(data => (this.contact_info = data));
    // }
    // if (localStorage.customer_order_info) {
    //   this.contact_info = JSON.parse(localStorage.customer_order_info);
    // }
    if (localStorage.cart) {
      this.cart = JSON.parse(localStorage.cart);
      this.totalCartPrice = this.cart.reduce((total, item) => {
        return total + item.product_price * item.color.sizes.quantity;
      }, 0);
    }
  },
  computed: {
    cartItemPriceComp() {
      return citem => citem.product_price * citem.color.sizes.quantity;
    },
    cartComp() {
      return this.cart;
    }
  },
  mounted() {
    this.fetchShippings().then(({ shippings }) => {
      this.shippings = shippings;
      this.customer.shipping_method = shippings[0];
    });
    this.fetchPayments().then(({ payments }) => {
      this.payments = payments;
      this.customer.payment_method = payments[0];
    });
  },
  methods: {
    async me() {
      let data = await this.$store.dispatch("UserSingle/me");
      this.customer = data.customer;
    },
    fetchShippings() {
      return new Promise((resolve, reject) => {
        apiURL
          .get("shippings")
          .then(({ data }) => resolve(data))
          .catch(({ response }) => reject(response));
      });
    },
    fetchPayments() {
      return new Promise((resolve, reject) => {
        apiURL
          .get("payments")
          .then(({ data }) => resolve(data))
          .catch(({ response }) => reject(response));
      });
    },
    prevStep() {
      this.step--;
    },
    submitShipping() {
      this.step++;
    },
    submitContactInfo() {
      this.$refs.observerContactInfo
        .validate()
        .then(valid => (valid == true ? this.step++ : null));
    },
    orderMethod() {
      let customer_order_info = {
        ...this.customer,
        products: this.cartComp,
        total: this.totalCartPrice
      };
      if (this.saveInforNextTime)
        localStorage.setItem(
          "customer_order_info",
          JSON.stringify(customer_order_info)
        );
      apiURL
        .post("orders", customer_order_info)
        .then(({ data: { message, order_id } }) => {
          this.$awn.success(message);
          this.$eventHub.$emit("orderSuccess", order_id);
        })
        .catch(({ resolve }) => console.log(resolve));
    },
    descCartItem(item) {
      this.$eventHub.$emit("descCartItem", item);
    },
    incCartItem(item) {
      this.$eventHub.$emit("incCartItem", item);
    },
    removeCartItem(item) {
      this.$eventHub.$emit("removeCartItem", item);
    }
  }
};
</script>

<style>
</style>