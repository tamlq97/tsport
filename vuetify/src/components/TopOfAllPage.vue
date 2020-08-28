<template>
  <v-layout column wrap>
    <v-flex sm4 md4>
      <v-row>
        <!-- <v-col class="mx-sm-auto hidden-sm-and-down">
          <v-breadcrumbs :items="$route.meta.breadcrumb">
            <template v-slot:item="props">
              <router-link :to="{name:props.item.href}">{{props.item.text}}</router-link>
            </template>
          </v-breadcrumbs>
        </v-col> -->
        <v-col>
          <slot name="logo-title"></slot>
        </v-col>
        <v-col class="hidden-sm-and-down">
          <v-select
            class="mx-auto"
            v-model="sortName"
            :items="sortBys"
            @input="filterProductsByKeyWord(sortName)"
            item-text="sortBy"
            item-value="sortKeyDir"
            outlined
            style="width:300px"
            flat
            return-object
          ></v-select>
          <slot name="sort"></slot>
        </v-col>
      </v-row>
    </v-flex>
    <v-flex sm4 md4>
      <slot name="title-page"></slot>
    </v-flex>
    <v-flex sm4 md4>
      <slot name="subtitle-page"></slot>
    </v-flex>
  </v-layout>
</template>

<script>
export default {
  data() {
    return {
      sortName: {
        sortBy: "Popular",
        sortKeyDir: "popular"
      },
      sortBys: [
        {
          sortBy: "Price: High to Low",
          sortKeyDir: "price_desc"
        },
        {
          sortBy: "Price: Low to High",
          sortKeyDir: "price_asc"
        },
        {
          sortBy: "Popular",
          sortKeyDir: "popular"
        },
        {
          sortBy: "Newest",
          sortKeyDir: "newest"
        }
      ]
    };
  },
  created() {
    if(this.$route.query.key == 'newest'){
        this.sortName = {
          sortKey:'Newest',
          sortKeyDir:'newest'
        }
      }
    this.$eventHub.$emit("filterKey", this.sortName.sortKeyDir);
  },
  watch: {
    $route: function() {
      this.sortName = {
        sortBy: "Popular",
        sortKeyDir: "popular"
      };
      if(this.$route.query.key == 'newest'){
        this.sortName = {
          sortKey:'Newest',
          sortKeyDir:'newest'
        }
      }
      this.$eventHub.$emit("filterKey", this.sortName.sortKeyDir);
    }
  },
  methods: {
    filterProductsByKeyWord(key) {
      let { category_name, type } = this.$route.params;
      this.$store.dispatch("HomeProduct/fetchData", {
        category_name,
        type,
        length: 50,
        key: key.sortKeyDir
      });
      this.$eventHub.$emit("filterKey", key.sortKeyDir);
    }
  }
};
</script>

<style>
</style>