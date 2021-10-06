import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import vuetify from "./plugins/vuetify";
import { abilitiesPlugin } from "@casl/vue";
import ability from "@/config/ability";
import VueAWN from "vue-awesome-notifications";
import "vue-awesome-notifications/dist/styles/style.css";
import { ValidationProvider, extend } from "vee-validate";
import { required, email, confirmed, max_value, between, max, min, image, min_value } from "vee-validate/dist/rules";
import VueSweetAlert2 from "vue-sweetalert2";
import { Fragment } from "vue-fragment";
import CKEditor from "@ckeditor/ckeditor5-vue";

import Echo from 'laravel-echo';
window.Pusher = require('pusher-js')
window.Echo = new Echo({
  broadcaster:'pusher',
  key:'bd6c219b9cdb2685a402',
  cluster:'ap1',
  authEndpoint:'/broadcasting/auth',
  encrypted:true,
  auth:{
    headers:{
      Authorization:'Bearer '+sessionStorage.authToken
    }
  },
  forceTLS:true
})
extend("email", {
  ...email,
  message: "The {_field_} not valid email format."
});

extend('password', {
  params: ['target'],
  validate(value, { target }) {
    return value === target;
  },
  message: 'Password confirmation does not match'
});
extend('max',{...max}),
extend("confirmed", {
  ...confirmed,
  message: "The {_field_} and Password Confirmation does not match."
});

extend("between", {
  ...between,
  params: ['min_value', 'max_value'],
  message: "The {_field_} must between {min_value} and {max_value}"
})
extend("required", {
  ...required,
  message: "The {_field_} is required"
});
extend("min", {
  ...min,
  message: "The {_field_} Minimize 6 characters."
});
extend("image", {
  ...image,
  message: "The {_field_} must be an image."
});

extend("min_value", {
  ...min_value,
  message: "The {_field_} value must greater than {length}.",
});

extend("max_value", {
  ...max_value,
  message: "The {_field_} value must less than {length}."
});

Vue.use(CKEditor);
Vue.use(VueAWN, { position: "top-right" });
Vue.use(abilitiesPlugin, ability);
Vue.use(VueSweetAlert2);

Vue.component("fragment", Fragment);
Vue.component("event-hub", require("@/components/EventHub.vue").default);
Vue.component("vue-select", require("vue-select").default);
Vue.component("ValidationProvider", ValidationProvider);
Vue.component("bootstrap-alert", require("@/components/Alert.vue").default);
Vue.component(
  "validated-input",
  require("@/components/ValidatedInput.vue").default
);
Vue.component(
  "vue-button-spinner",
  require("@/components/VueButtonSpinner.vue").default
);
Vue.component(
  "top-of-all-page",
  require("@/components/TopOfAllPage.vue").default
);
Vue.component("home-side-bar", require("@/components/SideBar.vue").default);
Vue.prototype.$eventHub = new Vue();
Vue.prototype.$axios = require('axios');
Vue.config.productionTip = false;
if (sessionStorage.expires_in) {
  let date = new Date(sessionStorage.expires_in);
  let dateNotify = new Date(date);
  dateNotify.setMinutes(dateNotify.getMinutes() - 5);
  sessionStorage.setItem("notifyTokenExpireBefore5Minute", dateNotify);
  setInterval(() => {
    let user = JSON.parse(sessionStorage.user)
    let dateNow = new Date();
    if (dateNow.getTime() > new Date(sessionStorage.expires_in).getTime()) {
      window.location.href = user.role_name.includes('admin') ? '/admin/logout' : '/user/logout'
      // window.location.href =  '/user/logout'
    }
    if (dateNow.getTime() === new Date(sessionStorage.notifyTokenExpireBefore5Minute).getTime())
      alert("Your session will expires in 5 minutes.\n You will be logout and have to login again to get new session.")
  }, 1000)
}

new Vue({
  data() {
    let user = sessionStorage.user ? JSON.parse(sessionStorage.user) : {}
    return {
      user,
      permissions:[],
    }
  },
  watch: {
    $route: function () {
      this.fetchData();
    }
  },
  mounted() {
    this.fetchData();    
  },
  methods: {
    async fetchData() {
      let data = await this.$store.dispatch("Rules/fetchData");
      this.permissions = data
      this.$eventHub.$emit("rules-update");
      // .then(() => this.$eventHub.$emit("rules-update"));
    }
  },
  router,
  store,
  vuetify,
  render: h => h(App)
}).$mount("#app");
