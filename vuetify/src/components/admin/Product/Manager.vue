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
            <span v-html="item.product_name" style='cursor:pointer' 
            @click="$router.push({path:'/collection/'+item.categories[0].slug+'/products/'+item.slug+'-'+item.color[0].name+'-'+item.id,params:{cate_type:item.categories[0].parent.slug,cate_name:item.categories[0].slug}})"></span>
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
              <v-dialog v-model="dialog" max-width="800px">
                <template v-slot:activator="{ on }">
                  <v-btn color="gray" @click="fetchData">
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
                    <v-container ref="form">
                      <v-row>
                        <v-col sm="12">
                          <label for>Name:</label>
                          <ckeditor
                            :editor="editor"
                            v-model="product.product_name"
                            :config="editorConfig"
                            @input="updateProdName($event)"
                          ></ckeditor>
                        </v-col>

                        <v-col sm="12">
                          <label for>Description:</label>
                          <ckeditor
                            :editor="editor"
                            v-model="product.product_description"
                            :config="editorConfig"
                            @input="updateProdDescription($event)"
                          ></ckeditor>
                        </v-col>
                        <v-col sm="12">
                          <v-text-field
                            label="Price"
                            v-model="product.product_price"
                            @input="updateProdPrice($event)"
                          ></v-text-field>
                        </v-col>
                        <v-col sm="12">
                          <label for>Images:</label>
                          <v-file-input
                            multiple
                            v-model="product.image"
                            show-size
                            @change="previewImage"
                            label="File input"
                          ></v-file-input>
                        </v-col>
                        <v-row>
                          <v-col md="2" v-for="img in imagesUrl" :key="img.name">
                            <v-img @click="show(img)" max-width="150" contain :src="img"></v-img>
                          </v-col>
                        </v-row>
                        <v-col sm="12">
                          Sizes:
                          <vue-select
                            name="size_name"
                            label="size_name"
                            :value="product.size_id"
                            v-model="product.size"
                            @input="updateProdSize($event)"
                            :options="sizesAll"
                            multiple
                          ></vue-select>Colors:
                          <vue-select
                            name="color_name"
                            v-model="product.color"
                            label="color_name"
                            :value="product.color_id"
                            @input="updateProdColor($event)"
                            :options="colorsAll"
                            multiple
                          ></vue-select>
                        </v-col>
                      </v-row>
                    </v-container>
                    <!-- </v-form> -->
                  </v-card-text>

                  <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" v-if="isEdit == false" text @click="refreshForm">
                      Refresh
                      <v-icon>mdi-refresh</v-icon>
                    </v-btn>
                    <v-btn color="red darken-1" text @click="close">
                      Cancel
                      <v-icon>mdi-cancel</v-icon>
                    </v-btn>
                    <v-btn color="blue darken-1" text @click="save">
                      Save
                      <v-icon>mdi-content-save</v-icon>
                    </v-btn>
                  </v-card-actions>
                </v-card>
              </v-dialog>
            </v-toolbar>
          </template>

          <template #item.image="{item}">
            <v-img width="100" class='ma-1' :src="item.color.length && item.color[0].pictures.length
            && item.color[0].pictures[0].src.includes('//') ? 'http'+item.color[0].pictures[0].src
            : (item.color.length && item.color[0].pictures.length ? item.imgLink+'/colors/'+item.color[0].id+'/'
            +item.color[0].pictures[0].type+'/'+item.color[0].pictures[0].src : '')
             "></v-img>
          </template>

          <template #item.role="{item}">
            <div>
              <v-chip color="green mr-1" v-for="role in item.role" :key="role.id">{{role.name}}</v-chip>
            </div>
          </template>
          <template #item.action="{item}">
            <v-icon small v-if="$can('edit_user')" @click="editItem(item)">mdi-pen</v-icon>
            <v-icon small v-if="$can('delete_user')" @click="deleteItem(item)">mdi-delete</v-icon>
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
import { mapGetters, mapActions } from "vuex";
export default {
  name: "products",
  components: { Pagination1 },
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
      { text: "Action", value: "action", sortable: false }
    ];
    return {
      images: [],
      imagesUrl: [],
      editor: ClassicEditor,
      editorConfig: {
        // The configuration of the editor.
      },
      password: "",
      passwordConfirmation: "",
      tableName: "Products",
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
    ...mapGetters("ProductIndex", ["products", "query", "fetching"]),
    ...mapGetters("ProductSingle", ["product", "colorsAll", "sizesAll"]),
    formTitle() {
      return this.isEdit == true ? "Edit Item" : "New Item";
    },
    lengthComp() {
      return this.products.meta.last_page;
    },
    currentPageComp() {
      return this.products.meta.current_page;
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
    }
  },
  mounted() {
    // this.fetchSizeAndColor();
    this.fetchSizesAll();
    this.fetchColorsAll();
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
      "updateProdName",
      "updateProdPrice",
      "updateProdDescription",
      "updateProdSize",
      "updateProdColor",
      "updateProdImage",
      "fetchSizesAll",
      "fetchColorsAll"
    ]),
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
      this.setProduct();
      this.$store.dispatch("Alert/resetState");
    },
    editItem(item) {
      this.fetch(item);
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
          this.setProduct(item);
          this.delete().then(res => {
            console.log(res);
            this.$eventHub.$emit("delete-success");
          });
        }
      });
    },
    close() {
      this.dialog = false;
      this.isEdit = false;
    },
    getIndex(array) {
      let item = [];
      if (item) {
        array.forEach(v => item.push(v.id));
      }
      return item;
    },
    save() {
      if (this.isEdit) {
        this.update().then(res => {
          if (res.status == 422) {
            this.dialog = true;
          }
          this.$eventHub.$emit("update-success");
          this.dialog = false;
          this.isEdit = false;
        });
      } else {
        this.store().then(res => {
          if (res.status == 422) {
            this.dialog = true;
          }
          if (res.status == 201) {
            this.$eventHub.$emit("create-success");
            this.dialog = false;
            this.images = [];
          }
          this.isEdit = false;
        });
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
