<template>
  <v-layout row wrap>
    <v-flex>
      <v-data-table
        hide-default-footer
        :headers="headers"
        :items="suppliers.data"
        sort-by="company_name"
        class="elevation-1"
        :options.sync="query"
      >
        <template v-slot:top>
          <v-toolbar flat color="white">
            <v-toolbar-title>Supplier Manager</v-toolbar-title>
            <v-divider class="mx-4" inset vertical />
            <v-select
              :items="[5,10,15,25,50]"
              single-line
              label="Items Per Page"
              @input="changePerPage"
              v-model="itemsPerPage"
            />
            <v-spacer></v-spacer>
            <v-tooltip bottom>
              <template #activator="{on}">
                <v-text-field label="Search" v-on="on" @keypress.enter="searchM" v-model="search" />
              </template>
              <span>Search by (phone, company name, address, contact name,email)</span>
            </v-tooltip>
            <v-spacer></v-spacer>
            <v-tooltip top>
              <template #activator="{on}">
                <v-btn
                  v-on="on"
                  color="primary"
                  v-if="$can('delete_user')"
                  @click="$router.push({name:'users'})"
                >New Item</v-btn>
              </template>
              <span>You need to create and assign role supplier for that account.</span>
            </v-tooltip>
            <v-btn color="secondary" @click="refreshData">Refresh</v-btn>
          </v-toolbar>
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
                            label="Unique Supplier ID (max:7 characters)"
                            v-model="supplier.supplier_code"
                            counter="7"
                            :disabled="isEdit ? true : false"
                            style="width:150px"
                          />
                          <v-checkbox
                            v-if="!supplier.supplier_code"
                            v-model="supplier.autogenerate"
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
                            v-model="supplier.contact_fname"
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
                            v-model="supplier.contact_lname"
                            :error-messages="errors"
                          />
                        </validation-provider>
                      </v-col>
                    </v-row>

                    <validation-provider name="Company Name" rules="required" v-slot="{errors}">
                      <v-text-field
                        label="Company Name"
                        v-model="supplier.company_name"
                        :error-messages="errors"
                      />
                    </validation-provider>

                    <validation-provider name="Address" rules="required" v-slot="{errors}">
                      <v-textarea
                        label="Address"
                        v-model="supplier.address"
                        :error-messages="errors"
                      />
                    </validation-provider>
                    <v-row>
                      <v-col xs="12" sm="4" md="4">
                        <validation-provider name="City" rules="required" v-slot="{errors}">
                          <v-text-field
                            label="City"
                            v-model="supplier.city"
                            :error-messages="errors"
                          />
                        </validation-provider>
                      </v-col>
                      <v-col xs="12" sm="4" md="4">
                        <validation-provider name="Country" rules="required" v-slot="{errors}">
                          <v-text-field
                            label="Country"
                            v-model="supplier.country"
                            :error-messages="errors"
                          />
                        </validation-provider>
                      </v-col>
                      <v-col xs="12" sm="4" md="4">
                        <validation-provider name="Phone" rules="required" v-slot="{errors}">
                          <v-text-field
                            label="Phone"
                            type="tel"
                            v-model="supplier.phone"
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
                            v-model="supplier.email"
                            :error-messages="errors"
                          />
                        </validation-provider>
                      </v-col>
                      <v-col xs="12" sm="6" md="6">
                        <p>
                          <img :src="supplier.logo" v-if="supplier.logo" width="120" />
                          <img :src="previewLogo" v-if="previewLogo" width="120" />
                        </p>
                        <validation-provider name="Logo" rules="required|image" v-slot="{errors}">
                          <v-file-input
                            label="Logo"
                            v-model="logo"
                            @change="previewLogoM"
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
            <v-btn
              x-small
              color="primary"
              v-if="$can('edit_supplier') || $can('delete_user')"
              @click="editItem(item)"
            >
              Edit
              <v-icon>mdi-pen</v-icon>
            </v-btn>
            <v-btn
              x-small
              color="danger"
              v-if="$can('delete_supplier') || $can('delete_user')"
              @click="deleteItem(item)"
            >
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
  sortBy: ["company_name"],
  sortDesc: []
};
export default {
  components: {
    ValidationProvider,
    ValidationObserver
  },
  data: () => ({
    itemsPerPage: 10,
    logo: null,
    supplierDialog: false,
    page: 1,
    search: "",
    dialog: false,
    previewLogo: "",
    headers: [
      {
        text: "Supplier Code",
        align: "start",
        sortable: false,
        value: "supplier_code"
      },
      { text: "Company Name", value: "company_name", sortable: true },
      { text: "Contact Name", value: "contact_name", sortable: true },
      { text: "Address", value: "address", sortable: true },
      { text: "Phone", value: "phone", sortable: true },
      { text: "Email", value: "email", sortable: true },
      { text: "Action", value: "action", sortable: false }
    ],
    suppliers: [],
    query: INIT_QUERY,
    isEdit: false,
    supplier: {},
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
      this.previewLogo = "";
    },
    async save() {
      if (this.isEdit) {
        let formData = new FormData();
        this.supplier.logo = this.logo;
        convertObjectToFormData(this.supplier, formData);
        formData.append("_method", "put");
        let {
          data: { message }
        } = await apiURL.post(
          `suppliers/${this.supplier.supplier_code}`,
          formData
        );
        this.$awn.success(message);
        this.isEdit = false;
        this.addOrEditDialog = false;
        this.fetchData(this.query);
      } else {
        let formData = new FormData();
        convertObjectToFormData(this.supplier, formData);
        let {
          data: { message }
        } = await apiURL.post(`suppliers`, formData);
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
    previewLogoM(e) {
      this.previewLogo = URL.createObjectURL(e);
      this.logo = e;
    },
    close() {
      this.$refs.observer.reset((this.isEdit = false)),
        (this.addOrEditDialog = false),
        (this.supplier = {});
    },
    async fetchData(params) {
      let { data } = await apiURL.get("suppliers", {
        params: params
      });
      this.suppliers = data;
      this.total = data.meta.last_page;
    },
    refreshForm() {
      (this.isEdit = false),
        (this.addOrEditDialog = false),
        (this.supplier = {});
      this.previewLogo = "";
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
          let { data } = await apiURL.delete(`suppliers/${item.supplier_code}`);
          this.$awn.success(data.message);
          this.fetchData(this.query);
        }
      });
    },
    editItem(item) {
      this.isEdit = true;
      this.addOrEditDialog = true;
      this.supplier = item;
    },
    refreshData() {
      this.query = INIT_QUERY;
      this.itemsPerPage = 10;
      this.fetchData(INIT_QUERY);
    }
  }
};
</script>