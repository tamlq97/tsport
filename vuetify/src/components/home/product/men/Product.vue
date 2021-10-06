<template>
  <v-container>
    <!-- <v-row>
      <v-breadcrumbs :items="$route.meta.breadcrumb">
        <template v-slot:item="props">
          <router-link :to="{ name: props.item.href }">
            {{
            props.item.text
            }}
          </router-link>
        </template>
      </v-breadcrumbs>
    </v-row>-->

    <add-image-for-color
      @addImageDialogChange="addImageDialogChange"
      :productEdit="productEdit"
      :addImageDialog="addImageDialog"
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
            <validation-provider rules="required" name="Image" v-slot="{errors}">
              <v-file-input
                v-model="productEdit.image"
                label="Image (.jpe,.jpeg,.png,.gif,.webp), Video (.mp4,.3gp,.ogg)"
                multiple
              ></v-file-input>
              <span class="text-danger">{{errors[0]}}</span>
            </validation-provider>
          </template>
        </v-col>
      </template>
    </add-image-for-color>
    <v-dialog v-model="dialog" max-width="1620">
      <v-card>
        <v-card-title>
          <span class="headline">Edit Product</span>
          <v-btn @click="quantityDialog = true" color="primary">Import quantity</v-btn>
          <v-btn
            @click="$router.push({path:'/user/products/'+productEdit.id+'/colors/'+productEdit.color[0].id})"
            color="primary"
          >Manager Image</v-btn>
        </v-card-title>

        <v-card-text>
          <!-- <v-form ref="form"> -->
          <bootstrap-alert />
          <v-container fluid ref="form">
            <validation-observer v-slot="{invalid}">
              <v-row>
                <v-text-field
                  label="Unique Product ID (max:7 characters)"
                  v-model="productEdit.masp"
                  counter="7"
                  :disabled="true"
                />
                <v-col sm="12">
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
                          <validation-provider v-slot="{errors}" name="Supplier" rules="required">
                            Supplier:
                            <vue-select
                              name="company_name"
                              label="company_name"
                              :value="productEdit.supplier_name"
                              v-model="productEdit.supplier_name"
                              :options="suppliersAll"
                            ></vue-select>
                            <span class="text-danger">{{errors[0]}}</span>
                          </validation-provider>
                        </v-col>
                        <v-col sm="12" lg="6" md="6">
                          <validation-provider rules="required" v-slot="{errors}" name="Price">
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
                            label="Product Available"
                            v-model="productEdit.product_available"
                          />
                        </v-col>
                      </v-row>
                    </v-col>
                  </v-row>
                  <v-row>
                    <v-col sm="12" md="4" lg="4">
                      <validation-provider rules="required" v-slot="{errors}" name="Color">
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
                      <validation-provider rules="required" v-slot="{errors}" name="Category Type">
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
                          Category Name:
                          <vue-select
                            name="name"
                            label="name"
                            :value="productEdit.cate_name"
                            v-model="productEdit.cate_name"
                            :options="cateNamesOfType"
                            multiple
                          ></vue-select>
                          <span class="text-danger">{{errors[0]}}</span>
                        </validation-provider>
                      </template>
                    </v-col>
                  </v-row>
                </v-col>
              </v-row>
              <v-row>
                <v-col class="text-right">
                  <v-btn color="blue darken-1" text @click="refreshForm">
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
    <v-dialog v-model="quantityDialog" max-width="800px">
      <v-card flat>
        <v-card-title>Update Quantity</v-card-title>
        <v-card-text>
          <validation-observer v-slot="{invalid}">
            <v-row>
              <v-col sm="12" md="6">
                <validation-provider name="Color" rules="required" v-slot="{errors}">
                  Color:
                  <vue-select
                    name="name"
                    label="name"
                    :value="productEdit.color_quantity"
                    v-model="productEdit.color_quantity"
                    :options="productEdit.color"
                  ></vue-select>
                  <span class="text-danger">{{errors[0]}}</span>
                </validation-provider>
              </v-col>
              <v-col md="6" sm="12">
                <template v-if="productEdit.color_quantity">
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
                </template>
              </v-col>
            </v-row>
            <v-row>
              <v-col v-if="productEdit.size" sm="12" md="6">
                <validation-provider rules="required" name="Quantity" v-slot="{errors}">
                  <v-text-field
                    type="number"
                    min="0"
                    v-model="productEdit.quantity"
                    label="Quantity"
                  />
                  <span class="text-danger">{{errors[0]}}</span>
                </validation-provider>
              </v-col>
            </v-row>
            <v-row>
              <v-col sm="12" md="6">
                <v-btn color='red' @click="quantityDialog = false">Cancel</v-btn>
                <v-btn color='primary' :disabled="invalid" @click="saveQuantity">Save</v-btn>
              </v-col>
            </v-row>
          </validation-observer>
        </v-card-text>
      </v-card>
    </v-dialog>
    <v-row>
      <v-col sm="6" md="7" v-if="colorComp[0] && colorComp[0].pictures.length">
        <v-row>
          <template v-if="colorComp[0] && colorComp[0].pictures.length">
            <v-col v-for="(img,k) in colorComp[0].pictures" cols="4" :key="k">
              <v-card v-if="k < 3" flat>
                <v-img
                  v-if="img.type == 'image'"
                  :src="
                img.src.includes('//') ? 'http'+img.src
            : (!img.src.includes('//') ? product.imgLink+'/colors/'+colorComp[0].id+'/'
            +img.type+'/'+img.src 
            : 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Flag_of_None.svg/1280px-Flag_of_None.svg.png')
                "
                ></v-img>
                <video v-else-if="img.type == 'video'" autoplay loop>
                  <source
                    :src="img.src.includes('//')
              && img.src.includes('mp4') ? 'http'+img.src
              : (!img.src.includes('//')
              && img.src.includes('mp4') ? product.imgLink+'/colors/'+colorComp[0].id+'/'
            +img.type+'/'+img.src 
            : 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Flag_of_None.svg/1280px-Flag_of_None.svg.png')
              "
                    type
                  />
                </video>
              </v-card>
            </v-col>
          </template>
        </v-row>
        <v-card v-if="colorComp[0] && colorComp[0].pictures.length > 3" flat>
          <v-img
            v-if="colorComp[0].pictures[3].type == 'image'"
            :src="
                colorComp[0].pictures[3].src.includes('//') ? 'http'+colorComp[0].pictures[3].src
            : product.imgLink+'/colors/'+colorComp[0].pictures[3].id+'/'
            +colorComp[0].pictures[3].type+'/'+colorComp[0].pictures[3].src 
                "
          ></v-img>
          <video loop autoplay v-else-if="colorComp[0].pictures[3].type == 'video'">
            <source
              :src="colorComp[0].pictures[3].src.includes('//')
              && colorComp[0].pictures[3].src.includes('mp4') ? 'http'+colorComp[0].pictures[3].src
              : (!colorComp[0].pictures[3].src.includes('//')
              && colorComp[0].pictures[3].src.includes('mp4') ? product.colorComp[0].pictures[3].imgLink+'/colors/'+colorComp[0].pictures[3].id+'/'
            +colorComp[0].pictures[3].type+'/'+colorComp[0].pictures[3].src 
            : 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Flag_of_None.svg/1280px-Flag_of_None.svg.png')
              "
              :type="'video/'+colorComp[0].pictures[3].extension"
            />
          </video>
        </v-card>
        <v-row>
          <template v-if="colorComp[0] && colorComp[0].pictures.length > 4">
            <v-col v-for="(img,k) in colorComp[0].pictures" :key="k" cols="6">
              <v-card v-if="k > 3 && k < 6" flat>
                <v-img
                  v-if="img.type == 'image'"
                  :src="
                img.src.includes('//') ? 'http'+img.src
            : product.imgLink+'/colors/'+colorComp[0].id+'/'
            +img.type+'/'+img.src
                "
                ></v-img>
                <video loop autoplay v-else-if="img.type == 'video'">
                  <source
                    :src="img.src.includes('//')
              && img.src.includes('mp4') ? 'http'+img.src
              : (!img.src.includes('//')
              && img.src.includes('mp4') ? product.img.imgLink+'/colors/'+colorComp[0].id+'/'
            +img.type+'/'+img.src 
            : 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Flag_of_None.svg/1280px-Flag_of_None.svg.png')
              "
                    :type="'video/'+img.extension"
                  />
                </video>
              </v-card>
            </v-col>
          </template>
        </v-row>
      </v-col>
      <v-col sm="6" md="7" v-else>
        <v-img
          src="data:image/png;base64,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"
        />
      </v-col>
      <v-col sm="6" md="5">
        <v-card flat class="sticky">
          <v-toolbar
            flat
            v-show="(product && product.supplier && $can('edit_product')) || $can('delete_user')"
          >
            <v-spacer />
            <v-spacer />
            <v-btn
              v-if="colorComp[0] && !colorComp[0].pictures.length"
              @click="openAddImageDialog"
            >Add Image and Size</v-btn>
            <v-btn v-if="$can('edit_product')" @click="editProduct">Edit Product</v-btn>
            <v-btn v-if="$can('delete_product')" @click="deleteItem">Delete Product</v-btn>
          </v-toolbar>
          <div class="title" v-html="product.product_name"></div>
          <div class="subtitle">${{ product.product_price }} USD</div>
          <v-row>
            <v-btn text @click="openReview = !openReview">Write a review</v-btn>
            <v-menu offset-y :close-on-content-click="false" :nudge-width="350">
              <template v-slot:activator="{ on }">
                <v-btn color="indigo" dark v-on="on">
                  <v-icon>mdi-share</v-icon>
                </v-btn>
              </template>

              <v-card max-width="400px" flat>
                <v-card-title>Share via</v-card-title>
                <v-list class="d-flex justify-center">
                  <v-btn fab large color="grey mr-1">
                    <v-icon large color="white">mdi-check</v-icon>
                  </v-btn>
                  <v-btn fab large color="mr-1 blue">
                    <v-icon large color="white">mdi-facebook</v-icon>
                  </v-btn>
                  <v-btn fab large color="mr-1 pink">
                    <v-icon large color="white">mdi-instagram</v-icon>
                  </v-btn>
                  <v-btn fab large color="mr-1 red">
                    <v-icon large color="white">mdi-pinterest</v-icon>
                  </v-btn>
                  <v-btn fab large dark>
                    <v-icon large color="white">mdi-mail</v-icon>
                  </v-btn>
                </v-list>
              </v-card>
            </v-menu>
          </v-row>
          <v-row v-if="product.color && product.color.length">
            <template v-for="color in product.color">
              <v-hover v-slot="{ hover }" :key="color.id">
                <v-card flat max-width="60">
                  <v-img
                    v-if="color.pictures.length"
                    class="mr-2 mt-2"
                    :style="
                      colorComp[0] && colorComp[0].name == color.name
                        ? 'border:2px solid green'
                        : ''
                    "
                    max-width="60"
                    @click="
                    color.name != url[url.length -2]
                    ? $router.push({path:'/collection/'+product.categories[0].slug+'/products/'+product.slug+'-'+color.name+'-'+product.id,params:{cate_type:product.categories[0].parent.slug,cate_name:product.categories[0].slug}})
                    : ''
                    "
                    :src="
                      color.pictures.length && color.pictures[0].src.includes('//')
                        ? 'http' + color.pictures[0].src
                        : product.imgLink+'/colors/'+color.id+'/'+color.pictures[0].type+'/'+color.pictures[0].src
                    "
                  ></v-img>
                  <v-img
                    v-else
                    @click="color.name != url[url.length -2]
                    ? $router.push({path:'/collection/'+product.categories[0].slug+'/products/'+product.slug+'-'+color.name+'-'+product.id,params:{cate_type:product.categories[0].parent.slug,cate_name:product.categories[0].slug}})
                    : ''"
                    :style="
                      colorComp[0] && colorComp[0].name == color.name
                        ? 'border:2px solid green'
                        : ''
                    "
                    src="data:image/png;base64,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"
                  />
                  <v-card-title
                    :style="hover ? 'display:block' : 'display:none'"
                    class="caption"
                  >{{ hover ? color.name : "" }}</v-card-title>
                </v-card>
              </v-hover>
            </template>
          </v-row>
          <v-divider class="mt-2"></v-divider>
          <div
            v-if="colorComp[0] && product.color && 
              product.color.length &&
                product.color.some((c) => c.name == colorComp[0].name)
            "
          >{{ colorComp[0].name }}</div>
          <v-row class="justify-space-between">
            <div class="body-1">Select size</div>
            <div class="body-1">Size Guilde</div>
          </v-row>
          <v-row class="justify-center" v-if="colorComp[0]">
            <v-btn
              class="ma-1"
              @click="changeSize(s.name)"
              :color="sizeSelected == s.name ? 'green' : ''"
              v-for="s in colorComp[0].sizes"
              :key="s.id"
              active-class="primary"
            >{{ s.name }}</v-btn>
          </v-row>
          <v-btn
            @click="add2Cart"
            width="100%"
            color="blue"
            dark
            rounded
            large
            class="mt-3 justify-center"
          >
            Add
            <v-icon color="white">mdi-lock</v-icon>
          </v-btn>
          <v-expansion-panels flat>
            <v-expansion-panel>
              <v-expansion-panel-header>Description</v-expansion-panel-header>
              <v-expansion-panel-content v-html="product.product_description"></v-expansion-panel-content>
            </v-expansion-panel>
          </v-expansion-panels>
          <v-expansion-panels flat>
            <v-expansion-panel>
              <v-expansion-panel-header>Delivery & Returns</v-expansion-panel-header>
              <v-expansion-panel-content>
                <ul class="caption">
                  <li>Free Standard Delivery (Estimated 4-7 Working Days) from $75</li>
                  <li>Free Express Delivery (Estimated 1-3 Working Days) from $150</li>
                  <li>Free Returns on all orders</li>
                </ul>
              </v-expansion-panel-content>
            </v-expansion-panel>
          </v-expansion-panels>
          <v-expansion-panels flat>
            <v-expansion-panel>
              <v-expansion-panel-header>Reviews</v-expansion-panel-header>
              <v-expansion-panel-content>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo
                consequat.
              </v-expansion-panel-content>
            </v-expansion-panel>
          </v-expansion-panels>

          <v-dialog v-model="openReview" width="800px">
            <v-card>
              <v-card-title class="justify-center white darken-2">Write your review</v-card-title>
              <div class="text-center subtitle-1">About the name-prod</div>
              <p class="text-center">Overral Rating *</p>
              <v-rating
                class="text-center"
                v-model="review.rating"
                :length="5"
                :hover="hover"
                :size="45"
                :color="'yellow'"
                background-color="dark"
              ></v-rating>

              <div class="text-center">
                <div class="body-1">Rate this product *</div>
                <div class="body-1">Fit *</div>
                <div class="d-flex justify-center">
                  <v-radio-group row>
                    <v-radio v-model="review.fit" class="mx-2" label="Loose"></v-radio>
                    <v-radio v-model="review.fit" class="mx-2" label="Perfect"></v-radio>
                    <v-radio v-model="review.fit" class="mx-2" label="Tight"></v-radio>
                  </v-radio-group>
                </div>
                <div class="body-1">Length *</div>
                <div class="d-flex justify-center">
                  <v-radio-group row>
                    <v-radio v-model="review.length" class="mx-2" label="Short"></v-radio>
                    <v-radio v-model="review.length" class="mx-2" label="Perfect"></v-radio>
                    <v-radio v-model="review.length" class="mx-2" label="Long"></v-radio>
                  </v-radio-group>
                </div>
                <div class="body-1">Comfort *</div>
                <div class="d-flex justify-center">
                  <v-radio-group row>
                    <v-radio v-model="review.comfort" class="mx-2" label="Uncomfortable"></v-radio>
                    <v-radio v-model="review.comfort" class="mx-2" label="Comfortable"></v-radio>
                  </v-radio-group>
                </div>
                <div style="width:50%;margin:0 auto 0 auto">
                  <div class="title">Your Review *</div>
                  <v-text-field v-model="review.titlel" label="Your review title"></v-text-field>
                  <v-textarea v-model="review.content" label="Your review"></v-textarea>
                  <div class="title">Your Details *</div>
                  <v-text-field v-model="review.uname" label="Your name"></v-text-field>
                  <v-text-field v-model="review.uemail" label="Email"></v-text-field>
                </div>
                <v-card-actions class="justify-center">
                  <v-btn width="50%" large color="primary">Submit Review</v-btn>
                </v-card-actions>

                <div class="subtitle">
                  By submit a review you agree to
                  <br />our
                  <a>tearms and conditions</a>
                </div>
              </div>
            </v-card>
          </v-dialog>
        </v-card>
      </v-col>
    </v-row>
    <v-row>
      <p class="title mb-0">You might also like</p>
      <v-slide-group
        v-if="relatedProducts.length"
        v-model="slideModel"
        :show-arrows="$vuetify.breakpoint.smAndUp ? true : false"
      >
        <v-slide-item v-for="(prod, k) in relatedProducts" :key="k">
          <v-row class="ma-3 mt-0" align="center" justify="center">
            <v-card
              v-if="colorComp[0] && prod.color[0].name != colorComp[0].name"
              flat
              class="ma-2"
              max-width="200"
              height="100%"
            >
              <v-hover v-slot:default="{ hover }" open-delay="200">
                <v-row style="position:relative">
                  <v-img
                    @click="
                      $router.push({
                        name:'product',
                        params:{cate_type:prod.categories[0].slug,
                        name: prod.slug+'-'+prod.color[0].name+'-'+prod.id}
                      })
                    "
                    v-if="prod.color[0].pictures.length"
                    :src="prod.color[0].pictures[0].src.includes('//')
                    ? 'http'+prod.color[0].pictures[0].src
                    : prod.imgLink+'/colors/'+prod.color[0].id+'/'+prod.color[0].pictures[0].type+'/'
                    +prod.color[0].pictures[0].src
                    "
                    class="dark--text align-end"
                    style="cursor:poiter"
                  />
                  <div
                    :style="
                      hover
                        ? 'width:100%;position:absolute;bottom:0;left:50%;background:white;text-align:center;transform:translateX(-50%); color:black'
                        : 'display:none'
                    "
                  >
                    <div class="title">Quick Add</div>
                    <v-btn @click="add2CartRelateProd(prod)">Add to cart</v-btn>
                  </div>
                </v-row>
              </v-hover>
              <v-row>
                <div
                  class="subtitle-2 mt-5"
                  @click="
                $router.push({
                        path:`/collection/${prod.categories[0].slug}/products/${prod.slug}-${prod.color[0].name}-${prod.id}`
                      })
                "
                  v-html="product.product_name"
                ></div>
                <v-card-subtitle v-html="product.color[0].name"></v-card-subtitle>
                <div class="body-2">${{ product.product_price }} USD</div>
              </v-row>
            </v-card>
          </v-row>
        </v-slide-item>
      </v-slide-group>
    </v-row>
  </v-container>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import { ValidationObserver, ValidationProvider } from "vee-validate";
import AddImageForColor from "@/components/user/product/AddImageForColor.vue";
export default {
  components: {
    AddImageForColor,
    ValidationObserver,
    ValidationProvider
  },
  data() {
    let url = this.$route.params.name.split("-");
    return {
      quantityDialog: false,
      addImageDialog: false,
      image_type: "url",
      editor: ClassicEditor,
      editorConfig: {
        // The configuration of the editor.
      },
      images: null,
      productEdit: {},
      dialog: false,
      url,
      sizeSelected: "",
      slideModel: null,
      openReview: false,
      review: {
        rating: 2,
        length: null,
        fit: null,
        comfort: null,
        title: "",
        content: "",
        uname: "",
        uemail: ""
      },
      hover: true,
      readonly: false,
      dense: false
    };
  },
  watch: {
    addImageDialog: function(val) {
      !val && this.refreshForm();
    },
    $route: function() {
      this.url = this.$route.params.name.split("-");
      this.fetchProd();
    }
  },
  computed: {
    ...mapGetters("HomeProduct", ["product", "relatedProducts"]),
    suppliersAll() {
      return this.$store.getters["ProductSingle/suppliersAll"];
    },
    colorComp() {
      let product = this.product;
      let color = [];
      let colorName = this.url[this.url.length - 2];
      if (product.color) {
        color = product.color.filter(c => c.name == colorName);
      }
      return color;
    },
    filterSizeByColor() {
      let product = this.product;
      let color = [];
      if (this.productEdit.color_quantity) {
        color = product.color.filter(
          c => c.name == this.productEdit.color_quantity.name
        )[0];
        return color.sizes;
      }
      return color;
    },
    colorsAll() {
      return this.$store.getters["ProductSingle/colorsAll"];
    },
    categories() {
      return this.$store.getters["Category/categories"];
    },
    sizesAll() {
      return this.$store.getters["ProductSingle/sizesAll"];
    },
    cateNamesOfType() {
      let { data } = this.categories;
      let cate = [];
      if (this.productEdit && data) {
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
    }
  },

  methods: {
    ...mapActions("ProductSingle", [
      "setProduct",
      "update",
      "fetchSizesAll",
      "updateQuantity",
      "fetchColorsAll"
    ]),
    deleteItem() {
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
            .dispatch("ProductSingle/delete", this.productEdit)
            .then(({ message }) => {
              this.$awn.success(message);
              this.$router.push({ name: "collection" });
            })
            .catch(response => console.log(response));
        }
      });
    },
    filterQuantityBySize() {
      let product = this.product;
      let quantity = 0;
      let color = product.color.filter(
        c => c.name == this.productEdit.color_quantity.name
      )[0];
      if (this.productEdit.size) {
        let size = color.sizes.filter(
          s => s.name == this.productEdit.size.name
        )[0];
        quantity = size.quantity;
      }
      this.productEdit.quantity = quantity;
    },
    async saveQuantity() {
      let {
        size: { id, color_id, name },
        quantity
      } = this.productEdit;
      await this.updateQuantity({
        name,
        id,
        color_id,
        quantity
      });
      this.fetchProd();
      this.$awn.success("Your quantity has been updated.");
      this.quantityDialog = false;
    },
    clearCateName() {
      this.productEdit.cate_name = "";
    },
    addImageDialogChange(val) {
      this.addImageDialog = val;
    },
    editProduct() {
      this.$store.dispatch("ProductSingle/fetchSuppliersAll");
      this.productEdit = {
        ...this.product,
        cate_type: this.product.categories[0].parent,
        cate_name: this.product.categories,
        supplier_name: this.product.supplier,
        color_name: this.product.color
      };
      this.dialog = true;
    },
    updateProdColor() {},
    close() {
      this.addImageDialog = false;
      this.dialog = false;
    },
    save() {
      this.update(this.productEdit).then(res => {
        if (res.status == 422) {
          this.addImageDialog = true;
        }
        this.$awn.success("Your product has been updated.");
        this.dialog = false;
        this.fetchProd();
      });
    },
    openQuantityDialog() {
      this.quantityDialog = true;
    },
    openAddImageDialog() {
      this.addImageDialog = true;

      let images = this.colorComp[0].pictures;
      if (
        this.colorComp[0].pictures.length &&
        this.colorComp[0].pictures[0].src.includes("//")
      ) {
        images = "";
        this.colorComp[0].pictures.forEach(pic => {
          let temp = "https" + pic.src;
          temp += ",";
          images += temp;
        });
      }

      this.productEdit = {
        id: this.product.id,
        color_name: this.colorComp[0],
        imageType: "url",
        color: this.product.color,
        size: this.colorComp[0].sizes,
        image: images
      };
    },
    refreshForm() {
      this.dialog = false;
      if (this.addImageDialog) {
        this.addImageDialog = false;
      }
    },
    updateProdName(val) {
      this.productEdit.product_name = val;
    },
    updateProdDescription(val) {
      this.productEdit.product_description = val;
    },
    updateProdPrice(val) {
      this.productEdit.product_price = val;
    },

    changeSize(val) {
      this.sizeSelected = val;
    },
    add2CartRelateProd(prod) {
      let cart = [];
      if (localStorage.cart) {
        cart = JSON.parse(localStorage.cart);
        let index = cart.findIndex(
          c =>
            c.id == prod.id &&
            c.color.name == prod.color[0].name &&
            c.color.sizes.name == prod.color[0].sizes[0].name
        );
        if (index !== -1) {
          cart[index].color.sizes.quantity++;
          this.setCart(cart);
        } else {
          let product = {
            ...prod,
            color: {
              ...prod.color[0],
              sizes: {
                ...prod.color[0].sizes[0],
                quantity: 1
              }
            }
          };
          cart.push(product);
          this.setCart(cart);
        }
      } else {
        let product = {
          ...prod,
          color: {
            ...prod.color[0],
            sizes: {
              ...prod.color[0].sizes[0],
              quantity: 1
            },
            pictures: {
              ...prod.color[0].pictures
            }
          }
        };
        cart.push(product);
        this.setCart(cart);
      }
      this.$eventHub.$emit("changeCartDrawer", true);
    },
    add2Cart() {
      if (this.sizeSelected) {
        let cart = [];
        if (localStorage.cart) {
          cart = JSON.parse(localStorage.cart);
          let index = cart.findIndex(
            c =>
              c.id == this.product.id &&
              c.color.name == this.colorComp[0].name &&
              c.color.sizes.name == this.sizeSelected
          );
          if (index !== -1) {
            cart[index].color.sizes.quantity++;
            this.setCart(cart);
          } else {
            let product = {
              ...this.product,
              color: {
                ...this.colorComp[0],
                sizes: {
                  ...this.colorComp[0].sizes.filter(
                    c => c.name == this.sizeSelected
                  )[0],
                  quantity: 1
                }
              }
            };
            cart.push(product);
            this.setCart(cart);
          }
          this.$eventHub.$emit("changeCartDrawer", true);
        }
      } else {
        this.$awn.warning("Please select a size.");
      }
    },
    setCart(cart) {
      localStorage.setItem("cart", JSON.stringify(cart));
    },
    async fetchSizeAndColor() {
      await Promise.all([this.fetchColorsAll(), this.fetchSizesAll()]);
    },
    fetchProd() {
      this.$store
        .dispatch("HomeProduct/fetch", this.url[this.url.length - 1])
        .then(data => {
          // this.productEdit = {
          //   ...data,
          //   cate_type: data.categories[0].parent,
          //   cate_name: data.categories
          // };
          this.productEdit = {
            ...data,
            cate_type: data.categories[0].parent,
            cate_name: data.categories,
            supplier_name: data.supplier,
            color_name: data.color
          };
        })
        .catch(() => this.$router.push({ name: "notfoundpage" }));
    }
  },
  mounted() {
    this.fetchSizeAndColor();
    this.$store.dispatch("Category/fetchData");
  },
  created() {
    this.fetchProd();
    this.$store.dispatch(
      "HomeProduct/fetchRelatedProducts",
      this.url[this.url.length - 1]
    );
  }
};
</script>

<style></style>
