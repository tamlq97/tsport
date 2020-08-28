<template>
  <v-layout>
    <v-flex>
      <v-card flat>
        <v-card-title>Roles</v-card-title>
        <div
          class="row"
          style="position: absolute;
            left: 50%;
            transform: translateX(-50%);"
          v-if="fetching"
        >
          <div class="col-xs-4 col-xs-offset-4">
            <div class="alert text-center">
              <i class="fa fa-spin fa-refresh"></i> Loading
            </div>
          </div>
        </div>
        <data-table
          v-if="!fetching"
          :url="url"
          :columns="columns"
          :itemPerPageOptions="itemPerPageOptions"
          :items="roles"
          :options="options"
          :sort-key="sortKey"
          :sort-group="sortGroup"
          :search="search"
          @sortBy="sortBy"
          @searchValue="searchValue"
          @paginateValue="paginateValue"
        >
          <template #dialog>
            <v-dialog v-model="dialog" max-width="800px">
              <template v-slot:activator="{ on }">
                <v-btn color="gray" @click.prevent="refreshData">
                  <v-icon class="mr-1">mdi-refresh</v-icon>Refresh
                </v-btn>
                <v-btn v-show="$can('create_user')" color="primary" dark v-on="on">New Item</v-btn>
              </template>
              <v-card>
                <v-card-title>{{formTitle}}</v-card-title>

                <v-card-text>
                  <!-- <v-form ref="form"> -->
                  <bootstrap-alert />
                  <v-container ref="form">
                    <v-row>
                      <v-col cols="12" sm="6" md="4">
                        <ValidationProvider
                          class="red--text"
                          name="Name"
                          rules="required|max:191"
                          v-slot="{errors}"
                        >
                          <v-text-field
                            :autofocus="true"
                            :label="'Name'"
                            v-model="role.name"
                            @input="updateName"
                          ></v-text-field>
                          <span>{{errors[0]}}</span>
                        </ValidationProvider>
                      </v-col>
                      <v-col v-if="isEdit" cols="12" sm="6" md="4" >
                        Role:
                        <vue-select
                          name="permission"
                          label="name"
                          :value="role.permission"
                          @input="updatePermission($event)"
                          :options="permissionsAll"
                          multiple
                        ></vue-select>
                      </v-col>
                    </v-row>
                  </v-container>
                  <!-- </v-form> -->
                </v-card-text>

                <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn color="blue darken-1" @click="refreshForm" text>
                    Refresh
                    <v-icon>mdi-refresh</v-icon>
                  </v-btn>
                  <v-btn color="red darken-1" text @click="close">
                    Cancel
                    <v-icon>mdi-cancel</v-icon>
                  </v-btn>
                  <v-btn color="blue darken-1" @click="save" text>
                    Save
                    <v-icon>mdi-content-save</v-icon>
                  </v-btn>
                </v-card-actions>
              </v-card>
            </v-dialog>
          </template>
          <template v-slot:default="{data}">
            <tr v-for="v in data" :key="v.id">
              <td>{{v.id}}</td>
              <td>{{v.name}}</td>
              <td>
                <v-chip
                  class="mr-1 mb-1"
                  color="orange"
                  v-for="permission in v.permission"
                  :key="permission.id"
                >{{permission.name}}</v-chip>
              </td>
              <slot name="role" :role="v"></slot>
              <td>
                <div class="btn-group">
                  <button class="btn btn-primary" v-if="$can('edit_user')" @click="editItem(v)">Edit</button>
                  <button
                    class="btn btn-danger"
                    v-if="$can('delete_user')"
                    @click="deleteItem(v)"
                  >Delete</button>
                </div>
              </td>
            </tr>
          </template>
        </data-table>
        <pagination
          v-if="!fetching"
          :url="url"
          :length="roles.meta.last_page"
          @moveToPage="moveToPage"
          :page="roles.meta.current_page"
        ></pagination>
      </v-card>
    </v-flex>
  </v-layout>
</template>

<script>
import DataTable from "@/components/admin/Table.vue";
import Pagination from "@/components/admin/Pagination.vue";
import { mapActions, mapGetters } from "vuex";
import { getIndex } from "@/utils";
export default {
  components: {
    DataTable,
    Pagination
  },
  data() {
    let columns = [
      { name: "id", value: "ID", sortable: true, type: "number" },
      { name: "name", value: "Name", sortable: true },
      { name: "permission", value: "Permission", sortable: false },
      { value: "Action" }
    ];
    let sortOrders = {};
    columns.forEach(col => (sortOrders[col.name] = -1));

    return {
      isEdit: false,
      dialog: false,
      tableName: "Roles",
      columns: columns,
      editedItem: {},
      sortGroup: sortOrders,
      sortKey: "id",
      search: "",
      url: "roles",
      options: {
        page: 1,
        length: 10,
        search: "",
        column: 0,
        dir: "desc"
      },
      itemPerPageOptions: [
        { value: "10" },
        { value: "20" },
        { value: "30" },
        { value: "50" }
      ]
    };
  },
  created() {
    this.$store.dispatch("RoleSingle/fetchPermisisonsAll");
    this.options = this.query;
  },
  watch: {
    options: {
      handler: function(query) {
        this.setQuery(query);
        this.fetchData();
      },
      deep: true
    },
    dialog(val) {
      !val && this.refreshForm();
    }
  },
  computed: {
    ...mapGetters("RoleIndex", ["roles", "query", "fetching"]),
    ...mapGetters("RoleSingle", ["role", "permissionsAll"]),
    formTitle() {
      return this.isEdit ? "Edit Role" : "Create Role";
    }
  },
  destroyed() {
    this.resetState();
  },
  methods: {
    ...mapActions("RoleIndex", ["fetchData", "resetState", "setQuery"]),
    ...mapActions("RoleSingle", [
      "updateName",
      "fetch",
      "updatePermission",
      "setRole",
      "update",
      "store",
      "delete"
    ]),
    refreshForm() {
      this.setRole();
      this.isEdit = false;
    },
    save() {
      if (this.isEdit) {
        this.update().then(res => {
          if (res.status == 422) {
            this.dialog = true;
          }
                      this.$awn.success('Your role has been update successfull.')
          
          this.dialog = false;
          this.isEdit = false;
        });
      } else {
        this.store().then(res => {
          if (res.status == 422) {
            this.dialog = true;
          }
          if (res.status == 201) {
                      this.$awn.success('Your role has been create successfull.')
            this.dialog = false;
          }
          this.isEdit = false;
        });
      }
    },
    editItem(item) {
      this.setRole(item);
      this.dialog = true;
      this.isEdit = true;
      this.fetch();
    },
    deleteItem(item) {
      this.$swal({
        title: "Are you sure?",
        text: `You won't be able to revert this!`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Delete",
        confirmButtonColor: "#dd4b39",
        focusCancel: true,
        reverseButtons: true
      }).then(result => {
        if (result.value) {
          this.setRole(item);
          this.delete().then(() => {
                      this.$awn.success('Your role has been delete successfull.')
            
          });
        }
      });
    },
    close() {
      this.dialog = false;
    },
    sortBy(key) {
      this.options.column = getIndex(this.columns, "name", key);
      this.sortKey = key;
      this.sortGroup[key] = this.sortGroup[key] * -1;
      this.options.dir = this.sortGroup[key] >= 1 ? "asc" : "desc";
    },
    searchValue(value) {
      this.options.search = value;
    },
    paginateValue(value) {
      this.options.length = value;
    },
    moveToPage(page) {
      this.options.page = page;
    },
    refreshData() {
      this.fetchData({
        length: 10,
        dir: "desc",
        column: 0,
        search: "",
        page: 1
      });
      this.options.search=""
    }
  }
};
</script>
