<template>
  <div>
    <div class="row d-flex">
      <div class="col-sm-12 col-md-6 d-flex justify-content-start align-content-center">
        <slot name="dialog"></slot>
        <label class="ml-4 mr-2">Items per page:</label>
        <select
          class="form-control"
          style="width:80px"
          v-model="options.length"
          @change="paginateBy"
        >
          <option
            v-for="(item, key) in itemPerPageOptions"
            :key="key"
            :value="item.value"
          >{{ item.value }}</option>
        </select>
      </div>
      <div class="col-sm-12 col-md-6">
        <v-text-field
          v-model="searchComp"
          hide-details
          append-icon="mdi mdi-magnify"
          @keypress.enter="searchBy"
          label="Search..."
        ></v-text-field>
      </div>
    </div>
    <div class="row">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead class="thead-inverse">
            <tr>
              <th
                v-for="(header, key) in columns"
                :key="key"
                @click="header.sortable ? sortBy(header.name) : ''"
              >
                {{ header.value }}
                <span
                  v-if="header.sortable"
                  class="fa"
                  :class="
                    sortKeyComp === header.name
                      ? sortGroup[header.name] > 0
                        ? 'fa-sort-asc'
                        : 'fa-sort-desc'
                      : 'fa-sort'
                  "
                ></span>
              </th>
            </tr>
          </thead>
          <tbody>
            <slot :data="items.data"></slot>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "datatable",
  props: {
    search: {
      type: String,
      required: true
    },
    columns: {
      type: Array,
      required: true
    },
    itemPerPageOptions: {
      type: Array,
      required: true
    },
    url: {
      type: String,
      required: true
    },
    options: {
      type: Object,
      required: true
    },
    items: {
      type: Object,
      required: true
    },
    sortKey: {
      type: String
    },
    sortGroup: {
      type: Object
    }
  },
  computed: {
    searchComp: {
      get() {
        return this.search;
      },
      set: function() {}
    },
    sortKeyComp: {
      get() {
        return this.sortKey;
      },
      set: function() {}
    }
  },
  methods: {
    searchBy(e) {
      this.$emit("searchValue", e.target.value);
    },
    paginateBy(e) {
      this.$emit("paginateValue", e.target.value);
    },
    sortBy(value) {
      this.$emit("sortBy", value);
    }
  },
};
</script>

<style></style>
