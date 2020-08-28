<template>
  <v-layout row wrap>
    <v-flex>
      <v-data-table
        hide-default-footer
        :headers="headers"
        :items="customers.data"
        sort-by="email"
        class="elevation-1"
        :options.sync="query"
      >
        <template v-slot:top>
          <h3 class="text-center">Customer Manager</h3>
          <v-row>
            <v-col xs="12" sm="6" md="6">
              <v-row>
                <v-col xs="12" sm="6" md="6">
                  <v-select
                    :items="[5,10,15,25,50]"
                    single-line
                    label="Items Per Page"
                    @input="changePerPage"
                    v-model="itemsPerPage"
                  />
                </v-col>
                <v-col xs="12" sm="6" md="6">
                  <v-tooltip bottom>
                    <template #activator="{on}">
                      <v-text-field
                        label="Search"
                        v-on="on"
                        @keypress.enter="searchM"
                        v-model="search"
                      />
                    </template>
                    <span>Search by (phone, address, contact name,email)</span>
                  </v-tooltip>
                </v-col>
              </v-row>
            </v-col>
            <v-col xs="12" sm="6" md="6">
              <v-toolbar flat color="white">
                <v-spacer />
                <v-tooltip top>
                  <template #activator="{on}">
                    <v-btn
                      v-on="on"
                      color="primary"
                      v-if="$can('delete_user')"
                      @click="$router.push({name:'users'})"
                    >New Item</v-btn>
                  </template>
                  <span>You need to create and assign role customer for that account.</span>
                </v-tooltip>
                <v-btn color="secondary" @click="refreshData">Refresh</v-btn>
              </v-toolbar>
            </v-col>
          </v-row>
          <v-dialog max-width="1620" v-model="addOrEditDialog">
            <v-card>
              <v-card-title>{{formTitle}}</v-card-title>
              <v-card-text>
                <validation-observer ref="observer" v-slot="{invalid}">
                  <v-form>
                    <v-row>
                      <v-col xs="12" sm="4" md="4">
                        <div class="d-flex">
                          <v-text-field
                            label="Unique Customer ID (max:7 characters)"
                            v-model="customer.makh"
                            counter="7"
                            :disabled="isEdit ? true : false"
                            style="width:150px"
                          />
                          <v-checkbox
                            v-if="!customer.makh"
                            v-model="customer.autogenerate"
                            label="Autogenerate by system"
                          />
                        </div>
                      </v-col>
                      <v-col xs="12" sm="4" md="4">
                        <validation-provider
                          name="Contact FirstName"
                          rules="required"
                          v-slot="{errors}"
                        >
                          <v-text-field
                            label="Contact FirstName"
                            v-model="customer.contact_fname"
                            :error-messages="errors"
                          />
                        </validation-provider>
                      </v-col>
                      <v-col xs="12" sm="4" md="4">
                        <validation-provider
                          name="Contact LastName"
                          rules="required"
                          v-slot="{errors}"
                        >
                          <v-text-field
                            label="Contact LastName"
                            v-model="customer.contact_lname"
                            :error-messages="errors"
                          />
                        </validation-provider>
                      </v-col>
                    </v-row>
                    <validation-provider name="Address" rules="required" v-slot="{errors}">
                      <v-textarea
                        label="Address"
                        v-model="customer.address"
                        :error-messages="errors"
                      />
                    </validation-provider>
                    <v-row>
                      <v-col xs="12" sm="4" md="4">
                        <validation-provider name="City" rules="required" v-slot="{errors}">
                          <v-text-field
                            label="City"
                            v-model="customer.city"
                            :error-messages="errors"
                          />
                        </validation-provider>
                      </v-col>
                      <v-col xs="12" sm="4" md="4">
                        <validation-provider name="Country" rules="required" v-slot="{errors}">
                          <v-text-field
                            label="Country"
                            v-model="customer.country"
                            :error-messages="errors"
                          />
                        </validation-provider>
                      </v-col>
                      <v-col xs="12" sm="4" md="4">
                        <validation-provider name="Phone" rules="required" v-slot="{errors}">
                          <v-text-field
                            label="Phone"
                            type="tel"
                            v-model="customer.phone"
                            :error-messages="errors"
                          />
                        </validation-provider>
                      </v-col>
                    </v-row>
                    <v-row>
                      <v-col xs="12" sm="6" md="6">
                        <validation-provider name="Email" rules="required|email" v-slot="{errors}">
                          <v-text-field
                            label="Email"
                            v-model="customer.email"
                            :error-messages="errors"
                          />
                        </validation-provider>
                      </v-col>
                      <v-col xs="12" sm="6" md="6">
                        <p>
                          <img :src="customer.avatar" v-if="customer.avatar" width="120" />
                          <img :src="previewAvatar" v-if="previewAvatar" width="120" />
                        </p>
                        <validation-provider name="Avatar" rules="required|image" v-slot="{errors}">
                          <v-file-input
                            label="Avatar"
                            v-model="avatar"
                            @change="previewAvatarM"
                            :error-messages="errors"
                          />
                        </validation-provider>
                      </v-col>
                    </v-row>
                    <div class="d-flex justify-center">
                      <v-btn color="primary" @click="save" :disabled="invalid">Save</v-btn>
                      <v-btn color="red" @click="reset" type="reset">Reset</v-btn>
                      <v-btn color="secondary" @click="close">Close</v-btn>
                    </div>
                  </v-form>
                </validation-observer>
              </v-card-text>
            </v-card>
          </v-dialog>
        </template>
        <template #item.contact_name="{item}">
          <span>{{item.contact_fname + ' ' + item.contact_lname}}</span>
        </template>
        <template v-slot:item.action="{ item }">
          <div class="d-flex">
            <v-btn x-small color="primary" v-if="$can('edit_customer')" @click="editItem(item)">
              Edit
              <v-icon>mdi-pen</v-icon>
            </v-btn>
            <v-btn x-small color="danger" v-if="$can('delete_customer')" @click="deleteItem(item)">
              Delete
              <v-icon>mdi-delete</v-icon>
            </v-btn>
          </div>
        </template>
        <template #item.payment_type="{item}">{{item.payment.payment_type}}</template>
        <template #item.customer="{item}">
          <span
            v-if="item && item.customer"
          >{{item.customer.contact_fname +" "+item.customer.contact_lname}}</span>
        </template>
      </v-data-table>
      <v-pagination v-model="page" :length="total" :total-visible="7"></v-pagination>
    </v-flex>
  </v-layout>
</template>

<script>
import { ValidationProvider, ValidationObserver } from "vee-validate";
import { apiURL, convertObjectToFormData } from "@/utils";
const INIT_QUERY = {
  groupDesc: [],
  itemsPerPage: 10,
  page: 1,
  length: 10,
  sortBy: ["email"],
  sortDesc: []
};
export default {
  components: {
    ValidationProvider,
    ValidationObserver
  },
  data: () => ({
    itemsPerPage: 10,
    avatar: null,
    customerDialog: false,
    page: 1,
    search: "",
    dialog: false,
    previewAvatar: "",
    headers: [
      {
        text: "Customer Code",
        align: "start",
        sortable: false,
        value: "makh"
      },
      { text: "Contact Name", value: "contact_name", sortable: true },
      { text: "Address", value: "address", sortable: true },
      { text: "Phone", value: "phone", sortable: true },
      { text: "Email", value: "email", sortable: true },
      { text: "Action", value: "action", sortable: false }
    ],
    customers: [],
    query: INIT_QUERY,
    isEdit: false,
    customer: {},
    addOrEditDialog: false,
    total: 0
  }),

  watch: {
    addOrEditDialog: function(val) {
      !val && this.refreshForm();
    },
    query: {
      handler: function(query) {
        let params = {
          column: query.sortBy[0],
          dir: query.sortDesc[0],
          length: query.length,
          page: query.page,
          search: this.search
        };
        this.search = "";
        this.fetchData(params);
      },
      deep: true
    }
  },
  computed: {
    formTitle() {
      return this.isEdit ? "Edit Item" : "New Item";
    },
    suppliersAll() {
      return this.$store.getters["ProductSingle/suppliersAll"];
    }
  },

  created() {
    this.fetchData(this.query);
  },
  mounted() {
    this.$store.dispatch("ProductSingle/fetchSuppliersAll");
  },
  methods: {
    changePerPage() {
      let query = { ...this.query, itemsPerPage: this.itemsPerPage };
      this.fetchData(query);
    },
    reset() {
      this.$refs.observer.reset();
      this.previewAvatar = "";
    },
    async save() {
      if (this.isEdit) {
        let formData = new FormData();
        this.customer.avatar = this.avatar;
        convertObjectToFormData(this.customer, formData);
        formData.append("_method", "put");
        let {
          data: { message }
        } = await apiURL.post(`customers1/${this.customer.makh}`, formData);
        this.$awn.success(message);
        this.isEdit = false;
        this.addOrEditDialog = false;
        this.fetchData(this.query);
      } else {
        let formData = new FormData();
        convertObjectToFormData(this.customer, formData);
        let {
          data: { message }
        } = await apiURL.post(`customer`, formData);
        this.$awn.success(message);
        this.addOrEditDialog = false;
        this.fetchData(this.query);
      }
    },
    searchM() {
      let params = {
        column: this.query.sortBy[0],
        dir: this.query.sortDesc[0],
        length: this.query.length,
        page: this.query.page,
        search: this.search
      };
      this.search = "";
      this.fetchData(params);
    },
    previewAvatarM(e) {
      this.previewAvatar = URL.createObjectURL(e);
      this.avatar = e;
    },
    close() {
      this.$refs.observer.reset((this.isEdit = false)),
        (this.addOrEditDialog = false),
        (this.customer = {});
    },
    async fetchData(params) {
      let { data } = await apiURL.get("customers", {
        params: params
      });
      this.customers = data;
      this.total = data.meta.last_page;
    },
    refreshForm() {
      (this.isEdit = false),
        (this.addOrEditDialog = false),
        (this.customer = {});
      this.previewAvatar = "";
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
      }).then(async result => {
        if (result.value) {
          let { data } = await apiURL.delete(`customers/${item.makh}`);
          this.$awn.success(data.message);
          this.fetchData(this.query);
        }
      });
    },
    editItem(item) {
      this.isEdit = true;
      this.addOrEditDialog = true;
      this.customer = item;
    },
    refreshData() {
      this.query = INIT_QUERY;
      this.itemsPerPage = 10;
      this.fetchData(INIT_QUERY);
    }
  }
};
</script>