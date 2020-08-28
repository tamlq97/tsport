<template>
  <v-container class=" mt-0 pt-0 pa-3">
    <v-row>
      <v-col xs="6" class="p-0">
        <v-btn text large block>
          <router-link class="black--text" :to="{name:'collection'}">SHOP NEW MENS</router-link>
        </v-btn>
      </v-col>
      <v-col xs="6" class="p-0">
        <v-btn text large block>
          <router-link class="black--text" :to="{name:'products',params:{category_name:'all-products',type:'womens'}}">SHOP NEW WOMENS</router-link>
        </v-btn>
      </v-col>
    </v-row>
    <v-row>
      <v-card >
        <v-img
          src="https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/files/Womens_2d47d7a8-523a-49c1-906a-a9f1b533f138_1900x.jpg?v=1582538670"
          class="white--text align-end"
          gradient="to left, rgba(0,0,0,0), rgba(0,0,0,.5)"
        >
          <v-card-title class="display-1 justify-md-center" v-text="'ORIGIN SEAMLESS'"></v-card-title>
          <v-card-subtitle
            class="subtitle-1 white--text text-md-center"
          >If you thought our original Seamness was good...</v-card-subtitle>
          <v-card-actions class="justify-md-center">
            <v-btn large :to="{path:'/collection/all-products/womens?key=newest'}" link>SHOP</v-btn>
          </v-card-actions>
        </v-img>
      </v-card>
    </v-row>
    <v-row>
      <v-row>
        <v-col xs="12" md="6">
          <div class="font-weight-bold">WOMENS</div>
          <div class="display-1">NEW RELEASES</div>
        </v-col>
        <v-col xs="12" md="6" class='text-center' align-md="center" align-self="end">
          <v-btn text>
            <router-link :to="{path:'/collection/all-products/womens?key=newest'}">View All</router-link>
          </v-btn>
        </v-col>
      </v-row>
      <v-row>
        <v-col cols='12' sm="6" md="3" v-for="prod in newreleaseWomen" :key="prod.src">
          <v-card flat class="ma-2">
            <v-hover v-slot:default="{ hover }" open-delay="200">
              <img :src="hover ? prod.hover : prod.src" width="100%" alt />
            </v-hover>
            <v-card-title>{{prod.prod_name}}</v-card-title>
            <v-card-subtitle>{{prod.sub_prod}}</v-card-subtitle>
            <v-card-subtitle>${{prod.price}} USD</v-card-subtitle>
          </v-card>
        </v-col>
      </v-row>
    </v-row>
    <v-row>
      <v-card>
        <v-img
          src="https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/files/NEW-WEB-BANNER-SIZE_4_1900x.jpg?v=1582538702"
          class="white--text align-end"
          gradient="to left, rgba(0,0,0,.1), rgba(0,0,0,.5)"
        >
          <v-card-title
            class="display-1 text-uppercase justify-center"
            v-text="'essentials for anything'"
          ></v-card-title>
          <v-card-subtitle
            class="text-center subtitle-1 white--text"
          >You can trust the Essentials collection like you trust your gym partner.</v-card-subtitle>
          <v-card-actions class="justify-center">
            <v-btn large :to="{path:'/collection/all-products/mens?key=newest'}" link>SHOP</v-btn>
          </v-card-actions>
        </v-img>
      </v-card>
    </v-row>

    <v-row>
      <v-row>
        <v-col xs="12" md="6">
          <div class="font-weight-bold">WOMENS</div>
          <div class="display-1">NEW RELEASES</div>
        </v-col>
        <v-col xs="12" class='text-center' md="6" align-md="center" align-self="end">
          <v-btn text>
            <router-link :to="{path:'/collection/all-products/mens?key=newest'}">View All</router-link>
          </v-btn>
        </v-col>
      </v-row>
      <v-row>
        <v-col cols='12' sm="6" md="3" v-for="prod in newreleaseMen" :key="prod.src">
          <v-card flat class="ma-2">
            <v-hover v-slot:default="{ hover }" open-delay="200">
              <img :src="hover ? prod.hover : prod.src" width="100%" alt />
            </v-hover>
            <v-card-title>{{prod.prod_name}}</v-card-title>
            <v-card-subtitle>{{prod.sub_prod}}</v-card-subtitle>
            <v-card-subtitle>${{prod.price}} USD</v-card-subtitle>
          </v-card>
        </v-col>
      </v-row>
    </v-row>

    <v-row>
      <v-col cols='12' sm="6">
        <v-card class="mr-2 mx-auto">
          <v-img
            src="https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/files/WEB_Half_HerosArtboard_1_4_1900x.jpg?v=1582538732"
            class="dark--text align-end"
            height="200px"
          >
            <v-card-title class="dark--text justify-end" v-text="'SHOP MEN'"></v-card-title>
            <v-card-actions class="justify-end">
              <v-btn large :to="{path:'/collection/all-products/mens?key=newest'}" link>SHOP</v-btn>
            </v-card-actions>
          </v-img>
        </v-card>
      </v-col>
      <v-col cols='12' sm="6">
        <v-card class="mx-auto">
          <v-img
            src="https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/files/WEB_Half_HerosArtboard_2_2_1900x.jpg?v=1582538736"
            class="dark--text align-end"
            height="200px"
          >
            <v-card-title v-text="'SHOP WOMENS'"></v-card-title>
            <v-card-actions>
              <v-btn large :to="{path:'/collection/all-products/womens?key=newest'}" link>SHOP</v-btn>
            </v-card-actions>
          </v-img>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
// @ is an alias to /src
export default {
  name: "Home",
  data() {
    let authLogged = sessionStorage.userLoggedIn ?? null;
    let user = sessionStorage.user ? JSON.parse(sessionStorage.user) : "";
    return {
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
          price: "40.000"
        },
        {
          src:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/ORIGIN_SEAMLESS_LEGGINGS_BLACK_MARL.A-Edit_ZH_800x.jpg?v=1582298032",
          prod_name: "Origin Seamless Leggings",
          sub_prod: "Black Marl",
          price: "55.000",
          hover:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/ORIGIN_SEAMLESS_LEGGINGS_BLACK_MARL.B-Edit_ZH_800x.jpg?v=1582298032"
        },
        {
          src:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/RESTOCK_VITAL_SEAMLESS_SHORTS_BLACK_MARL.A-Edit_CM_800x.jpg?v=1582298178",
          prod_name: "Vital Seamless Shorts",
          sub_prod: "Black Marl",
          price: "40.000",
          hover:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/RESTOCK_VITAL_SEAMLESS_SHORTS_BLACK_MARL.B-Edit_CM_800x.jpg?v=1582298178"
        },
        {
          hover:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/VITAL_SEAMLESS_SHORTS_WASHED_JADE_MARL.B-Edit_CM_800x.jpg?v=1582298192",
          src:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/VITAL_SEAMLESS_SHORTS_WASHED_JADE_MARL.A-Edit_CM_800x.jpg?v=1582298192",
          prod_name: "Vital Seamless Shorts",
          sub_prod: "Light Green Marl",
          price: "40.000"
        }
      ],
      newreleaseMen: [
        {
          hover:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/VITAL_SEAMLESS_1Q_ZIP-_BLACK_MARL.B-Edit_CM_800x.jpg?v=1582298064",
          src:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/VITAL_SEAMLESS_1Q_ZIP-_BLACK_MARL.A-Edit_CM_800x.jpg?v=1582298064",
          prod_name: "Virtal Seamless 1/4 Zip Pullover",
          sub_prod: "Black Marl",
          price: "40.000"
        },
        {
          hover:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/VITAL_SEAMLESS_1Q_ZIP_-_ATHLETIC_MARL.B_HK_800x.jpg?v=1582298078",
          src:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/VITAL_SEAMLESS_1Q_ZIP_-_ATHLETIC_MARL.A_HK_800x.jpg?v=1582298078",
          prod_name: "Origin Seamless Leggings",
          sub_prod: "Grey Marl",
          price: "55.000"
        },
        {
          hover:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/VITAL_SEAMLESS_LEGGING-_BLACK_MARL.B-Edit_HK_800x.jpg?v=1582298105",
          src:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/VITAL_SEAMLESS_LEGGING-_BLACK_MARL.A-Edit_HK_800x.jpg?v=1582298105",
          prod_name: "Vital Seamless Leggings",
          sub_prod: "Black Marl",
          price: "40.000"
        },
        {
          hover:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/VITAL_SEAMLESS_LEGGING_-_ATHLETIC_MARL.B-Edit_ZH_800x.jpg?v=1582298123",
          src:
            "https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/VITAL_SEAMLESS_LEGGING_-_ATHLETIC_MARL.A-Edit_ZH_800x.jpg?v=1582298123",
          prod_name: "Vital Seamless Shorts",
          sub_prod: "Grey Marl",
          price: "40.000"
        }
      ]
    };
  }
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