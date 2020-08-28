<template>
  <v-layout row wrap>
    <v-flex>
      <v-card flat>
        <v-card-title>
          {{tableName}}
          <v-spacer></v-spacer>
          <v-text-field
            v-model="search"
            append-icon="mdi mdi-magnify"
            label="Search"
            single-line
            hide-details
            @keypress.enter="searchData"
          ></v-text-field>
        </v-card-title>
        <v-data-table
          :search="search"
          :headers="columns"
          :items="users.data"
          :options.sync="options"
          :serverItemsLength="total"
          :loading="fetching"
          :hide-default-footer="true"
          class="elevation-1"
        >
          <template v-slot:top>
            <v-toolbar flat color="white">
              <v-toolbar-title>Users</v-toolbar-title>
              <v-divider class="mx-4" inset vertical></v-divider>
              <v-spacer></v-spacer>
              <v-dialog v-model="dialog" max-width="500px">
                <template v-slot:activator="{ on }">
                  <v-btn color="primary" dark class="mb-2" v-on="on">New Item</v-btn>
                </template>
                <v-card>
                  <v-card-title>
                    <span class="headline">{{ formTitle }}</span>
                  </v-card-title>

                  <v-card-text>
                    <v-container>
                      <v-row>
                        <v-col cols="12" sm="6" md="4">
                          <v-text-field v-model="editedItem.name" label="Name"></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="4">
                          <v-text-field v-model="editedItem.email" label="Email"></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="4">
                          <v-text-field v-model="editedItem.role" label="Role"></v-text-field>
                        </v-col>
                      </v-row>
                    </v-container>
                  </v-card-text>

                  <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
                    <v-btn color="blue darken-1" text @click="save">Save</v-btn>
                  </v-card-actions>
                </v-card>
              </v-dialog>
            </v-toolbar>
          </template>

          <template #item.role="{item}">
            <div>
              <v-chip color="green mr-1" v-for="role in item.role" :key="role.name">{{role}}</v-chip>
            </div>
          </template>
          <template #item.action="{item}">
            <v-icon small class="mr-2" v-if="$can('edit_user')" @click="editItem(item)">mdi-pen</v-icon>
            <v-icon small @click="deleteItem(item)">mdi-eraser</v-icon>
          </template>
        </v-data-table>
        <pagination1 store="UserIndex" collection="users" />
        <!-- <v-pagination total-visible="7" :length="lengthComp"  v-model="currentPageComp"></v-pagination> -->
      </v-card>
    </v-flex>
  </v-layout>
</template>

<script>
// import DataTable from "@/components/admin/Table.vue";
// import Pagination from "@/components/admin/Pagination.vue";
import Pagination1 from "@/components/admin/Pagination1.vue";
import { mapGetters, mapActions, mapMutations } from "vuex";
// import { toRefs, reactive, computed, onMounted } from "@vue/composition-api";
// import { useStore } from "@/compositions/useStore";
export default {
  name: "users",
  components: { Pagination1 },
  data() {
    const columns = [
      { text: "#", value: "id", sortable: true },
      { text: "Email", value: "email", sortable: true },
      {
        text: "Created_At",
        value: "created_at",
        sortable: true
      },
      { text: "Role", value: "role", sortable: false },
      { text: "Action", value: "action", sortable: false }
    ];
    let sortOrders = {};
    columns.forEach(col => (sortOrders[col.name] = -1));
    return {
      tableName: "Users",
      dialog: false,
      itemPerPageOptions: [
        { value: 10 },
        { value: 20 },
        { value: 30 },
        { value: 50 }
      ],
      isEdit: false,
      editedItem: {},
      search: "",
      url: "users",
      columns: columns,
      sortKey: "id",
      sortGroup: sortOrders,
      options: {}
    };
  },
  computed: {
    ...mapGetters("UserIndex", ["users", "query", "fetching"]),
    formTitle() {
      return this.isEdit ? "Edit Item" : "New Item";
    },
    lengthComp() {
      return this.users.meta.last_page;
    },
    currentPageComp() {
      return this.users.meta.current_page;
    },
    total() {
      return this.users.meta.total;
    }
  },
  watch: {
    options: {
      handler: function(options) {
        this.SET_QUERY({ options });
        this.fetchData();
      },
      deep: true
    }
  },
  destroyed() {
    this.INIT_STATE();
  },
  methods: {
    ...mapActions("UserIndex", ["fetchData"]),
    ...mapMutations("UserIndex", ["SET_QUERY", "INIT_STATE"]),
    editItem(item) {
      this.dialog = true;
      this.isEdit = true;
      this.editedItem = item;
    },
    deleteItem(item) {
      console.log(item);
    },
    close() {
      this.dialog = false;
      this.editedItem = {};
      this.isEdit = false;
    },
    save() {
      if (this.isEdit) {
        console.log(this.editedItem);
      } else console.log("Came from add item");
      this.isEdit = false;
    },
    searchData(e) {
      const { itemsPerPage, sortBy, sortDesc } = this.query.options;
      this.fetchData({
        itemsPerPage,
        sortBy,
        sortDesc,
        search: e.target.value
      }).then(res => (this.total = res.meta.total));
      this.search = "";
    },
    getIndex(array, key, value) {
      return array.findIndex(i => i[key] == value);
    },
    sortBy(key) {
      this.sortKey = key;
      this.sortGroup[key] = this.sortGroup[key] * -1;
      this.options.column = this.getIndex(this.columns, "name", key);
      this.options.dir = this.sortGroup[key] >= 1 ? "asc" : "desc";
    },
    searchValue(value) {
      this.options.search = value;
      this.fetchData();
    },
    paginateValue(value) {
      this.options.length = value;
    },
    moveToPage(page) {
      this.options.page = page;
    }
  }
  // setup() {
  //   const store = useStore();
  //   const stateStore = store.state.UserIndex;
  //   const users = computed(() => stateStore.users);
  //   const sortKey = computed(() => stateStore.sortKey);
  //   const sortGroup = computed(() => stateStore.sortGroup);
  //   onMounted(() => {
  //     store.dispatch("UserIndex/fetchUsers");
  //   });
  //   const state = reactive({
  //     url: "users",
  //     module: "UserIndex",
  //     itemsPerPage: [
  //       { value: 10 },
  //       { value: 20 },
  //       { value: 30 },
  //       { value: 50 }
  //     ],
  //     columns: [
  //       { value: "#", name: "id", sortable: true, type: "number" },
  //       { value: "Email", name: "email", sortable: true, type: "string" },
  //       {
  //         value: "Created_At",
  //         name: "created_at",
  //         sortable: true,
  //         type: "date"
  //       },
  //       { value: "Role", name: "role" },
  //       { value: "Action" }
  //     ],
  //     tableName: "Users"
  //   });
  //   state.columns.forEach(col => (sortGroup[col.name] = -1));
  //   onMounted(() => store.commit("UserIndex/SET_GROUP", sortGroup));
  //   return {
  //     users,
  //     ...toRefs(state),
  //     sortKey,
  //     sortGroup
  //   };
};
</script>
