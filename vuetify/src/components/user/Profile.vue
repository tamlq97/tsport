<template>
  <v-layout row wrap>
    <v-row>
      <!-- SUPPLIER -->
      <v-col
        sm="12"
        :md="user.supplier ? '6' : '12'"
        :lg="user.supplier ? '6' : '12'"
        v-if="user.supplier"
      >
        <validation-observer v-slot="{invalid}">
          <v-card max-width="1000" class="pa-3">
            <v-card-title>Supplier Profile</v-card-title>

            <validation-provider rules="required" v-slot="{errors}" name="Company Name">
              <v-text-field
                :error-messages="errors"
                v-model="user.supplier.company_name"
                label="Company Name"
              />
            </validation-provider>
            <v-row>
              <v-col sm="12" md="6" lg="6">
                <validation-provider rules="required" v-slot="{errors}" name="Contact FirstName">
                  <v-text-field
                    :error-messages="errors"
                    v-model="user.supplier.contact_fname"
                    label="Contact FirstName"
                  />
                </validation-provider>
              </v-col>
              <v-col sm="12" md="6" lg="6">
                <validation-provider rules="required" v-slot="{errors}" name="Contact LastName">
                  <v-text-field
                    :error-messages="errors"
                    v-model="user.supplier.contact_lname"
                    label="Contact LastName"
                  />
                </validation-provider>
              </v-col>
            </v-row>

            <validation-provider rules="required" v-slot="{errors}" name="Address">
              <v-textarea :error-messages="errors" v-model="user.supplier.address" label="Address" />
            </validation-provider>
            <v-row>
              <v-col sm="12" md="6" lg="6">
                <validation-provider rules="required" v-slot="{errors}" name="City">
                  <v-text-field :error-messages="errors" v-model="user.supplier.city" label="City" />
                </validation-provider>
              </v-col>
              <v-col sm="12" md="6" lg="6">
                <validation-provider rules="required" v-slot="{errors}" name="Country">
                  <v-text-field
                    :error-messages="errors"
                    v-model="user.supplier.country"
                    label="Country"
                  />
                </validation-provider>
              </v-col>
            </v-row>
            <v-row>
              <v-col sm="12" md="6" lg="6">
                <validation-provider rules="required|email" v-slot="{errors}" name="Email">
                  <v-text-field
                    :error-messages="errors"
                    v-model="user.supplier.email"
                    label="Email"
                  />
                </validation-provider>
              </v-col>
              <v-col sm="12" md="6" lg="6">
                <validation-provider rules="required" v-slot="{errors}" name="Phone">
                  <v-text-field
                    :error-messages="errors"
                    v-model="user.supplier.phone"
                    type="tel"
                    pattern="[0-9]{4}-[0-9]{3}-[0-9]{3}"
                    label="Phone"
                  />
                </validation-provider>
              </v-col>
            </v-row>
            <v-row>
              <v-col sm="12" md="6" lg="6">
                <validation-provider rules="required" v-slot="{errors}" name="Logo">
                  <v-img v-if="previewSupplierLogo" width="120" :src="previewSupplierLogo" />
                  <v-img v-if="user.supplier.logo" width="120" :src="user.supplier.logo" />

                  <v-file-input
                    :error-messages="errors"
                    @change="previewSupplierLogoM"
                    label="Logo"
                  />
                </validation-provider>
              </v-col>
              <v-col sm="12" md="6" lg="6">
                <v-btn :disabled="invalid" color="primary" @click="updateSupplierProfile">Save</v-btn>
              </v-col>
            </v-row>
          </v-card>
        </validation-observer>
      </v-col>

      <!-- CUSTOMER -->
      <v-col
        sm="12"
        :md="user.customer ? '6' : '12'"
        :lg="user.customer ? '6' : '12'"
        v-if="user.customer"
      >
        <validation-observer v-slot="{invalid}">
          <v-card max-width="1000" class="pa-3">
            <v-card-title>Customer Profile</v-card-title>

            <v-row>
              <v-col sm="12" md="4" lg="4">
                <validation-provider rules="required|email" v-slot="{errors}" name="Email">
                  <v-text-field
                    :error-messages="errors"
                    v-model="user.customer.email"
                    label="Email"
                  />
                </validation-provider>
              </v-col>
              <v-col sm="12" md="4" lg="4">
                <validation-provider rules="required" v-slot="{errors}" name="Contact FirstName">
                  <v-text-field
                    :error-messages="errors"
                    v-model="user.customer.contact_fname"
                    label="Contact FirstName"
                  />
                </validation-provider>
              </v-col>
              <v-col sm="12" md="4" lg="4">
                <validation-provider rules="required" v-slot="{errors}" name="Contact LastName">
                  <v-text-field
                    :error-messages="errors"
                    v-model="user.customer.contact_lname"
                    label="Contact LastName"
                  />
                </validation-provider>
              </v-col>
            </v-row>

            <validation-provider rules="required" v-slot="{errors}" name="Address">
              <v-textarea :error-messages="errors" v-model="user.customer.address" label="Address" />
            </validation-provider>
            <v-row>
              <v-col sm="12" md="4" lg="4">
                <validation-provider rules="required" v-slot="{errors}" name="City">
                  <v-text-field :error-messages="errors" v-model="user.customer.city" label="City" />
                </validation-provider>
              </v-col>
              <v-col sm="12" md="4" lg="4">
                <validation-provider rules="required" v-slot="{errors}" name="Country">
                  <v-text-field
                    :error-messages="errors"
                    v-model="user.customer.country"
                    label="Country"
                  />
                </validation-provider>
              </v-col>
              <v-col sm="12" md="4" lg="4">
                <validation-provider rules="required" v-slot="{errors}" name="Phone">
                  <v-text-field
                    :error-messages="errors"
                    v-model="user.customer.phone"
                    type="tel"
                    pattern="[0-9]{4}-[0-9]{3}-[0-9]{3}"
                    label="Phone"
                  />
                </validation-provider>
              </v-col>
            </v-row>

            <v-row>
              <v-col sm="12" md="6" lg="6">
                <validation-provider rules="required|image" v-slot="{errors}" name="Avatar">
                  <v-img v-if="previewCustomerAvatar" width="80" :src="previewCustomerAvatar" />
                  <v-img v-if="user.customer.avatar" width="80" :src="user.customer.avatar" />

                  <v-file-input
                    :error-messages="errors"
                    @change="previewCustomerAvatarM"
                    label="Avatar"
                  />
                </validation-provider>
              </v-col>
              <v-col>
                <v-btn :disabled="invalid" color="primary" @click="updateCustomerProfile">Save</v-btn>
              </v-col>
            </v-row>
          </v-card>
        </validation-observer>
      </v-col>

      <!-- AVATAR -->
      <v-col sm="12" :md="6" :lg="6" class="mb-2">
        <validation-observer v-slot="{invalid}">
          <v-card max-width="1000" class="mx-auto">
            <v-card-title>Profile</v-card-title>
            <v-card-text>
              <!-- <v-flex class="mb-4">
                <v-avatar size="96" class="mr-4">
                  <img
                    :src="user.avatar ? userAvatarLink+'/'+avatar : previewUserAvatar"
                    alt="Avatar"
                  />
                </v-avatar>
                <v-file-input @change="previewUserAvatarM" label="Avatar" />
              </v-flex>-->
              <validation-provider v-slot="{errors}" name="Full Name" rules="required">
                <v-text-field :error-messages="errors" v-model="user.name" label="Full Name"></v-text-field>
              </validation-provider>

              <v-text-field
                v-model="oldPsw"
                append-icon="mdi-eye"
                placeholder="Leave blank if do not update password"
                @click:append="showOldPsw = !showOldPsw"
                :type="showOldPsw ? 'text' : 'password'"
                label="Old Password"
              ></v-text-field>

              <template v-if="oldPsw">
                <ValidationProvider rules="required|password:@confirm" v-slot="{ errors }">
                  <v-text-field
                    v-model="password"
                    append-icon="mdi-eye"
                    @click:append="showPsw1 = !showPsw1"
                    :type="showPsw1 ? 'text' : 'password'"
                    label="New Password"
                  ></v-text-field>
                  <span class="text-danger">{{ errors[0] }}</span>
                </ValidationProvider>
                <ValidationProvider v-slot="{ errors }" name="confirm">
                  <v-text-field
                    v-model="passwordConfirmation"
                    append-icon="mdi-eye"
                    @click:append="showPsw2 = !showPsw2"
                    :type="showPsw2 ? 'text' : 'password'"
                    label="New Password Confirmation"
                  ></v-text-field>
                  <span>{{ errors[0] }}</span>
                </ValidationProvider>
              </template>
              <template v-else>
                <v-text-field
                  v-model="password"
                  append-icon="mdi-eye"
                  disabled
                  placeholder="Type oldPsw if you need update password."
                  @click:append="showPsw1 = !showPsw1"
                  :type="showPsw1 ? 'text' : 'password'"
                  label="New Password"
                ></v-text-field>
                <v-text-field
                  v-model="passwordConfirmation"
                  append-icon="mdi-eye"
                  disabled
                  placeholder="Type oldPsw if you need update password."
                  @click:append="showPsw2 = !showPsw2"
                  :type="showPsw2 ? 'text' : 'password'"
                  label="New Password Confirmation"
                ></v-text-field>
              </template>
              <v-text-field v-model="user.email" disabled label="Email Address"></v-text-field>
            </v-card-text>
            <v-card-actions>
              <v-btn
                color="primary"
                :disabled="invalid"
                :loading="loading"
                @click.native="updateUserProfile"
              >
                <v-icon left dark>mdi-check</v-icon>Save Changes
              </v-btn>
            </v-card-actions>
          </v-card>
        </validation-observer>
      </v-col>
    </v-row>
  </v-layout>
</template>

<script>
import { ValidationObserver, ValidationProvider } from "vee-validate";
const initUser = {
  created_at: "2020-April-13 20:34:07",
  email: "sendlaravel.example@gmail.com",
  id: 102,
  name: "sendlaravel 1",
  profile: {},
  supplier: {
    id: 1,
    company_name: "CÃ´ng ty trÃ¡ch nhiá»‡m há»¯u háº¡n má»™t thÃ nh v",
    contact_fname: "LÃ£",
    address: "",
    address2: "",
    country: "",
    postal_code: "",
    phone: "",
    customer_id: "",
    logo: "",
    city: "",
  },
};
export default {
  components: {
    ValidationObserver,
    ValidationProvider,
  },
  pageTitle: "My Profile",
  data() {
    return {
      prevImage: "",
      showOldPsw: false,
      oldPsw: null,
      supplierLogo: "",
      loading: false,
      password: null,
      passwordConfirmation: null,
      showPsw1: false,
      showPsw2: false,
      formUser: initUser,
      logo: null,
      avatar: "",
      customerAvatar: "",
      userAvatar: "",
      customer: {},
      supplier: {},
      user: {},
      previewAvatar: "",
      previewUserAvatar: "",
      previewCustomerAvatar: "",
      previewSupplierLogo: "",
      showAvatarPicker: false,
    };
  },
  created() {
    this.me();
  },
  methods: {
    async me() {
      let data = await this.$store.dispatch("UserSingle/me");
      this.user = data;
    },
    previewUserAvatarM(e) {
      this.previewUserAvatar = URL.createObjectURL(e);
      this.userAvatar = e;
    },
    previewCustomerAvatarM(e) {
      this.previewCustomerAvatar = URL.createObjectURL(e);
      this.user.customer.avatar = e;
    },
    previewSupplierLogoM(e) {
      this.previewSupplierLogo = URL.createObjectURL(e);
      this.user.supplier.logo = e;
    },
    updateCustomerProfile() {
      this.$store
        .dispatch("UserSingle/updateCustomerProfile", this.user.customer)
        .then(({ message, customer }) => {
          this.user.customer = customer;
          this.previewCustomerAvatar = "";
          this.$awn.success(message);
        });
    },
    updateUserProfile() {
      let data = {
        id: this.user.id,
        email: this.user.email,
        name: this.user.name,
        avatar: this.userAvatar,
        oldPsw: this.user.oldPsw,
        password: this.user.password,
        passwordConfirmation: this.user.passwordConfirmation,
      };
      this.$store
        .dispatch("UserSingle/updateUserProfile", data)
        .then(({ data: { message, user } }) => {
          this.user = user;
          // sessionStorage.setItem("user", JSON.stringify(user));
          this.oldPsw = null;
          this.password = null;
          this.passwordConfirmation = null;
          this.$awn.success(message);
        })
        .catch(({ data: { error } }) => {
          this.$awn.alert(error);
        });
    },
    updateSupplierProfile() {
      this.$store
        .dispatch("UserSingle/updateSupplierProfile", this.user.supplier)
        .then(({ message, supplier }) => {
          this.user.supplier = supplier;
          this.$awn.success(message);
          this.previewSupplierLogo = "";
          // sessionStorage.setItem("user", JSON.stringify(this.formUser));
        })
        .catch((response) => {
          // this.$awn.alert(message);
          console.log(response);
        });
    },
  },
};
</script>