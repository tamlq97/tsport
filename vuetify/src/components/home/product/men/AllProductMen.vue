<template>
  <v-container fluid>
    <top-of-all-page>
      <template #logo-title>
        <div
          class="title text-uppercase mt-md-0 text-center"
          @click="$router.push({ name: 'home' })"
        >
          VinhTrang mens
        </div>
        <!-- <v-breadcrumbs :items="$route.meta.breadcrumb">
            <template v-slot:item="props">
              <router-link :to="{name:props.item.href}">{{props.item.text}}</router-link>
            </template>
          </v-breadcrumbs> -->
      </template>
      <!-- <template #sort>
        <v-select flat outlined :items="sortBys" v-model="sortName"></v-select>
      </template>-->
      <template #title-page>
        <div class="display-1 text-center text-uppercase font-bold">
          men's workout clothes
        </div>
      </template>
      <template #subtitle-page>
        <p class="caption text-center">
          Explore all men's VinhTrang clothing. Gym and fitness clothes designed
          to complement the hard work and dedication you put in your workouts.
        </p>
      </template>
    </top-of-all-page>
    <v-pagination
      v-model="page"
      v-if="products && products.meta"
      :length="products.meta.last_page"
      :total-visible="7"
    ></v-pagination>
    <v-layout row wrap>
      <home-side-bar></home-side-bar>
      <v-flex sm6 md9>
        <v-layout wrap row v-if="products.data && products.data.length > 0">
          <v-flex
            class="pa-3 pt-0"
            sm6
            md4
            v-for="(prod, k) in products.data"
            :key="k"
          >
            <v-card flat class="ma-2 mr-2">
              <v-hover v-slot:default="{ hover }" open-delay="200">
                <v-row style="position:relative">
                  <v-img
                    @click="
                      $router.push({
                        path: `/collection/${$route.params.type}/products/${prod.slug}-${prod.color[0].name}-${prod.id}`,
                      })
                    "
                    :src="
                      prod.color.length &&
                      prod.color[0].pictures.length &&
                      prod.color[0].pictures[0].src.includes('//')
                        ? 'http' + prod.color[0].pictures[0].src
                        : prod.color.length && prod.color[0].pictures.length
                        ? prod.imgLink +
                          '/colors/' +
                          prod.color[0].id +
                          '/' +
                          prod.color[0].pictures[0].type +
                          '/' +
                          prod.color[0].pictures[0].src
                        : 'data:image/png;base64,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'
                    "
                    class="dark--text align-end"
                    style="cursor:poiter"
                  >
                    <span class="newest pa-2" v-if="prod.newest">Newest</span>
                    <span class="discount pa-2" v-if="prod.discount_available"
                      >-{{ prod.discount }}%</span
                    >
                  </v-img>

                  <div
                    :style="
                      hover
                        ? 'width:100%;position:absolute;bottom:0;left:50%;background:white;text-align:center;transform:translateX(-50%); color:black'
                        : 'display:none'
                    "
                  >
                    <div class="title">Quick Add</div>
                    <v-row class="justify-center">
                      <v-btn
                        outlined
                        link
                        class="ma-1"
                        @click="add2Cart(prod, s)"
                        v-for="s in prod.color[0].sizes"
                        :key="s.id"
                        >{{ s.name }}</v-btn
                      >
                    </v-row>
                  </div>
                  <!-- </v-img> -->
                </v-row>
              </v-hover>
              <div class="text-center">
                <p
                  @click="
                    $router.push({
                      path: `/collection/${$route.params.type}/products/${prod.slug}-${prod.color[0].name}-${prod.id}`,
                    })
                  "
                  v-html="prod.product_name"
                ></p>
                <p v-html="prod.color[0].name"></p>
                <p>
                  ${{ prod.product_price }} USD
                  <span v-if="prod.discount_available">
                    -> ${{
                      prod.product_price * ((100 - prod.discount) / 100)
                    }}
                    USD</span
                  >
                </p>
              </div>
            </v-card>
          </v-flex>
        </v-layout>
        <v-layout v-else>
          <h1>Do not have any product got any products.</h1>
        </v-layout>
      </v-flex>
    </v-layout>
    <div class="text-center">
      <v-pagination
        v-model="page"
        v-if="products && products.meta"
        :length="products.meta.last_page"
        :total-visible="7"
      ></v-pagination>
    </div>
  </v-container>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
  data() {
    return {
      categories: [],
      page: 1,
      filterDrawer: false,
      sortDrawer: false,
      size: null,
      key: null,
    };
  },
  watch: {
    $route: function() {
      let { category_name, type } = this.$route.params;
      this.size = null;
      this.key = null;
      this.fetchData({
        length: 50,
        category_name,
        type,
        page: this.page,
        key: this.$route.query.key || this.key,
        size_name: this.size,
      });
    },
    page: function(val) {
      let { category_name, type } = this.$route.params;
      this.fetchData({
        length: 50,
        category_name,
        type,
        page: val,
        key: this.key,
        size_name: this.size,
      });
    },
  },
  created() {
    this.$eventHub.$on("filterKey", (val) => (this.key = val));
    this.$eventHub.$on("filterSize", (val) => {
      this.size = val;
    });
  },
  mounted() {
    let { category_name, type } = this.$route.params;
    this.fetchData({
      length: 50,
      category_name,
      type,
      page: this.page,
      key: this.key,
      size_name: this.size,
    });
  },
  computed: {
    ...mapGetters("HomeProduct", ["products", "fetching"]),
  },
  methods: {
    ...mapActions("HomeProduct", ["fetchData"]),
    add2Cart(item, size) {
      let cart = [];
      if (localStorage.cart) {
        cart = JSON.parse(localStorage.cart);
        let index = cart.findIndex(
          (c) =>
            c.id == item.id &&
            c.color.name == item.color[0].name &&
            c.color.sizes.name == size.name
        );
        if (index !== -1) {
          cart[index].color.sizes.quantity++;
          localStorage.setItem("cart", JSON.stringify(cart));
        } else {
          let product = {
            ...item,
            product_price: item.discount_available
              ? item.product_price * ((100 - item.discount) / 100)
              : item.product_price,
            color: {
              ...item.color[0],
              sizes: {
                ...size,
                quantity: 1,
              },
            },
          };
          cart.push(product);
          localStorage.setItem("cart", JSON.stringify(cart));
        }
        this.$eventHub.$emit("changeCartDrawer", true);
      } else {
        cart.push({
          ...item,
          product_price: item.discount_available
            ? item.product_price * ((100 - item.discount) / 100)
            : item.product_price,
          color: {
            ...item.color[0],
            sizes: {
              ...size,
              quantity: 1,
            },
          },
        });
        localStorage.setItem("cart", JSON.stringify(cart));
        this.$eventHub.$emit("changeCartDrawer", true);
      }
    },
  },
};
</script>

<style scoped>
.newest {
  background-color: rgb(255, 0, 0);
  color: white;
  font-weight: bold;
  top: 0;
  left: 0;
  position: absolute;
}
.discount {
  background-color: rgb(255, 0, 0);
  color: white;
  font-weight: bold;
  top: 0;
  right: 0;
  position: absolute;
}
</style>
