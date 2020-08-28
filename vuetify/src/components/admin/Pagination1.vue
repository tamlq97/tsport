<template>
  <v-pagination :length="length" :total-visible="totalVisible" v-model="current_page"></v-pagination>
</template>

<script>
export default {
  props: {
    totalVisible:{
      type:Number,
      default:10,
    },
    store: {
      type: String,
      required: true
    },
    collection: {
      type: String,
      required: true
    }
  },
  computed: {
    length: {
      get() {
        return this.$store.getters[this.store + "/" + this.collection].meta
          .last_page;
      },
      set() {}
    },
    current_page: {
      get() {
        return this.$store.getters[this.store + "/" + this.collection].meta
          .current_page;
      },
      set(page) {
        this.$store.commit(this.store + "/SET_PAGE", page);
        const { itemsPerPage, sortBy, sortDesc } = this.$store.getters[
          this.store + "/query"
        ];
        this.$store.dispatch(this.store + "/fetchData", {
          itemsPerPage,
          sortBy,
          sortDesc,
          page
        });
      }
    }
  }
};
</script>

<style>
</style>