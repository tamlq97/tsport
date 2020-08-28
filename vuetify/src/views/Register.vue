<template>
  <fragment>
    <div class="card bg-light">
      <article class="card-body mx-auto" style="max-width: 800px;">
        <h4 class="card-title mt-3 text-center">Create Account</h4>
        <p class="text-center">Get started with your free account</p>
        <validation-observer v-slot="{invalid}">
          <form>
            <v-row>
              <v-col sm="12" md="6" lg="6">
                <validation-provider name="First Name" v-slot="{errors}" rules="required">
                  <v-text-field
                    :error-messages="errors"
                    prepend-inner-icon="mdi-account"
                    label="First Name"
                    type="text"
                    v-model="user.fname"
                  ></v-text-field>
                </validation-provider>
              </v-col>
              <v-col sm="12" md="6" lg="6">
                <validation-provider name="Last Name" v-slot="{errors}" rules="required">
                  <v-text-field
                    :error-messages="errors"
                    prepend-inner-icon="mdi-account"
                    label="Last Name"
                    type="text"
                    v-model="user.lname"
                  ></v-text-field>
                </validation-provider>
              </v-col>
            </v-row>
            <v-row>
              <v-col sm="12" md="6" lg="6">
                <validation-provider name="Email" v-slot="{errors}" rules="required|email">
                  <v-text-field
                    :error-messages="errors"
                    prepend-inner-icon="mdi-email"
                    label="Email"
                    type="email"
                    v-model="user.email"
                  ></v-text-field>
                </validation-provider>
              </v-col>
              <v-col sm="12" md="6" lg="6">
                <validation-provider name="Phone" v-slot="{errors}" rules="required">
                  <v-text-field
                    :error-messages="errors"
                    prepend-inner-icon="mdi-phone"
                    label="Phone"
                    type="tel"
                    v-model="user.phone"
                  ></v-text-field>
                </validation-provider>
              </v-col>
            </v-row>

            <validation-provider name="Address" v-slot="{errors}" rules="required">
              <v-textarea
                :error-messages="errors"
                prepend-inner-icon="mdi-phone"
                label="Address"
                v-model="user.address"
              ></v-textarea>
            </validation-provider>

            <v-row>
              <v-col sm="12" md="6" lg="6">
                <validation-provider name="City" v-slot="{errors}" rules="required">
                  <v-text-field
                    :error-messages="errors"
                    label="City"
                    type="text"
                    v-model="user.city"
                  ></v-text-field>
                </validation-provider>
              </v-col>
              <v-col sm="12" md="6" lg="6">
                <validation-provider name="Country" v-slot="{errors}" rules="required">
                  <v-text-field
                    :error-messages="errors"
                    label="Country"
                    type="text"
                    v-model="user.country"
                  ></v-text-field>
                </validation-provider>
              </v-col>
            </v-row>

            <ValidationProvider
              name="Password"
              rules="required|password:@confirm"
              v-slot="{ errors }"
            >
              <v-text-field
                v-model="user.password"
                append-icon="mdi-eye"
                @click:append="showPsw1 = !showPsw1"
                :type="showPsw1 ? 'text' : 'password'"
                label="New Password"
              ></v-text-field>
              <span class="text-danger">{{ errors[0] }}</span>
            </ValidationProvider>
            <ValidationProvider v-slot="{ errors }" name="confirm">
              <v-text-field
                v-model="user.passwordConfirmation"
                append-icon="mdi-eye"
                @click:append="showPsw2 = !showPsw2"
                :type="showPsw2 ? 'text' : 'password'"
                label="New Password Confirmation"
              ></v-text-field>
              <span>{{ errors[0] }}</span>
            </ValidationProvider>
            <v-btn color="primary" @click="register" block :disabled="invalid">Create Account</v-btn>
            <p class="text-center">
              Have an account?
              <router-link :to="{name:'login'}">Log In</router-link>
            </p>
          </form>
        </validation-observer>
      </article>
    </div>
  </fragment>
</template>

<script>
import { ValidationProvider, ValidationObserver } from "vee-validate";
import { mapActions } from "vuex";
export default {
  components: {
    ValidationProvider,
    ValidationObserver
  },
  data: () => ({
    user: {},
    showPsw1: false,
    showPsw2: false
  }),
  methods: {
    ...mapActions("UserSingle", ["registerUser"]),
    register() {
      this.registerUser(this.user)
        .then(({ message }) => {
          this.$awn.success(message);
          this.$router.push({ name: "login" });
        })
        .catch(({ response }) => {
          this.$awn.warning(response.data.error);
        });
    }
  }
};
</script>

<style lang="scss" scoped>
.btn-google {
  background: #dd4b39;
  color: white;
}
.btn-facebook {
  background: #3b5998;
  color: white;
}
.divider-text {
  position: relative;
  text-align: center;
  margin-top: 15px;
  margin-bottom: 15px;
}
.divider-text span {
  padding: 7px;
  font-size: 12px;
  position: relative;
  z-index: 2;
}
.divider-text:after {
  content: "";
  position: absolute;
  width: 100%;
  border-bottom: 1px solid #ddd;
  top: 55%;
  left: 0;
  z-index: 1;
}

.btn-facebook {
  background-color: #405d9d;
  color: #fff;
}
.btn-twitter {
  background-color: #42aeec;
  color: #fff;
}
</style>
