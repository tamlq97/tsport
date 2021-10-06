<template>
  <v-menu
    offset-y
    nudge-width="2000"
    :close-on-content-click="false"
    open-on-click
    absolute
    close-delay
    fixed
    max-height="100%"
    v-model="searchMenu"
  >
    <template #activator="{ on }">
      <v-btn text class="white--text" v-on="on">
        <v-icon>mdi-magnify</v-icon>
      </v-btn>
    </template>
    <v-card>
      <v-banner single-line :sticky="true">
        <v-tooltip bottom>
          <template #activator="{on}">
            <v-text-field
              style="width:1920px"
              label="Type your key search here"
              @keypress.enter="search"
              v-model="searchKey"
              v-on="on"
              class="pr-5 pt-5 pl-5 bg-white"
              @click:append="searchMenu = false"
              append-icon="mdi-close"
            />
          </template>
          <span>Search product by keys: ( masp,name,price)</span>
        </v-tooltip>
      </v-banner>
      <v-row>
        <v-col v-for="(prod,k) in productsComp" :key="k" xs="12" sm="6" md="4" lg="3">
          <v-card flat class="ma-2 mr-2">
            <v-hover v-slot:default="{ hover }" open-delay="200">
              <v-row style="position:relative">
                <v-img
                  width="100px"
                  @click="gotoProd(prod)"
                  :src="prod.img.includes('//')
                  ? 'http'+prod.img
                  : prod.imgLink+'/colors/'+prod.color+'/image/'+prod.img"
                  class="dark--text align-end"
                  style="cursor:poiter"
                >
                  <span class="newest pa-2" v-if="prod.newest">Newest</span>
                  <span class="discount pa-2" v-if="prod.discount_available">-{{prod.discount}}%</span>
                </v-img>
                <div
                  :style="hover ? 'width:100%;position:absolute;bottom:0;left:50%;background:white;text-align:center;transform:translateX(-50%); color:black' : 'display:none'"
                >
                  <div class="title">Quick Add</div>
                  <v-row class="justify-center">
                    <v-btn
                      outlined
                      link
                      class="ma-1"
                      @click="add2Cart(prod,s)"
                      v-for="s in prod.sizes"
                      :key="s.id"
                    >{{s.name}}</v-btn>
                  </v-row>
                </div>
                <!-- </v-img> -->
              </v-row>
            </v-hover>
            <div class="text-center mt-5">
              <div @click="gotoProd(prod)" v-html="prod.prodName"></div>
              <div v-html="prod.color.name"></div>
              <div>${{prod.prodPrice}} USD</div>
            </div>
          </v-card>
        </v-col>
      </v-row>
      <div class="text-center" v-if="products.length > 0">
        <v-btn>Load More</v-btn>
      </div>
    </v-card>
  </v-menu>
</template>

<script>
export default {
  data() {
    return {
      searchMenu: false,
      searchKey: "seamless",
      page: 1,
      products: []
    };
  },
  methods: {
    add2Cart(item, size) {
      let cart = [];
      if (localStorage.cart) {
        cart = JSON.parse(localStorage.cart);
        let index = cart.findIndex(
          c =>
            c.id == item.prodID &&
            c.color.name == item.color &&
            c.color.sizes.name == size.name
        );
        if (index !== -1) {
          cart[index].color.sizes.quantity++;
          localStorage.setItem("cart", JSON.stringify(cart));
        } else {
          let product = {
            ...item,
            id: item.prodID,
            product_name: item.prodName,
            product_price: item.discount_available
              ? item.prodPrice * ((100 - item.discount) / 100)
              : item.prodPrice,

            categories: [
              { name: item.cateName, parent: { name: item.cateParent } }
            ],
            slug: item.prodSlug,
            color: {
              ...item.color,
              sizes: {
                ...size,
                quantity: 1
              },
              pictures: [{ src: item.img }]
            }
          };
          cart.push(product);
          localStorage.setItem("cart", JSON.stringify(cart));
        }
        this.$awn.success("Success add product to cart.");
      } else {
        cart.push({
          ...item,
          id: item.prodID,
          product_name: item.prodName,
          product_price: item.discount_available
            ? item.prodPrice * ((100 - item.dicount) / 100)
            : item.prodPrice,

          categories: [
            { name: item.cateName, parent: { name: item.cateParent } }
          ],
          slug: item.prodSlug,
          color: {
            ...item.color,
            sizes: {
              ...size,
              quantity: 1
            },
            pictures: [{ src: item.img }]
          }
        });
        localStorage.setItem("cart", JSON.stringify(cart));
        this.$awn.success("Success add product to cart.");
      }
      this.$eventHub.$emit("viewCart");
    },
    gotoProd(prod) {
      this.searchMenu = false;
      this.$router.push({
        path: `/collection/${prod.cateName}/products/${prod.prodSlug}-${prod.color.name}-${prod.prodID}`
      });
    },
    search() {
      this.$store
        .dispatch("HomeProduct/fetchProdsByKey", {
          key: this.searchKey,
          page: this.page
        })
        .then(({ products }) => (this.products = products))
        .catch(err => console.log(err));
    },
    refreshData() {
      this.products = [];
      (this.searchKey = "seamless"), (this.page = 1);
    }
  },
  watch: {
    searchMenu: function(val) {
      !val && this.refreshData();
    }
  },
  computed: {
    productsComp() {
      return this.products;
    }
  }
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