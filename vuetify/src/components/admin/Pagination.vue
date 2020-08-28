<template>
  <nav class="mx-auto" aria-label="Page navigation">
    <ul class="pagination justify-content-center">
      <li class="page-item" :class="page > 1 ? '' : 'disabled'" @click="page > 1 ? moveToPage(page - 1) : ''">
        <router-link class="page-link" :to="{name : url}" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
        </router-link>
      </li>
      <li
        v-for="(i, key) in length"
        :key="key"
        class="page-item"
        :class="page === i ? 'active' : ''"
        @click="moveToPage(i)"
      >
        <router-link class="page-link" :to="{name : url}">{{i}}</router-link>
      </li>
      <li class="page-item" :class="page < length ? '' : 'disabled'" @click="page < length ? moveToPage(page + 1) : ''">
        <router-link class="page-link" :to="{name : url}" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </router-link>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: "pagination",
  props: {
    url: {
      type: String,
      required: true
    },
    length: {
      type: Number,
      required: true
    },
    page: {
      type: Number,
      required: true
    }
  },
  methods: {
    moveToPage(page) {
      this.$emit("moveToPage", page);
    }
  }
};
</script>
