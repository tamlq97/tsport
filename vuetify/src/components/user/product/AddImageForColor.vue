<template>
  <v-dialog v-model="addImageDialogComp" max-width="800px">
    <v-card>
      <v-card-title>
        <span class="headline">{{formTitle}} Image and Color for Product Color</span>
      </v-card-title>

      <v-card-text>
        <!-- <v-form ref="form"> -->
        <bootstrap-alert />
        <v-container ref="form">
          <validation-observer v-slot="{invalid}">
            <v-row>
              <v-col sm="12">
                <validation-provider name="Color" rules="required" v-slot="{errors}">
                  Color:
                  <vue-select
                    name="name"
                    label="name"
                    :value="productEdit.color_name"
                    v-model="productEdit.color_name"
                    @input="filterSizeByColor"
                    :options="productEdit.color"
                  ></vue-select>
                  <span class="text-danger">{{errors[0]}}</span>
                </validation-provider>
                <template v-if="productEdit.color_name">
                  <validation-provider rules="required" name="Size" v-slot="{errors}">
                    Size:
                    <vue-select
                      name="name"
                      label="name"
                      :value="productEdit.size"
                      v-model="productEdit.size"
                      :options="sizesAll"
                      multiple
                    ></vue-select>
                    <span class="text-danger">{{errors[0]}}</span>
                  </validation-provider>
                </template>
              </v-col>
              <slot name="image"></slot>
              <v-col class="text-right" sm="12">
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
</template>

<script>
import { ValidationObserver, ValidationProvider } from "vee-validate";
export default {
  components: {
    ValidationProvider,
    ValidationObserver
  },
  props: {
    addImageDialog: {
      type: Boolean,
      required: true
    },
    productEdit: {
      type: Object,
      required: true
    },
    formTitle: {
      type: String,
      default: "Add"
    }
    // https://img.gymshark.com/image/fetch/q_auto,f_auto,w_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/ENERGY_SEAMLESS_CROP_LEGGINGS_BEET.A-Edit.jpg?v=1582297829,
    // https://img.gymshark.com/image/fetch/q_auto,f_auto,w_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/ENERGY_SEAMLESS_CROP_LEGGINGS_BEET.B-Edit.jpg?v=1582297830,
    // https://img.gymshark.com/image/fetch/q_auto,f_auto,w_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/ENERGY_SEAMLESS_CROP_LEGGINGS_BEET.C-Edit.jpg?v=1582297830,
    // https://videos.shopifycdn.com/c/vp/f3fe885852ee4b29b61a76fdee7cabd9/f3fe885852ee4b29b61a76fdee7cabd9.HD-720p-4.5Mbps.mp4?Expires=1588767165&KeyName=core-signing-key-1&Signature=EaYBV9ewtR928RgzNJxy_fIAtt0=,
    // https://img.gymshark.com/image/fetch/q_auto,f_auto,w_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/ENERGY_SEAMLESS_CROP_LEGGINGS_BEET.D1-Edit.jpg?v=1582297830,
    // https://img.gymshark.com/image/fetch/q_auto,f_auto,w_auto/https://cdn.shopify.com/s/files/1/0156/6146/products/ENERGY_SEAMLESS_CROP_LEGGINGS_BEET.D2-Edit.jpg?v=1582297830
  },
  computed: {
    sizesAll() {
      return this.$store.getters["ProductSingle/sizesAll"];
    },
    addImageDialogComp: {
      get() {
        return this.addImageDialog;
      },
      set(val) {
        this.$emit("addImageDialogChange", val);
      }
    }
  },
  methods: {
    filterSizeByColor() {
      let color = this.productEdit.color.filter(
        c => c.name == this.productEdit.color_name.name
      );
      this.productEdit.size = color[0].sizes;
    },
    async save() {
      let product = {
        id: this.productEdit.id,
        color_name: this.productEdit.color_name,
        size: this.productEdit.size,
        image: this.productEdit.image,
        imageType: this.productEdit.imageType
      };
      // await this.$store.dispatch("ProductSingle/update", product);
      this.$store
        .dispatch("ColorPicture/addImageForColorProduct", product)
        .then(({ message }) => {
          this.$awn.success(message);
        });
      this.$store.dispatch("ProductSingle/fetch", product);
      // this.$store.dispatch("ProductSingle/fetch",product)
      this.$emit("addImageDialogChange", false);
    },
    close() {
      this.$emit("addImageDialogChange", false);
    }
  }
};
</script>

<style>
</style>