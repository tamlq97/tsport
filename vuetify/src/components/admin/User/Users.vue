<template>
  <v-layout row wrap>
    <v-flex>
      <v-card flat>
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
              <v-select
                v-model="role_name"
                :items="rolesAll"
                item-text="name"
                label="Sort by role"
                @input="filterUsersByRole(role_name)"
                item-value="name"
                outlined
                return-object
              ></v-select>
              <v-spacer></v-spacer>

              <v-text-field
                v-model="search"
                append-icon="mdi mdi-magnify"
                label="Search"
                single-line
                hide-details
                @keypress.enter="searchData"
              ></v-text-field>
              <v-spacer></v-spacer>

              <v-spacer></v-spacer>
              <v-dialog v-model="dialog" max-width="800px">
                <template v-slot:activator="{ on }">
                  <v-btn color="grer" @click="refreshData">
                    <v-icon class="mr-1">mdi-refresh</v-icon>Refresh
                  </v-btn>
                  <v-btn v-show="$can('create_user')" color="primary" dark v-on="on">New Item</v-btn>
                </template>
                <v-card>
                  <v-card-title>
                    <span class="headline">{{ formTitle }}</span>
                  </v-card-title>

                  <v-card-text>
                    <!-- <v-form ref="form"> -->
                    <bootstrap-alert />
                    <validation-observer v-slot="{invalid}">
                      <v-container ref="form">
                        <v-row>
                          <v-text-field v-model="user.id" hidden :hide-details="true" label="id"></v-text-field>
                          <v-col cols="12" sm="6" md="4">
                            <ValidationProvider
                              class="red--text"
                              name="Name"
                              rules="required|max:191"
                              v-slot="{errors}"
                            >
                              <v-text-field
                                :autofocus="true"
                                @input="updateName($event)"
                                v-model="user.name"
                                :label="'Name'"
                              ></v-text-field>
                              <span>{{errors[0]}}</span>
                            </ValidationProvider>
                          </v-col>
                          <v-col cols="12" sm="6" md="4">
                            <ValidationProvider
                              class="red--text"
                              name="Email"
                              rules="required|email|max:191"
                              v-slot="{errors}"
                            >
                              <v-text-field @input="updateEmail" v-model="user.email" label="Email"></v-text-field>
                              <span>{{errors[0]}}</span>
                            </ValidationProvider>
                          </v-col>
                          <v-col cols="12" sm="6" md="4" v-if="isEdit  == false">
                            <ValidationProvider
                              class="red--text"
                              name="Password"
                              rules="required|min:6|max:191"
                              v-slot="{errors}"
                            >
                              <v-text-field
                                @input="updatePassword"
                                v-model="user.password"
                                label="Password"
                              ></v-text-field>
                              <span>{{errors[0]}}</span>
                            </ValidationProvider>
                          </v-col>
                          <v-col cols="12" sm="6" md="4">
                            <validation-provider name="Role" v-slot="{errors}" rules="required">
                              <!-- Role:
                              <vue-select
                                name="role"
                                label="name"
                                :value="user.role"
                                @input="updateRole($event)"
                                :options="rolesAll"
                                multiple
                              ></vue-select>-->
                              <v-select
                                label="Role"
                                return-object
                                single-line
                                multiple
                                v-model="user.role"
                                @input="updateRole($event)"
                                :menu-props="{top:true,offsetY:true}"
                                :items="rolesAll"
                                item-text="name"
                                :error-messages="errors"
                                item-value="name"
                              ></v-select>
                              <!-- <span class="text-danger">{{errors[0]}}</span> -->
                            </validation-provider>
                          </v-col>
                        </v-row>
                        <v-row>
                          <v-spacer></v-spacer>
                          <v-btn
                            color="blue darken-1"
                            v-if="isEdit == false"
                            text
                            @click="refreshForm"
                          >
                            Refresh
                            <v-icon>mdi-refresh</v-icon>
                          </v-btn>
                          <v-btn color="red darken-1" text @click="close">
                            Cancel
                            <v-icon>mdi-cancel</v-icon>
                          </v-btn>
                          <v-btn color="blue darken-1" :disabled="invalid" text @click="save">
                            Save
                            <v-icon>mdi-content-save</v-icon>
                          </v-btn>
                        </v-row>
                      </v-container>
                    </validation-observer>
                    <!-- </v-form> -->
                  </v-card-text>
                </v-card>
              </v-dialog>
            </v-toolbar>
          </template>

          <template #item.role="{item}">
            <div>
              <v-chip color="green mr-1" v-for="(role,k) in item.role" :key="k">{{role.name}}</v-chip>
            </div>
          </template>
          <template #item.action="{item}">
            <v-icon small v-if="$can('edit_user')" @click="editItem(item)">mdi-pen</v-icon>
            <v-icon small v-if="$can('delete_user')" @click="deleteItem(item)">mdi-delete</v-icon>
          </template>
        </v-data-table>
        <pagination1 store="UserIndex" collection="users" />
      </v-card>
    </v-flex>
  </v-layout>
</template>

<script>
import { ValidationProvider, ValidationObserver } from "vee-validate";
import Pagination1 from "@/components/admin/Pagination1.vue";
import { mapGetters, mapActions } from "vuex";
export default {
  name: "users",
  components: { Pagination1, ValidationObserver, ValidationProvider },
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
    return {
      role_name: "",
      roles: [],
      password: "",
      passwordConfirmation: "",
      tableName: "Users",
      dialog: false,
      isEdit: false,
      search: "",
      columns: columns,
      options: {},
      rules: {
        required: v => !!v || "This field are required.",
        email: v => {
          // eslint-disable-next-line no-useless-escape
          let pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
          return pattern.test(v) || "Invalid email.";
        }
      }
    };
  },
  computed: {
    ...mapGetters("UserIndex", ["users", "query", "fetching"]),
    ...mapGetters("UserSingle", ["rolesAll", "user"]),
    formTitle() {
      return this.isEdit == true ? "Edit Item" : "New Item";
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
        this.setQuery({ ...options, role_name: this.role_name.name });
        this.fetchData();
      },
      deep: true
    },
    dialog(val) {
      !val && this.refreshForm();
    }
  },
  created() {
    this.$store.dispatch("UserSingle/fetchRolesAll");
  },
  destroyed() {
    this.resetState();
  },
  methods: {
    ...mapActions("UserIndex", ["fetchData", "setQuery"]),
    ...mapActions("UserSingle", [
      "fetch",
      "store",
      "update",
      "delete",
      "resetState",
      "setUser",
      "updateRole",
      "updateName",
      "updateEmail",
      "updatePassword"
    ]),
    refreshData() {
      this.fetchData({
        page: 1,
        length: 10,
        column: 0,
        dir: "desc",
        search: ""
      });
    },
    changeName(value) {
      console.log(value);
      this.updateName(value);
    },
    changeEmail(value) {
      console.log(this.value);
      this.updateEmail(value);
    },
    changePassword(value) {
      console.log(value);
      this.updatePassword(value);
    },
    changeRole(value) {
      console.log(value);
      this.updateRole(value);
    },
    refreshForm() {
      this.setUser();
      this.isEdit = false;
      this.$store.dispatch("Alert/resetState");
    },
    editItem(item) {
      this.fetch(item);
      this.dialog = true;
      this.isEdit = true;
    },
    filterUsersByRole(role) {
      this.fetchData({ ...this.options, role_name: role.name });
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
          this.delete(item).then(res => {
            console.log(res);
            this.$awn.success("Your item has been delete successfull.");
          });
        }
      });
    },
    close() {
      this.dialog = false;
      this.isEdit = false;
    },
    save() {
      if (this.isEdit) {
        this.update(this.user).then(res => {
          if (res.status == 422) {
            this.dialog = true;
          }
          this.$awn.success("Your item has been update successfull.");
          this.dialog = false;
          this.isEdit = false;
        });
      } else {
        this.store(this.user).then(res => {
          if (res.status == 422) {
            this.dialog = true;
          }
          if (res.status == 201) {
            this.$awn.success("Your item has been create successfull.");
            this.dialog = false;
          }
          this.isEdit = false;
        })
      }
    },
    searchData(e) {
      const { itemsPerPage, sortBy, sortDesc } = this.query;
      this.fetchData({
        itemsPerPage,
        sortBy,
        sortDesc,
        search: e.target.value
      });
      this.search = "";
    }
  }
};
</script>
