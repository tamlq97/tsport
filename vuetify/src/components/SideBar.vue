<template>
  <fragment>
    <v-navigation-drawer v-model="filterDrawer" temporary app>
      <v-list class="text-center" v-if="categoriesComp.length">
        <v-list-item-group>
          <v-list-item-title class="text-uppercase">Shop by category</v-list-item-title>
          <v-divider></v-divider>
          <template v-for="child in categories[0].children">
            <v-list-item
              color="primary"
              active-class="active"
              class="text-uppercase body-2"
              v-if="child.name.toLowerCase() != 'shop by category'
            && child.name.toLowerCase() != 'shop by collection'
            && child.name.toLowerCase() != 'accessories'
            "
              :key="child.id"
              @click="child.slug != $route.params.category_name
            ? $router.push({path:`/collection/${child.slug}/${child.parent.slug}`
            ,params:{category_name:child.slug,type:child.parent.slug}})
            : ''"
              link
            >{{child.name}}</v-list-item>
          </template>
        </v-list-item-group>
      </v-list>

      <v-list class="text-center">
        <v-list-item-group>
          <v-list-item-title class="text-uppercase">Filter by size</v-list-item-title>
          <v-divider></v-divider>
          <div class="d-flex">
            <v-list-item
              color="primary"
              v-for="s in sizesAll"
              :style="{'background':size == s.name ? '#1976D2' : ''}"
              :key="s.id"
              @click="filterProductsBySize(s)"
              active-class="active"
              link
            >{{s.name}}</v-list-item>
          </div>
          <v-btn small v-if="size" @click="clearFilter">Clear filter</v-btn>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>

    <v-navigation-drawer v-model="sortDrawer" temporary right app>
      <v-list-item color="primary">
        <v-list-item-avatar>
          <v-img src="https://randomuser.me/api/portraits/men/78.jpg"></v-img>
        </v-list-item-avatar>

        <v-list-item-content>
          <v-list-item-title>John Leider</v-list-item-title>
        </v-list-item-content>
      </v-list-item>

      <v-divider></v-divider>

      <v-list dense>
        <v-list-item-group>
          <v-list-item color="primary" v-for="item in items" :key="item.title" link>
            <v-list-item-icon>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-icon>

            <v-list-item-content>
              <v-list-item-title>{{ item.title }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
    <v-flex sm3 md3 class="position-relative">
      <v-row class="text-uppercase hidden-sm-and-up">
        <v-col>
          <v-btn text outlined block @click="filterDrawer = !filterDrawer">
            <v-icon>mdi-filter</v-icon>Filter
          </v-btn>
        </v-col>
        <v-col>
          <v-btn text outlined block @click="sortDrawer = !sortDrawer">
            <v-icon>mdi-sort</v-icon>Sort by
          </v-btn>
        </v-col>
      </v-row>
      <div class="sticky">
        <v-navigation-drawer permanent class="hidden-sm-and-down" clipped floating>
          <v-list class="text-center" v-if="categoriesComp.length">
            <v-list-item-title class="text-uppercase">Shop by category</v-list-item-title>
            <v-divider></v-divider>
            <v-list-item-group>
              <v-list-item
                color="primary"
                active-class="active"
                class="text-uppercase body-2"
                link
                @click="'all-products' != $route.params.category_name
            ? $router.push({path:`/collection/all-products/${$route.params.type}`
            ,params:{category_name:'all-products',type:$route.params.type}})
            : ''"
              >All Products</v-list-item>
              <template v-for="(child) in categoriesComp[0].children">
                <v-list-item
                  color="primary"
                  active-class="active"
                  class="text-uppercase body-2"
                  v-if="child.name.toLowerCase() != 'shop by category'
            && child.name.toLowerCase() != 'shop by collection'
            && child.name.toLowerCase() != 'accessories'
            "
                  :key="child.id"
                  @click="child.slug != $route.params.category_name
            ? $router.push({path:`/collection/${child.slug}/${child.parent.slug}`
            ,params:{category_name:child.slug,type:child.parent.slug}})
            : ''"
                  link
                >{{child.name}}</v-list-item>
              </template>
            </v-list-item-group>
          </v-list>

          <v-list class="text-center">
            <v-list-item-title class="text-uppercase">Filter by size</v-list-item-title>
            <v-divider></v-divider>
            <div class="d-flex">
              <v-list-item
                v-for="s in sizesAll"
                :style="{'background':size == s.name ? '#1976D2' : ''}"
                :key="s.id"
                @click="filterProductsBySize(s)"
                active-class="active"
                link
              >{{s.name}}</v-list-item>
            </div>
            <v-btn small v-if="size" @click="clearFilter">Clear filter</v-btn>
          </v-list>
        </v-navigation-drawer>
      </div>
    </v-flex>
  </fragment>
</template>

<script>
export default {
  data() {
    return {
      categories: [],
      filterDrawer: false,
      sortDrawer: false,
      size: null,
      key: null,
      items: []
    };
  },
  watch: {
    $route: function() {
      this.size = null;
      this.$eventHub.$emit("filterSize", null);
      this.fetchCate();
    }
  },
  created() {
    this.$eventHub.$on("filterKey", val => (this.key = val));
    this.fetchCate();
  },
  mounted() {
    this.$store.dispatch("HomeProduct/fetchSizesAll");
  },
  methods: {
    fetchCate() {
      this.$axios
        .get("http://localhost:8000/api/categories", {
          params: {
            showData: true
          }
        })
        .then(({ data }) => {
          this.categories = data.data;
        })
        .catch(({ response }) => console.log(response));
    },
    filterProductsBySize(s) {
      let { category_name, type } = this.$route.params;
      let size_name = s.name;
      this.size = size_name;
      this.$store.dispatch("HomeProduct/fetchData", {
        length: 50,
        category_name,
        type,
        size_name,
        key: this.key
      });
      this.$eventHub.$emit("filterSize", size_name);
    },
    clearFilter() {
      let { category_name, type } = this.$route.params;
      this.$store.dispatch("HomeProduct/fetchData", {
        length: 50,
        category_name,
        type
      });
      this.size = null;
      this.$eventHub.$emit("filterSize", null);
    }
  },
  computed: {
    sizesAll() {
      return this.$store.getters["HomeProduct/sizesAll"];
    },
    categoriesComp() {
      let type = this.categories.filter(c => c.name == this.$route.params.type);
      return type;
    }
  }
};
</script>

<style>
</style>