<template>
  <v-layout row wrap>
    <v-flex>
      <add-image-for-color
        :addImageDialog="addImageDialog"
        :productEdit="productEdit"
        @addImageDialogChange="addImageDialogChange"
      >
        <template #image>
          <v-col sm="12" v-if="productEdit.imageType">
            Image Type:
            <v-radio-group v-model="productEdit.imageType">
              <v-radio label="URL" value="url">URL</v-radio>
              <v-radio label="FILE" value="file">File</v-radio>
            </v-radio-group>
            <template v-if="productEdit.imageType == 'url'">
              <validation-provider rules="required" name="Image" v-slot="{errors}">
                <v-textarea
                  v-model="productEdit.image"
                  label="Images (URL image separator by ' , ')."
                />
                <span class="text-danger">{{errors[0]}}</span>
              </validation-provider>
            </template>
            <template v-else>
              <validation-provider rules="required|image" name="Image" v-slot="{errors}">
                <v-file-input
                  v-model="productEdit.image"
                  label="Image (.jpe,.jpeg,.png,.gif,.webp)"
                  multiple
                ></v-file-input>
                <span class="text-danger">{{errors[0]}}</span>
              </validation-provider>
            </template>
          </v-col>
        </template>
      </add-image-for-color>
      <v-row>
        <v-btn v-if="$can('edit_product') && selected.length == 0" @click="selectAll">Select All</v-btn>
        <v-btn v-if="$can('edit_product') && selected.length > 0" @click="uncheckAll">UnCheck All</v-btn>
        <v-btn
          v-if="$can('edit_product') && selected.length"
          @click="deleteSelectedItem"
        >Delete Selected Items</v-btn>
        <v-btn
          class="mr-3"
          v-if="$can('edit_product')"
          @click="openAddImageDialog"
        >Add image and Size for product color</v-btn>
        <!-- <vue-select
          class="ml-3"
          style="max-width:250px;width:250px"
          name="name"
          label="name"
          @input="productEdit.color_name.id != $route.params.color_id ?
        change1($event) : ''"
          :value="productEdit.color_name"
          v-model="productEdit.color_name"
          :options="product.color"
        ></vue-select>-->
        <v-select
          style="max-width:250px;"
          v-model="productEdit.color_name"
          :items="product.color"
          item-text="name"
          item-value="name"
          @input="fetchImage"
          :menu-props="{offsetY:true}"
          label="Select color"
          return-object
          single-line
        />
      </v-row>
      <v-row v-if="colorComp[0] && colorComp[0].pictures.length">
        <v-card
          v-for="(img) in colorComp[0].pictures"
          :key="img.id"
          class="ma-2"
          max-width="250"
          flat
        >
          <v-checkbox v-model="selected" multiple :value="img"></v-checkbox>
          <v-img
            v-if="img.type == 'image'"
            @click="$router.push({name:'product',params:{cate_type:product.categories[0].parent.name,name:product.slug+'-'+colorComp[0].name+'-'+product.id}})"
            :src="img.src.includes('//')
                  ? 'https'+img.src
                  : product.imgLink+'/colors/'+$route.params.color_id+'/'+img.type+'/'+img.src
                  "
          />
          <video width="250" v-else-if="img.type =='video'" autoplay loop>
            <source
              @click="$router.push({name:'product',params:{cate_type:product.categories[0].parent.name,name:product.slug+'-'+colorComp[0].name+'-'+product.id}})"
              :alt="img.src"
              :src="
                img.src.includes('//')
                  ? 'https'+img.src
                  : img.imgLink+'/colors/'+$route.params.color_id+'/'+img.type+'/'+img.src
                      "
              type
            />
          </video>
        </v-card>
      </v-row>
      <v-row>
        <h1
          v-if="colorComp[0] && colorComp[0].pictures.length == 0"
        >This color does not have any pictures.</h1>
      </v-row>
    </v-flex>
  </v-layout>
</template>

<script>
import { ValidationProvider } from "vee-validate";
import AddImageForColor from "@/components/user/product/AddImageForColor.vue";
export default {
  components: {
    ValidationProvider,
    AddImageForColor
  },
  data() {
    return {
      addImageDialog: false,
      selected: [],
      addColorDialog: false,
      multiple: false,
      productEdit: {}
    };
  },
  watch: {
    addImageDialog(val) {
      !val && this.refresh();
    }
  },
  created() {
    this.$store
      .dispatch("ProductSingle/fetch", {
        id: this.$route.params.product_id
      })
      .then(({ data }) => {
        this.productEdit = {
          ...data,
          color_name: data.color.filter(
            c => c.id == this.$route.params.color_id
          )[0]
        };
      });
  },
  mounted() {
    this.$store.dispatch("ProductSingle/fetchSizesAll");
    this.$store.dispatch("ProductSingle/fetchColorsAll");
  },
  methods: {
    fetchImage() {
      if (this.$route.params.color_id != this.productEdit.color_name.id)
        this.$router.push({
          name: "manager_image",
          params: { color_id: this.productEdit.color_name.id }
        });
    },
    openAddColorForProduct() {
      this.addColorDialog = true;
      this.productEdit.color_name = this.product.color;
    },
    deleteSelectedItem() {
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
          this.$store
            .dispatch("ColorPicture/deleteSelectedItem", this.selected)
            .then(data => {
              this.$awn.success(data.message);
              this.$store.dispatch("ProductSingle/fetch", this.product);
              this.selected = [];
            });
        }
      });
    },
    selectAll() {
      this.colorComp[0].pictures.forEach(p => this.selected.push(p));
    },
    uncheckAll() {
      this.selected = [];
    },

    change1(e) {
      this.$router.push({
        name: "manager_image",
        params: { product_id: this.$route.params.product_id, color_id: e.id }
      });
    },
    openAddImageDialog() {
      this.productEdit = {
        ...this.product,
        imageType: "url"
      };
      this.addImageDialog = true;
    },
    addImageDialogChange(val) {
      this.addImageDialog = val;
    },
    refresh() {
      this.addImageDialog = false;
    }
  },
  computed: {
    sizesAll() {
      return this.$store.getters["ProductSingle/sizesAll"];
    },
    colorsAll() {
      return this.$store.getters["ProductSingle/colorsAll"];
    },
    images() {
      return this.$store.getters["ColorPicture/picture"];
    },
    product() {
      return this.$store.getters["ProductSingle/product"];
    },
    colorComp() {
      let product = this.product;
      let color = [];
      if (product.color) {
        color = product.color.filter(c => c.id == this.$route.params.color_id);
      }
      return color;
    }
  }
};
</script>

<style>
</style>