<template>
  <v-app id="inspire">
    <event-hub></event-hub>

    <v-navigation-drawer
      v-model="cartDrawer"
      :width="$vuetify.breakpoint.smOnly || $vuetify.breakpoint.xsOnly 
    ? 279 : 500"
      right
      :clipped="$vuetify.breakpoint.lgAndUp"
      disable-resize-watcher
      touchless
      app
      temporary
    >
      <!-- <v-btn @click="cartDrawer = !cartDrawer" style="position:absolute;right:15px;top:5px">&times;</v-btn> -->

      <v-list dense>
        <template v-if="cart.length">
          <v-list-item-title class="text-center text-uppercase">your cart</v-list-item-title>
          <v-divider />
          <v-list-item v-for="(prod,i) in cartComp" :key="i">
            <v-row>
              <v-col cols="4" xs="12">
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
                  : prod.imgLink+'/colors/'+prod.color.id+'/'+prod.color.pictures[0].type+'/'+prod.color.pictures[0].src
                  "
                />
              </v-col>
              <v-col cols="8" xs="12">
                <v-list-item-title class="text-wrap" v-html="prod.product_name"></v-list-item-title>
                <v-list-item-subtitle
                  class="body-2"
                >{{prod.color.name +' - '+prod.color.sizes.name}}</v-list-item-subtitle>
                <v-list-item-subtitle class="body-2 mb-2">${{prod.product_price}} USD</v-list-item-subtitle>
                <v-row>
                  <v-col lg="3" sm="12" xs="12">
                    <v-btn @click="descCartItem(prod)" class="mr-1">-</v-btn>
                  </v-col>
                  <v-col lg="6" sm="12" xs="12">
                    <div :style="$vuetify.breakpoint.smAndDown ? 'width:100%' :'width:100%'">
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
                  </v-col>
                  <v-col lg="3" sm="12" xs="12">
                    <v-btn class="ml-1 mb-2" @click="incCartItem(prod)">+</v-btn>
                  </v-col>
                </v-row>
                <v-btn @click="removeCartItem(prod)">Remove</v-btn>
              </v-col>
            </v-row>
          </v-list-item>
        </template>
        <template v-else>
          <v-list-item-title class="text-center text-uppercase">your cart</v-list-item-title>
          <v-divider></v-divider>
          <h1 class="text-uppercase">your cart is empty now.</h1>
        </template>
        <v-divider></v-divider>
        <div class="text-center">
          <v-row>
            <v-col>Total</v-col>
            <v-col>${{totalCartPrice}} USD</v-col>
          </v-row>
        </div>
        <v-divider></v-divider>
        <v-btn
          :disabled="totalCartPrice > 0 ? false : true"
          @click="gotoCart"
          class="text-uppercase ma-2"
          rounded
          block
        >Checkout</v-btn>
        <v-btn
          :disabled="totalCartPrice > 0 ? false : true"
          @click="$router.push({name:'cart'})"
          class="text-uppercase ma-2"
          rounded
          block
        >your cart</v-btn>
      </v-list>
    </v-navigation-drawer>

    <v-navigation-drawer
      disable-resize-watcher
      v-model="drawer"
      :clipped="$vuetify.breakpoint.lgAndUp"
      app
    >
      <v-list dense>
        <template v-for="item in categories">
          <v-row v-if="item.heading" :key="item.heading" align="center">
            <v-col cols="6">
              <v-subheader v-if="item.heading">{{ item.heading }}</v-subheader>
            </v-col>
            <v-col cols="6" class="text-center">
              <a href="#!" class="body-2 black--text">EDIT</a>
            </v-col>
          </v-row>
          <v-list-group
            v-else-if="item.children"
            :key="item.text"
            v-model="item.model"
            :prepend-icon="item.model ? item.icon : item['icon-alt']"
            append-icon
          >
            <template v-slot:activator>
              <v-list-item-content>
                <v-list-item-title class="text-uppercase">{{ item.name }}</v-list-item-title>
              </v-list-item-content>
            </template>
            <template v-for="(child,k) in item.children">
              <fragment
                :key="child.id"
                v-if="child.name.toLowerCase() != 'shop by category' && child.name.toLowerCase() != 'shop by collection' && child.name.toLowerCase() != 'accessories'
              "
              >
                <v-list-item
                  active-class
                  v-if="k == 1"
                  @click="$router.push({path:'/collection/all-products/'+child.parent.slug,params:{category_name:'all-products',type:child.parent.slug}})
                  "
                  link
                >
                  <v-list-item-action v-if="child.icon">
                    <v-icon>mdi-dropdown</v-icon>
                  </v-list-item-action>
                  <v-list-item-content>
                    <v-list-item-title class="pl-5 text-uppercase">All Products</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
                <v-list-item
                  @click="child.slug.toLowerCase() != $route.params.category_name
                  ? $router.push({path:'/collection/'+child.slug+'/'+child.parent.slug,params:{category_name:child.slug,type:child.parent.slug}})
                  : ''"
                  link
                  :to="child.to"
                >
                  <v-list-item-action v-if="child.icon">
                    <v-icon>mdi-dropdown</v-icon>
                  </v-list-item-action>
                  <v-list-item-content>
                    <v-list-item-title class="pl-5">{{ child.name.toUpperCase() }}</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </fragment>
            </template>
          </v-list-group>

          <v-list-item v-else :key="item.text" link :to="{name:item.to}">
            <v-list-item-action>
              <v-icon>mdi-{{ item.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>{{ item.text }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </template>
      </v-list>
    </v-navigation-drawer>
    <v-app-bar
      :clipped-left="$vuetify.breakpoint.lgAndUp"
      app
      color="grey lighten"
      class="text--dark"
      flat
      dark
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
      <v-toolbar-title
        style="cursor:pointer"
        @click="$router.name != 'home' ? $router.push({name:'home'}) : ''"
        class="ml-0 pl-4"
      >
        <span class="hidden-sm-and-down">VinhTrang</span>
      </v-toolbar-title>
      <v-toolbar-title
        style="cursor:pointer"
        @click="$router.name != 'home' ? $router.push({name:'home'}) : ''"
        class="mx-auto hidden-md-and-up"
      >VinhTrang</v-toolbar-title>
      <div class="mx-auto hidden-sm-and-down">
        <fragment v-for="cate in categories" :key="cate.id">
          <v-menu
            v-if="cate.name.toLowerCase() != 'accessories'"
            transition="scale-transition"
            :open-on-hover="true"
            offset-y
            nudge-width="2000"
          >
            <template #activator="{ on }">
              <v-btn text class="white--text" v-on="on">
                <span class="text-uppercase">{{cate.name}}</span>
                <v-icon right>mdi-menu-down</v-icon>
              </v-btn>
            </template>
            <v-list>
              <v-list-item-group>
                <v-row>
                  <v-col sm="6" md="6">
                    <v-row>
                      <v-col sm="4" md="4" class="pl-5">
                        <v-list-item
                          @click="$router.push({name:'products',params:{category_name:'all-products',type:cate.slug.toLowerCase() != 'accessories' ? cate.slug : ''}})"
                          link
                        >All products</v-list-item>
                        <v-list-item
                          @click="$router.push({path:'/collection/view-all/accessories',params:{category_name:'view-all',type:'accessories'}})"
                        >Accessories</v-list-item>
                        <v-list-item>New releases</v-list-item>
                        <v-list-item>Must have</v-list-item>
                      </v-col>

                      <fragment :key="child.id" v-for="child in cate.children">
                        <v-col
                          sm="4"
                          md="4"
                          v-if="child.name.toLowerCase() == 'shop by category' && child.parent.name.toLowerCase() == cate.name.toLowerCase()"
                          :key="child.id"
                        >
                          <v-list-item-title
                            class="subtitle text-uppercase subtitle-1"
                          >{{child.name}}</v-list-item-title>
                          <v-list-item
                            @click="$router.push({path:'/collection/'+item.slug+'/'+child.parent.slug})"
                            v-for="item in child.descendants"
                            :key="item.id"
                            class="text-uppercase body-2"
                          >{{item.name}}</v-list-item>
                        </v-col>
                        <v-col
                          sm="4"
                          md="4"
                          v-if="child.name.toLowerCase() == 'shop by collection' && child.parent.name.toLowerCase() == cate.name.toLowerCase()"
                        >
                          <template>
                            <v-list-item-title
                              class="subtitle text-uppercase subtitle-1"
                            >{{child.name}}</v-list-item-title>
                            <v-list-item
                              @click="$router.push({path:'/collection/'+item.slug+'/'+child.parent.slug})"
                              v-for="item in child.descendants"
                              :key="item.id"
                              class="text-uppercase body-2"
                            >{{item.name}}</v-list-item>
                          </template>
                        </v-col>
                      </fragment>
                    </v-row>
                  </v-col>
                  <v-col sm="6" md="6">
                    <v-card flat>
                      <v-img
                        max-width="400px"
                        height="100%"
                        class="align-center mx-auto"
                        :src="cate.name.toLowerCase() == 'mens' 
                    ? 'https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/files/Mens-Nav_967ae3f3-b73d-48f0-93c8-14bb07d542a5_315x315.jpg?v=1582538862'
                    : 'https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/files/Womens-Nav_915bcac7-19f1-4193-baec-fcc63026ea88_315x315.jpg?v=1582538869'
                    "
                      >
                        <v-card-title class="align-center justify-center white--text">
                          <v-btn
                            text
                            class="align-center text-center align-self-center justify-center white--text"
                            :to="{name:'collection'}"
                          >New releases</v-btn>
                        </v-card-title>
                      </v-img>
                    </v-card>
                  </v-col>
                </v-row>
              </v-list-item-group>
            </v-list>
          </v-menu>
          <v-btn
            text
            v-else
            @click="$route.params.type != 'accessories' ? $router.push({path:'/collection/view-all/accessories',params:{category_name:'view-all',type:'accessories'}}) : ''"
          >Accessories</v-btn>
        </fragment>
      </div>

      <search-product />

      <v-menu offset-y transition="scale-transition" open-on-hover>
        <template #activator="{ on }">
          <v-btn text class="white--text" v-on="on">
            <v-icon>mdi-account</v-icon>
            {{$root['user'] ? $root['user'].email : "Member"}}
            <v-icon right>mdi-menu-down</v-icon>
          </v-btn>
        </template>
        <v-list>
          <v-list-item
            v-if="authLogged == 'logged' && $can('delete_user')"
            link
            :to="{name:'admin'}"
          >
            <v-list-item-title>
              <span>Admin</span>
              <v-icon right>mdi-account</v-icon>
            </v-list-item-title>
          </v-list-item>
          <v-list-item v-if="authLogged == 'logged'" link :to="{name:'user_profile'}">
            <v-list-item-title>
              <span>Profile</span>
              <v-icon right>mdi-account</v-icon>
            </v-list-item-title>
          </v-list-item>
          <v-list-item v-if="authLogged == null" link :to="{name:'login'}">
            <v-list-item-title>
              <span>Login</span>
              <v-icon right>mdi-login</v-icon>
            </v-list-item-title>
          </v-list-item>
          <v-list-item v-if="authLogged == 'logged'" link @click="logout">
            <v-list-item-title>
              <span>Logout</span>
              <v-icon right>mdi-logout</v-icon>
            </v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
      <v-btn text @click="cartDrawer = !cartDrawer" class="position-relative">
        <v-icon>mdi-cart</v-icon>
        <span
          class="badge bad-pill"
          style="position:absolute;top:-10px;right:-10px;font-size:16px;color:white"
        >{{badge}}</span>
      </v-btn>
    </v-app-bar>

    <v-content>
      <v-container fluid>
        <router-view></router-view>
      </v-container>
    </v-content>
    <!-- <v-btn bottom color="pink" dark fab fixed right @click="dialog = !dialog">
      <v-icon>mdi-plus</v-icon>
    </v-btn>
    <v-dialog v-model="dialog" width="800px">
      <v-card>
        <v-card-title class="grey darken-2">Create contact</v-card-title>
        <v-container>
          <v-row class="mx-2">
            <v-col class="align-center justify-space-between" cols="12">
              <v-row align="center" class="mr-0">
                <v-avatar size="40px" class="mx-3">
                  <img src="//ssl.gstatic.com/s2/oz/images/sge/grey_silhouette.png" alt />
                </v-avatar>
                <v-text-field placeholder="Name" />
              </v-row>
            </v-col>
            <v-col cols="6">
              <v-text-field prepend-icon="mdi-account-card-details-outline" placeholder="Company" />
            </v-col>
            <v-col cols="6">
              <v-text-field placeholder="Job title" />
            </v-col>
            <v-col cols="12">
              <v-text-field prepend-icon="mdi-mail" placeholder="Email" />
            </v-col>
            <v-col cols="12">
              <v-text-field type="tel" prepend-icon="mdi-phone" placeholder="(000) 000 - 0000" />
            </v-col>
            <v-col cols="12">
              <v-text-field prepend-icon="mdi-text" placeholder="Notes" />
            </v-col>
          </v-row>
        </v-container>
        <v-card-actions>
          <v-btn text color="primary">More</v-btn>
          <v-spacer />
          <v-btn text color="primary" @click="dialog = false">Cancel</v-btn>
          <v-btn text @click="dialog = false">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>-->
    <v-footer lighten color="white">
      <v-container>
        <v-row>
          <v-col :cols="$vuetify.breakpoint.smAndDown ? 12 : 6">
            <p class="display-1" align="center">VinhTrang</p>
            <v-expansion-panels align="center" flat class="hidden-sm-and-up">
              <v-expansion-panel>
                <v-expansion-panel-header>Help</v-expansion-panel-header>
                <v-expansion-panel-content>
                  <v-list>
                    <v-list-item link>FAQs</v-list-item>
                    <v-list-item link>Delivery & Returns</v-list-item>
                    <v-list-item link>Size Guides</v-list-item>
                    <v-list-item link>Orders</v-list-item>
                  </v-list>
                </v-expansion-panel-content>
              </v-expansion-panel>

              <v-expansion-panel>
                <v-expansion-panel-header>Pages</v-expansion-panel-header>
                <v-expansion-panel-content>
                  <v-list>
                    <v-list-item link>VinhTrang Central</v-list-item>
                    <v-list-item link>Conditioning App</v-list-item>
                    <v-list-item link>About Us</v-list-item>
                    <v-list-item link>Student Beans</v-list-item>
                  </v-list>
                </v-expansion-panel-content>
              </v-expansion-panel>

              <v-expansion-panel>
                <v-expansion-panel-header>My Account</v-expansion-panel-header>
                <v-expansion-panel-content>
                  <v-list>
                    <v-list-item link>Register</v-list-item>
                    <v-list-item link>Login</v-list-item>
                  </v-list>
                </v-expansion-panel-content>
              </v-expansion-panel>
            </v-expansion-panels>
            <v-row class="hidden-xs-only">
              <v-col md="4">
                <div class="title">Help</div>
                <v-list class="body-2">
                  <div link>FAQs</div>
                  <div link>Delivery & Returns</div>
                  <div link>Size Guides</div>
                  <div link>Orders</div>
                </v-list>
              </v-col>
              <v-col md="4">
                <div class="title">PAGES</div>
                <v-list>
                  <div class="body-2">VinhTrang Central</div>
                  <div class="body-2">Conditioning App</div>
                  <div class="body-2">About Us</div>
                  <div class="body-2">Student Beans</div>
                </v-list>
              </v-col>
              <v-col md="4">
                <div class="title">My Account</div>
                <v-list class="body-2">
                  <div link>Register</div>
                  <div link>Login</div>
                </v-list>
              </v-col>
            </v-row>
          </v-col>
          <v-col :cols="$vuetify.breakpoint.smAndDown ? 12 : 6">
            <div class="display-1" align="center">Central</div>
            <div class="heading" align="center">
              Visit the
              <router-link to>VinhTrang Blog</router-link>
            </div>
            <v-card flat align="center">
              <div class="title">Sign up for our Newsletter</div>
              <v-list>
                <v-list-item>
                  <v-text-field label="Your Email Address" append-icon="mdi-arrow-right"></v-text-field>
                </v-list-item>
                <v-layout>
                  <v-flex>
                    <v-icon large>mdi-mail</v-icon>
                    <v-icon large>mdi-facebook</v-icon>
                    <v-icon large>mdi-instagram</v-icon>
                    <v-icon large>mdi-spotify</v-icon>
                    <v-icon large>mdi-youtube</v-icon>
                    <v-icon large>mdi-instagram</v-icon>
                  </v-flex>
                </v-layout>
              </v-list>
            </v-card>
          </v-col>
        </v-row>
        <v-layout row wrap>
          <v-flex xs12 sm6></v-flex>
          <v-flex xs12 sm6></v-flex>
        </v-layout>
        <v-layout row wrap>
          <v-flex xs12>
            <v-row>
              <v-col class="p-0">
                <div>&copy;2020 LQTam|All Rights Reserved| Be a visionay</div>
              </v-col>
              <div class="hidden-sm-and-down">
                <v-row>
                  <div>
                    <a href="#">Terms & Conditions</a>
                  </div>
                  <div>
                    <a href="#">Terms of Use</a>
                  </div>
                  <div>
                    <a href="#">Privacy Notice</a>
                  </div>
                  <div>
                    <a href="#">Modern Slayvery</a>
                  </div>
                </v-row>
              </div>
            </v-row>
          </v-flex>
        </v-layout>
      </v-container>
    </v-footer>
  </v-app>
</template>

<script>
import SearchProduct from "@/components/SearchProduct.vue";
export default {
  name: "Home",
  components: {
    SearchProduct,
  },
  data() {
    let authLogged = sessionStorage.userLoggedIn ?? null;
    let user = sessionStorage.user ? JSON.parse(sessionStorage.user) : "";

    return {
      searchMenu: true,
      searchKey: "",
      quantity: 1,
      totalCartPrice: 0,
      badge: 0,
      cart: [],
      cartDrawer: false,
      categories: [],
      dialog: false,
      user: user,
      authLogged: authLogged,
      drawer: false,
      sidebarItem: [{ text: "Mens", to: "mens" }],
      newreleaseWomen: [
        {
          src:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/ORIGIN_SEAMLESS_SPORTS_BRA_BLACK_MARl.A-Edit_CM_800x.jpg?v=1582298047",
          hover:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/ORIGIN_SEAMLESS_SPORTS_BRA_BLACK_MARl.B-Edit_CM_800x.jpg?v=1582298047",
          prod_name: "Origin Seamless Sports Bra",
          sub_prod: "Black Marl",
          price: "40.000",
        },
        {
          src:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/ORIGIN_SEAMLESS_LEGGINGS_BLACK_MARL.A-Edit_ZH_800x.jpg?v=1582298032",
          prod_name: "Origin Seamless Leggings",
          sub_prod: "Black Marl",
          price: "55.000",
          hover:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/ORIGIN_SEAMLESS_LEGGINGS_BLACK_MARL.B-Edit_ZH_800x.jpg?v=1582298032",
        },
        {
          src:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/RESTOCK_VITAL_SEAMLESS_SHORTS_BLACK_MARL.A-Edit_CM_800x.jpg?v=1582298178",
          prod_name: "Vital Seamless Shorts",
          sub_prod: "Black Marl",
          price: "40.000",
          hover:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/RESTOCK_VITAL_SEAMLESS_SHORTS_BLACK_MARL.B-Edit_CM_800x.jpg?v=1582298178",
        },
        {
          hover:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/VITAL_SEAMLESS_SHORTS_WASHED_JADE_MARL.B-Edit_CM_800x.jpg?v=1582298192",
          src:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/VITAL_SEAMLESS_SHORTS_WASHED_JADE_MARL.A-Edit_CM_800x.jpg?v=1582298192",
          prod_name: "Vital Seamless Shorts",
          sub_prod: "Light Green Marl",
          price: "40.000",
        },
      ],
      newreleaseMen: [
        {
          hover:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/VITAL_SEAMLESS_1Q_ZIP-_BLACK_MARL.B-Edit_CM_800x.jpg?v=1582298064",
          src:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/VITAL_SEAMLESS_1Q_ZIP-_BLACK_MARL.A-Edit_CM_800x.jpg?v=1582298064",
          prod_name: "Virtal Seamless 1/4 Zip Pullover",
          sub_prod: "Black Marl",
          price: "40.000",
        },
        {
          hover:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/VITAL_SEAMLESS_1Q_ZIP_-_ATHLETIC_MARL.B_HK_800x.jpg?v=1582298078",
          src:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/VITAL_SEAMLESS_1Q_ZIP_-_ATHLETIC_MARL.A_HK_800x.jpg?v=1582298078",
          prod_name: "Origin Seamless Leggings",
          sub_prod: "Grey Marl",
          price: "55.000",
        },
        {
          hover:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/VITAL_SEAMLESS_LEGGING-_BLACK_MARL.B-Edit_HK_800x.jpg?v=1582298105",
          src:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/VITAL_SEAMLESS_LEGGING-_BLACK_MARL.A-Edit_HK_800x.jpg?v=1582298105",
          prod_name: "Vital Seamless Leggings",
          sub_prod: "Black Marl",
          price: "40.000",
        },
        {
          hover:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/VITAL_SEAMLESS_LEGGING_-_ATHLETIC_MARL.B-Edit_ZH_800x.jpg?v=1582298123",
          src:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/VITAL_SEAMLESS_LEGGING_-_ATHLETIC_MARL.A-Edit_ZH_800x.jpg?v=1582298123",
          prod_name: "Vital Seamless Shorts",
          sub_prod: "Grey Marl",
          price: "40.000",
        },
      ],
      products: [],
      page: 1,
    };
  },
  computed: {
    cartComp() {
      return this.cart;
    },
  },
  methods: {
    search() {
      this.$store
        .dispatch("HomeProduct/fetchProdsByKey", {
          key: this.searchKey,
          page: this.page,
        })
        .then(({ products }) => console.log(products))
        .catch((err) => console.log(err));
    },
    logout() {
      this.$swal({
        title: "Are you sure?",
        text: `Your session will be done!`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Logout",
        confirmButtonColor: "#dd4b39",
        focusCancel: true,
        reverseButtons: true,
      }).then((result) => {
        if (result.value) {
          this.$store.dispatch("UserSingle/logout").then(() => {
            window.location.href = "/login";
          });
        }
      });
    },
    gotoCart() {
      if (sessionStorage.userLoggedIn) {
        if (this.$route.name != "cart-checkout") {
          this.$router.push({ name: "cart-checkout" });
        }
      } else this.$router.push({ name: "login" });
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
          reverseButtons: true,
        }).then((result) => {
          if (result.value) {
            this.cart.splice(this.getIndexCartItem(product), 1);
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
          reverseButtons: true,
        }).then((result) => {
          if (result.value) {
            this.cart.splice(this.getIndexCartItem(product), 1);
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
        (prod) =>
          prod.id == product.id &&
          prod.color.name == product.color.name &&
          prod.color.sizes.name == product.color.sizes.name
      );
    },
    removeCartItem(prod) {
      this.confirmUpdateOrDelete(prod);
    },
    setCart() {
      localStorage.setItem("cart", JSON.stringify(this.cart));
      this.viewCart();
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
  },
  created() {
    this.viewCart();
    this.$eventHub.$on("viewCart", () => {
      this.viewCart();
    });
    this.$eventHub.$on("descCartItem", (val) => {
      this.descCartItem(val);
    });
    this.$eventHub.$on("incCartItem", (val) => {
      this.incCartItem(val);
    });
    this.$eventHub.$on("removeCartItem", (val) => {
      this.removeCartItem(val);
    });
    this.$eventHub.$on("changeCartDrawer", (val) => {
      this.cartDrawer = val;
      console.log(val);
      this.viewCart();
    });
    this.$axios
      .get("http://localhost:8000/api/categories", {
        params: { showData: true },
      })
      .then(({ data }) => {
        this.categories = data.data;
      })
      .catch((err) => console.log(err.response));
  },
};
</script>
<style lang='css' scoped>
.card {
  position: relative;
}
.card1 {
  margin-left: 10px;
  position: absolute;
  transform: translateY(-50%);
  color: white;
  font-weight: bold;
  font-size: 14px;
  z-index: 100;
  top: 50%;
  left: 0;
}
.card::after {
  background-image: linear-gradient(to top, black, white);
  position: absolute;
  width: 100%;
  height: 100%;
  opacity: 0.2;
  top: 0;
  left: 0;
  z-index: 1;
  content: "";
}
.card-title {
  text-transform: uppercase;
}

.card-action {
  margin-top: 5px;
}
@media screen and (min-width: 900px) {
  .card1 {
    text-align: center;
    left: 50%;
    transform: translate(-50%, -50%);
  }
  .card-title {
    font-size: 2em;
  }
  .card::after {
    background-image: linear-gradient(to right, black, white, white);
    position: absolute;
    width: 100%;
    height: 100%;
    opacity: 0.3;
    top: 0;
    left: 0;
    z-index: 1;
    content: "";
  }
}
</style>