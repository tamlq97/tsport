<template>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <validation-observer v-slot="{invalid}">
              <form class="form-signin" @submit.prevent="login">
                <validation-provider rules="required|email" v-slot="{errors}" name="Email">
                  <v-text-field
                    label="Email address"
                    type="email"
                    v-model="user.email"
                    :error-messages="errors"
                  />
                </validation-provider>

                <validation-provider rules="required" v-slot="{errors}" name="Email">
                  <v-text-field
                    label="Password"
                    :type="showPsw ? 'text' : 'password'"
                    v-model="user.password"
                    :error-messages="errors"
                  />
                </validation-provider>

                <div class="custom-control text-center custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck1" />
                  <label class="custom-control-label" for="customCheck1">Remember password</label>
                </div>
                <p class="text-center">
                  Doesn't have a account?
                  <router-link :to="{name:'register'}">Register</router-link>
                </p>

                <v-btn block color="primary" type="submit" :disabled="invalid">Sign in</v-btn>
                <!-- <hr class="my-4" /> -->
                <!-- <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit">
                <i class="fa fa-google mr-2"></i> Sign in with Google
              </button>
              <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit">
                <i class="fa fa-facebook-f mr-2"></i> Sign in with Facebook
                </button>-->
              </form>
            </validation-observer>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import { ValidationProvider, ValidationObserver } from "vee-validate";
export default {
  components: {
    ValidationProvider,
    ValidationObserver,
  },
  data: () => ({
    user: {
      email: "",
      password: "",
    },
    showPsw: false,
  }),
  methods: {
    ...mapActions("UserSingle", ["loginUser"]),
    login() {
      this.loginUser(this.user)
        .then((res) => {
          this.$eventHub.$emit("userLoggedIn", "logged");
          this.$eventHub.$emit("updateUser", res.data.user);
          window.location.href = "/user";
        })
        .catch((err) => {
          this.$awn.warning(err.response.data.error);
        });
    },
  },
};
</script>

<style lang="scss" scoped>
.password {
  position: relative;
  .showPsw {
    position: absolute;
    width: 10px;
    height: 10px;
    right: 5%;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
  }
}

.btn-google {
  background: #dd4b39;
  color: white;
}
.btn-facebook {
  background: #3b5998;
  color: white;
}
</style>
