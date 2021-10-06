<template>
  <fragment>
    <top-of-all-page>
      <template #logo-title>
        <div class="title text-uppercase mt-md-0 text-center">VinhTrang mens</div>
      </template>
      <!-- <template #sort>
        <v-select flat outlined :items="sortBys" v-model="sortName"></v-select>
      </template>-->
      <template #title-page>
        <div class="display-1 text-center text-uppercase font-bold">Men's Leggings & Base Layers</div>
      </template>
      <template #subtitle-page>
        <p
          class="caption text-center"
        >Our men's base layers are here to provide a second-skin for your fitness routine. Moisture-wicking technology meets innovative design; our range of base-layers take your workouts up to the next level. With DRY technology to wick away moisture, you can be confident, cool and comfortable during the most intense gym sessions. Browse through our leggings, tops and shorts and transform your workout. Mix and match your base-layer with our</p>
      </template>
    </top-of-all-page>
    <v-layout wrap row>
      <home-side-bar></home-side-bar>
      <v-flex sm6 md9>
        <v-layout row wrap>
          <v-flex class="pa-3 pt-0" sm6 md4 v-for="(prod,k) in newreleaseMen" :key="k">
            <v-card flat class="ma-2 mr-2">
              <v-hover v-slot:default="{ hover }" open-delay="200">
                <v-row style="position:relative">
                  <v-img :src="hover ? prod.hover : prod.src" class="dark--text align-end" />
                  <div
                    :style="hover ? 'width:100%;position:absolute;bottom:0;left:50%;background:white;text-align:center;transform:translateX(-50%); color:black' : 'display:none'"
                  >
                    <div class="title">Quick Add</div>
                    <v-row class="justify-center justify-space-around">
                      <v-btn outlined link>M</v-btn>
                      <v-btn outlined link>L</v-btn>
                      <v-btn outlined link>XL</v-btn>
                      <v-btn outlined link>XXL</v-btn>
                    </v-row>
                  </div>
                </v-row>
              </v-hover>
              <v-row>
                <v-card-title class='mt-5'>{{prod.prod_name}}</v-card-title>
                <v-card-subtitle>{{prod.sub_prod}}</v-card-subtitle>
                <v-card-subtitle>${{prod.price}} USD</v-card-subtitle>
              </v-row>
            </v-card>
          </v-flex>
        </v-layout>
      </v-flex>
    </v-layout>
  </fragment>
</template>

<script>
export default {
  data() {
    return {
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
        },
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
        },
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

<style>
</style>