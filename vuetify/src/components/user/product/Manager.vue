<template>
  <v-layout row wrap>
    <v-flex>
      <v-card flat>
        <v-data-table
          :search="search"
          :headers="columns"
          :items="products.data"
          :options.sync="options"
          :serverItemsLength="total"
          :loading="fetching"
          :hide-default-footer="true"
          class="elevation-1"
        >
          <template #item.product_name="{item}">
            <span
              v-html="item.product_name"
              style="cursor:pointer"
              @click="$router.push({path:'/collection/'+item.categories[0].slug+'/products/'+item.slug+'-'+item.color[0].name+'-'+item.id,params:{cate_type:item.categories[0].parent.slug,cate_name:item.categories[0].slug}})"
            ></span>
          </template>
          <template v-slot:top>
            <v-toolbar flat color="white">
              <v-toolbar-title>Products</v-toolbar-title>
              <v-divider class="mx-4" inset vertical></v-divider>
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
              <v-dialog v-model="supplierDialog" max-width="800">
                <v-card>
                  <v-card-title>New Supplier</v-card-title>
                  <v-card-text>
                    <validation-observer v-slot="{invalid}">
                      <validation-provider name="Company Name" rules="required" v-slot="{errors}">
                        <v-text-field
                          v-model="supplier.company_name"
                          :error-messages="errors"
                          label="Company Name"
                        />
                      </validation-provider>
                      <v-btn color="primary" @click="createSupplier" :disabled="invalid">Save</v-btn>
                    </validation-observer>
                  </v-card-text>
                </v-card>
              </v-dialog>
              <v-dialog v-model="categoryNameDialog" max-width="800">
                <v-card>
                  <v-card-title>New Category</v-card-title>
                  <v-card-text>
                    <validation-observer v-slot="{invalid}">
                      <validation-provider name="Category Name" rules="required" v-slot="{errors}">
                        <v-text-field
                          v-model="category.name"
                          :error-messages="errors"
                          label="Category Name"
                        />
                      </validation-provider>
                      <v-textarea v-model="category.description" label="Description (option)" />
                      <v-btn color="primary" @click="createCategory" :disabled="invalid">Save</v-btn>
                    </validation-observer>
                  </v-card-text>
                </v-card>
              </v-dialog>
              <v-dialog v-model="dialog" max-width="1620">
                <template v-slot:activator="{ on }">
                  <v-btn
                    color="gray"
                    @click="fetchData({itemsPerPage:10,search:'',sortBy:'',sortDesc:''})"
                  >
                    <v-icon class="mr-1">mdi-refresh</v-icon>Refresh
                  </v-btn>
                  <v-btn v-show="$can('create_product')" color="primary" dark v-on="on">New Item</v-btn>
                </template>
                <v-card>
                  <v-card-title>
                    <span class="headline">{{ formTitle }}</span>
                    <p v-if="isEdit">
                      <v-btn @click="quantityDialog = true" color="primary">Import quantity</v-btn>
                      <v-btn
                        @click="$router.push({path:'/user/products/'+productEdit.id+'/colors/'+productEdit.color[0].id})"
                        color="primary"
                      >Manager Image</v-btn>
                    </p>
                  </v-card-title>

                  <v-card-text>
                    <!-- <v-form ref="form"> -->
                    <bootstrap-alert />
                    <v-container fluid ref="form">
                      <validation-observer v-slot="{invalid}">
                        <v-row>
                          <v-col sm="12">
                            <div class="d-flex">
                              <v-text-field
                                label="Unique Product ID (max:7 characters)"
                                v-model="productEdit.masp"
                                counter="7"
                                :disabled="isEdit ? true : false"
                                style="width:150px"
                              />
                              <v-checkbox
                                v-if="!productEdit.masp"
                                v-model="productEdit.autogenerate"
                                label="Autogenerate by system"
                              />
                            </div>
                            <validation-provider
                              v-slot="{errors}"
                              name="Product Name"
                              rules="required|max:255"
                            >
                              <label for>Name:</label>
                              <ckeditor
                                :editor="editor"
                                v-model="productEdit.product_name"
                                :config="editorConfig"
                              ></ckeditor>
                              <span class="text-danger">{{errors[0]}}</span>
                            </validation-provider>
                            <br />
                            <validation-provider
                              v-slot="{errors}"
                              name="Product Description"
                              rules="required"
                            >
                              <label for>Description:</label>
                              <ckeditor
                                :editor="editor"
                                v-model="productEdit.product_description"
                                :config="editorConfig"
                              ></ckeditor>
                              <span class="text-danger">{{errors[0]}}</span>
                            </validation-provider>

                            <v-row>
                              <v-col sm="12" lg="6" md="6">
                                <v-row>
                                  <v-col sm="12" md="6" lg="6">
                                    <validation-provider
                                      v-slot="{errors}"
                                      name="Supplier"
                                      rules="required"
                                    >
                                      <v-select
                                        v-model="productEdit.supplier_name"
                                        :items="suppliersAll"
                                        item-text="company_name"
                                        item-value="id"
                                        label="Supplier"
                                        :menu-props="{top:true,offsetY: true }"
                                        persistent-hint
                                        append-icon="mdi-plus"
                                        @click:append="supplierDialog = !supplierDialog"
                                        return-object
                                        single-line
                                        :error-messages="errors"
                                      ></v-select>
                                    </validation-provider>
                                  </v-col>
                                  <v-col sm="12" lg="6" md="6">
                                    <validation-provider
                                      rules="required"
                                      v-slot="{errors}"
                                      name="Price"
                                    >
                                      <v-text-field
                                        label="Price"
                                        type="number"
                                        min="1"
                                        v-model="productEdit.product_price"
                                      ></v-text-field>
                                      <span class="text-danger">{{errors[0]}}</span>
                                    </validation-provider>
                                  </v-col>
                                </v-row>
                              </v-col>
                              <v-col sm="12" lg="6" md="6">
                                <v-row>
                                  <v-col sm="12" lg="4" md="4">
                                    <v-text-field
                                      label="Discount (%)"
                                      type="number"
                                      v-model="productEdit.discount"
                                    ></v-text-field>
                                  </v-col>
                                  <v-col sm="12" lg="4" md="4">
                                    <v-checkbox
                                      label="Discount Available"
                                      v-model="productEdit.discount_available"
                                    />
                                  </v-col>
                                  <v-col sm="12" lg="4" md="4">
                                    <v-checkbox
                                      v-model="productEdit.product_available"
                                      label="Product Available"
                                    />
                                  </v-col>
                                </v-row>
                              </v-col>
                            </v-row>
                            <v-row>
                              <v-col sm="12" md="4" lg="4">
                                <validation-provider
                                  rules="required"
                                  v-slot="{errors}"
                                  name="Color"
                                >
                                  Color:
                                  <vue-select
                                    name="name"
                                    label="name"
                                    :value="productEdit.color_name"
                                    v-model="productEdit.color_name"
                                    :options="colorsAll"
                                    multiple
                                  ></vue-select>
                                  <span class="text-danger">{{errors[0]}}</span>
                                </validation-provider>
                              </v-col>
                              <v-col sm="12" md="4" lg="4">
                                <validation-provider
                                  rules="required"
                                  v-slot="{errors}"
                                  name="Category Type"
                                >
                                  Category Type:
                                  <vue-select
                                    name="name"
                                    label="name"
                                    :value="productEdit.cate_type"
                                    v-model="productEdit.cate_type"
                                    @input="clearCateName"
                                    :options="categories.data"
                                  ></vue-select>
                                  <span class="text-danger">{{errors[0]}}</span>
                                </validation-provider>
                              </v-col>

                              <v-col sm="12" md="4" lg="4">
                                <template v-if="productEdit.cate_type">
                                  <validation-provider
                                    rules="required"
                                    v-slot="{errors}"
                                    name="Category Name"
                                  >
                                    <v-select
                                      :items="cateNamesOfType"
                                      label="Category Name"
                                      item-text="name"
                                      item-value="name"
                                      single-line
                                      append-icon="mdi-plus"
                                      :menu-props="{top:true,offsetY: true }"
                                      @click:append="categoryNameDialog = !categoryNameDialog"
                                      v-model="productEdit.cate_name"
                                      multiple
                                      return-object
                                      :error-messages="errors"
                                    />
                                    <!-- <span class="text-danger">{{errors[0]}}</span> -->
                                  </validation-provider>
                                </template>
                              </v-col>
                            </v-row>
                          </v-col>
                        </v-row>
                        <v-row>
                          <v-col class="text-right">
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
                            <v-btn :disabled="invalid" color="blue darken-1" text @click="save">
                              Save
                              <v-icon>mdi-content-save</v-icon>
                            </v-btn>
                          </v-col>
                        </v-row>
                      </validation-observer>
                    </v-container>
                    <!-- </v-form> -->
                  </v-card-text>
                </v-card>
              </v-dialog>
              <v-dialog max-width="800px" v-model="quantityDialog">
                <v-card flat>
                  <v-card-title class="text-center headline">Update Quantity</v-card-title>
                  <validation-observer v-slot="{invalid}">
                    <v-row>
                      <v-col md="6" sm="12">
                        <validation-provider rules="required" name="Color" v-slot="{errors}">
                          <v-select
                            v-model="productEdit.color_name"
                            :items="productEdit.color"
                            item-text="name"
                            item-value="name"
                            label="Color"
                            @input="productEdit.size={}"
                            :menu-props="{offsetY: true }"
                            return-object
                            single-line
                            :error-messages="errors"
                          ></v-select>
                        </validation-provider>
                      </v-col>

                      <v-col md="6" sm="12" v-if="productEdit.color_name">
                        <validation-provider rules="required" name="Size" v-slot="{errors}">
                          Size:
                          <vue-select
                            name="name"
                            label="name"
                            :value="productEdit.size"
                            v-model="productEdit.size"
                            @input="filterQuantityBySize"
                            :options="filterSizeByColor"
                          ></vue-select>
                          <span class="text-danger">{{errors[0]}}</span>
                        </validation-provider>
                      </v-col>
                    </v-row>
                    <v-row>
                      <v-col sm="12" v-if="productEdit.size">
                        <validation-provider rules="required" name="Quantity" v-slot="{errors}">
                          <v-text-field
                            v-model="productEdit.quantity"
                            type="number"
                            min="0"
                            label="Quantity"
                          ></v-text-field>
                          <span class="text-danger">{{errors[0]}}</span>
                        </validation-provider>
                      </v-col>
                    </v-row>
                    <v-row>
                      <v-col sm="12" class="text-center">
                        <v-btn
                          @click="quantityDialog = false"
                          class="mr-2 bg-danger text-white"
                        >close</v-btn>
                        <v-btn
                          :disabled="invalid"
                          class="bg-primary text-white"
                          @click="updateQuantity"
                        >Save</v-btn>
                      </v-col>
                    </v-row>
                  </validation-observer>
                </v-card>
              </v-dialog>
            </v-toolbar>
          </template>

          <template #item.size="{item}">
            <span
              v-if="item.color.length > 0 && item.color[0].sizes.length > 0"
            >{{item.color[0].sizes[0].name}}</span>
          </template>

          <template #item.quantity="{item}">
            <span
              v-if="item.color.length > 0 && item.color[0].sizes.length > 0"
            >{{item.color[0].sizes[0].quantity}}</span>
          </template>

          <template #item.image="{item}">
            <v-img
              width="100"
              class="ma-1"
              :src="item.color.length && item.color[0].pictures.length
            && item.color[0].pictures[0].src.includes('//') ? 'http'+item.color[0].pictures[0].src
            : (item.color.length && item.color[0].pictures.length ? item.imgLink+'/colors/'+item.color[0].id+'/'
            +item.color[0].pictures[0].type+'/'+item.color[0].pictures[0].src : '')
             "
            ></v-img>
          </template>

          <template #item.role="{item}">
            <div>
              <v-chip color="green mr-1" v-for="role in item.role" :key="role.id">{{role.name}}</v-chip>
            </div>
          </template>
          <template #item.product_available="{item}">
            <v-checkbox
              v-model="item.product_available"
              :disabled="(($can('edit_product') && ($root['user'].supplier && $root['user'].supplier.id) == item.supplier_id) || $can('delete_user')) ? false : true"
              @change="updateProdStatus(item)"
            />
          </template>
          <template #item.action="{item}">
            <v-icon
              small
              v-if="($can('edit_product') && ($root['user'].supplier && $root['user'].supplier.id) == item.supplier_id) || $can('delete_user')"
              @click="editItem(item)"
            >mdi-pen</v-icon>
            <v-icon
              small
              v-if="($can('delete_product') && ($root['user'].supplier && $root['user'].supplier.id) == item.supplier_id) || $can('delete_user')"
              @click="deleteItem(item)"
            >mdi-delete</v-icon>
          </template>
        </v-data-table>
        <pagination1 store="ProductIndex" collection="products" />
      </v-card>
    </v-flex>
  </v-layout>
</template>

<script>
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import Pagination1 from "@/components/admin/Pagination1.vue";
// import AddImageProdColor from "@/components/user/product/AddImageForColor.vue";
import { mapGetters, mapActions } from "vuex";
import { ValidationObserver, ValidationProvider } from "vee-validate";
export default {
  name: "products",
  components: {
    Pagination1,
    // AddImageProdColor,
    ValidationObserver,
    ValidationProvider
  },
  data() {
    const columns = [
      { text: "#", value: "id", sortable: true },
      { text: "Name", value: "product_name", sortable: true },
      {
        text: "Price",
        value: "product_price",
        sortable: true
      },
      { text: "Image", value: "image", sortable: false },
      {
        text: "Product Available",
        value: "product_available",
        sortable: false
      },
      { text: "Quantity", value: "quantity", sortable: false },
      { text: "Size", value: "size", sortable: false },

      { text: "Action", value: "action", sortable: false }
    ];
    return {
      user: {},
      category: {},
      categoryNameDialog: false,
      supplier: {},
      supplierDialog: false,
      quantityDialog: false,
      addImageDialog: false,
      productEdit: {
        cate_name: {
          name: ""
        },
        discount_available: false,
        product_available: false
      },
      images: [],
      imagesUrl: [],
      editor: ClassicEditor,
      editorConfig: {
        // The configuration of the editor.
      },
      quantity: 0,

      tableName: "Products",
      dialog: false,
      isEdit: false,
      search: "",
      columns: columns,
      options: {}
    };
  },
  computed: {
    ...mapGetters("ProductIndex", ["products", "query", "fetching"]),
    ...mapGetters("ProductSingle", [
      "product",
      "colorsAll",
      "sizesAll",
      "suppliersAll"
    ]),
    categories() {
      return this.$store.getters["Category/categories"];
    },
    formTitle() {
      return this.isEdit == true ? "Edit Item" : "New Item";
    },
    lengthComp() {
      return this.products.meta.last_page;
    },
    currentPageComp() {
      return this.products.meta.current_page;
    },
    filterSizeByColor() {
      let product = this.$store.getters["ProductSingle/product"];
      let color = [];
      if (this.productEdit.color_name) {
        color = product.color.filter(
          c => c.name == this.productEdit.color_name.name
        )[0];
        return color.sizes;
      }
      return color;
    },
    cateNamesOfType() {
      let { data } = this.categories;
      let cate = [];
      if (this.productEdit) {
        cate = data.filter(c => c.name == this.productEdit.cate_type.name);
        cate = cate[0].children.filter(
          c =>
            c.name.toLowerCase() != "shop by category" &&
            c.name.toLowerCase() != "shop by collection" &&
            c.name.toLowerCase() != "view all" &&
            c.name.toLowerCase() != "all products"
        );
      }
      return cate;
    },
    total() {
      return this.products.meta.total;
    }
  },
  watch: {
    options: {
      handler: function(options) {
        this.setQuery(options);
        this.fetchData();
      },
      deep: true
    },
    dialog(val) {
      !val && this.refreshForm();
    },
    addImageDialog(val) {
      !val && this.refreshForm();
    }
  },
  mounted() {
    this.fetchSizeAndColor();
    this.$store.dispatch("ProductSingle/fetchSuppliersAll");
    this.$store.dispatch("Category/fetchData", { showData: true });
  },
  destroyed() {
    this.resetState();
  },
  methods: {
    ...mapActions("ProductIndex", ["fetchData", "setQuery"]),
    ...mapActions("ProductSingle", [
      "fetch",
      "store",
      "update",
      "delete",
      "resetState",
      "setProduct",
      "fetchSizesAll",
      "fetchColorsAll"
    ]),
    updateProdStatus(item) {
      this.$store
        .dispatch("ProductSingle/updateProdStatus", {
          id: item.id,
          product_available: item.product_available
        })
        .then(({ message }) => this.$awn.success(message))
        .catch(response => console.log(response));
    },
    createCategory() {
      let category = {
        ...this.category,
        parent: this.productEdit.cate_type.id
      };
      this.$store.dispatch("Category/store", category).then(({ message }) => {
        this.$awn.success(message);
        this.category = {};
        this.categoryNameDialog = false;
      });
    },
    createSupplier() {
      this.$store
        .dispatch("Supplier/store", this.supplier)
        .then(({ message }) => {
          this.$awn.success(message);
          this.supplierDialog = false;
        });
    },
    filterQuantityBySize() {
      let quantity = 0;
      if (this.productEdit.size) {
        let product = this.$store.getters["ProductSingle/product"];
        let color = product.color.filter(
          c => c.name == this.productEdit.color_name.name
        )[0];
        let size = color.sizes.filter(
          s => s.name == this.productEdit.size.name
        )[0];
        quantity = size.quantity;
      }
      this.productEdit = { ...this.productEdit, quantity };
    },
    updateQuantity() {
      let {
        size: { id, color_id, name },
        quantity
      } = this.productEdit;
      this.$store
        .dispatch("ProductSingle/updateQuantity", {
          name,
          id,
          color_id,
          quantity
        })
        .then(message => {
          this.$awn.success(message);
          this.quantityDialog = false;
        })
        .catch(() => {
          this.$awn.success("Please fill size field.");
        });
    },
    updateQuantityForm(item) {
      this.fetch(item).then(({ data }) => {
        this.productEdit = {
          ...data
        };
      });
      this.quantityDialog = true;
    },
    addImageDialogChange(val) {
      this.addImageDialog = val;
    },
    addImageProdColor(item) {
      this.fetch(item).then(({ data }) => {
        this.productEdit = {
          ...data,
          imageType: "url"
        };
      });
      this.$store.dispatch("ProductSingle/fetchSizesAll");
      this.addImageDialog = true;
    },
    clearCateName() {
      this.productEdit.cate_name = null;
    },
    show(img) {
      window.open(img);
    },
    previewImage(e) {
      let imageURL = [];
      e.forEach(img => {
        imageURL.push(URL.createObjectURL(img));
      });
      this.imagesUrl = imageURL;
      this.updateProdImage(e);
    },
    async fetchSizeAndColor() {
      await Promise.all([this.fetchColorsAll(), this.fetchSizesAll()]);
    },
    refreshForm() {
      this.quantityDialog = false;
      this.productEdit = { discount_available: false, autogenerate: false };
      this.dialog = false;
      this.isEdit = false;
      this.addImageDialog = false;
      this.$store.dispatch("Alert/resetState");
    },
    editItem(item) {
      this.fetch(item).then(({ data }) => {
        this.productEdit = {
          ...data,
          cate_type: data.categories[0].parent,
          cate_name: data.categories,
          supplier_name: data.supplier,
          color_name: data.color
        };
      });
      this.dialog = true;
      this.isEdit = true;
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
          // this.setProduct(item);
          this.delete(item).then(({ message }) => {
            this.$awn.success(message);
          });
        }
      });
    },
    close() {
      this.quantityDialog = false;
      this.dialog = false;
      this.isEdit = false;
    },
    save() {
      if (this.isEdit) {
        this.update(this.productEdit).then(res => {
          if (res.status == 422) {
            this.dialog = true;
          }
          this.$awn.success("Your item has been updated.");
          this.dialog = false;
          this.isEdit = false;
        });
      } else {
        let {
          autogenerate,
          masp,
          cate_name,
          supplier_name,
          color_name,
          discount,
          discount_available,
          product_name,
          product_description,
          product_available,
          product_price
        } = this.productEdit;
        let product = {
          masp,
          autogenerate,
          cate_name,
          supplier_name,
          color_name,
          discount,
          discount_available,
          product_available,
          product_name,
          product_description,
          product_price
        };
        this.store(product)
          .then(({ message }) => {
            this.$awn.success(message);
            this.dialog = false;
            this.images = [];
            this.isEdit = false;
          })
          .catch(err => console.log(err));
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
