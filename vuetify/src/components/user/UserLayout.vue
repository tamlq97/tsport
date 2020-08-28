<template>
  <v-app id="inspire">
    <event-hub></event-hub>
    <v-navigation-drawer v-model="drawer" :clipped="$vuetify.breakpoint.lgAndUp" app>
      <v-list dense>
        <template v-for="item in items">
          <v-row v-if="item.heading" :key="item.heading" align="center">
            <v-col cols="6">
              <v-subheader v-if="item.heading">{{ item.heading }}</v-subheader>
            </v-col>
            <v-col cols="6" class="text-center">
              <a href="#!" class="body-2 black--text">EDIT</a>
            </v-col>
          </v-row>
          <v-list-group v-else-if="item.children && $can(item.can)" :key="item.text">
            <template v-slot:activator>
              <v-list-item-content>
                <v-list-item-title>{{ item.text }}</v-list-item-title>
              </v-list-item-content>
            </template>
            <fragment v-for="(child, i) in item.children" :key="i">
              <v-list-item v-if="$can(child.can)" link :to="{name:child.to}">
                <v-list-item-action v-if="child.icon">
                  <v-icon>mdi-{{ child.icon }}</v-icon>
                </v-list-item-action>
                <v-list-item-content>
                  <v-list-item-title>{{ child.text }}</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </fragment>
          </v-list-group>

          <v-list-item v-else-if="$can(item.can)" :key="item.text" link :to="{name:item.to}">
            <v-list-item-action>
              <v-icon>mdi-{{ item.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>{{ item.text }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </template>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar :clipped-left="$vuetify.breakpoint.lgAndUp" app color="blue darken-3" dark>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
      <v-toolbar-title style="width: 300px;cursor:pointer" @click="gotoHome" class="ml-0 pl-4">
        VinhTrang
        <!-- <v-btn icon large @click="gotoHome">
        <v-avatar size="32px" color="white" item>
          <v-img src="https://cdn.vuetifyjs.com/images/logos/logo.svg" alt="Vuetify" />
          
        </v-avatar>
        </v-btn>-->
      </v-toolbar-title>
      <v-spacer />

      <v-btn icon>
        <v-icon>mdi-apps</v-icon>
      </v-btn>
      <v-menu offset-y max-width="400">
        <template #activator="{ on }">
          <v-badge color="green" :content="totalNotify">
            <v-icon v-on="on">mdi-bell</v-icon>
          </v-badge>
        </template>
        <v-list class="p-0">
          <!-- <div v-if="totalNotify > 0"> -->
          <fragment v-for="(notify,k) in notifications" :key="k">
            <v-list-item
              @click="unread(notify)"
              :style="{'cursor':'pointer','background':notify.read_at ? '' : '#d0c9c9'}"
            >
              <v-list-item-title>{{notify.data.message}}</v-list-item-title>
              <p>
                <v-list-item-subtitle>{{moment(notify.data.order_date)}}</v-list-item-subtitle>
              </p>
            </v-list-item>
          </fragment>
          <!-- </div>
          <div v-else>
            <p>Does not have any notification.</p>
          </div>-->
        </v-list>
      </v-menu>

      <v-menu offset-y>
        <template #activator="{ on }">
          <v-btn text class="white--text" v-on="on">
            <span>{{user ? user.email :'Member'}}</span>
            <v-icon right>mdi-menu-down</v-icon>
          </v-btn>
        </template>
        <v-list>
          <v-list-item
            v-if="authLogged == 'logged' && $can('delete_user')"
            link
            :to="{name:'admin'}"
          >
            <v-list-item-title>
              <span>Admin</span>
              <v-icon right>mdi-folder</v-icon>
            </v-list-item-title>
          </v-list-item>
          <v-list-item v-if="authLogged == 'logged'" link :to="{name:'user_profile'}">
            <v-list-item-title>
              <span>Profile</span>
              <v-icon right>mdi-account</v-icon>
            </v-list-item-title>
          </v-list-item>
          <v-list-item v-if="authLogged == null" link :to="{name:'login'}">
            <v-list-item-title>
              <span>Login</span>
              <v-icon right>mdi-login</v-icon>
            </v-list-item-title>
          </v-list-item>
          <v-list-item v-if="authLogged == 'logged'" link @click="logout">
            <v-list-item-title>
              <span>Logout</span>
              <v-icon right>mdi-logout</v-icon>
            </v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
    </v-app-bar>

    <!-- <v-content> -->
    <v-container class="fill-height" fluid>
      <v-row>
        <v-breadcrumbs :items="$route.meta.breadcrumb">
          <template v-slot:item="props">
            <router-link :to="{name:props.item.href}">{{props.item.text}}</router-link>
          </template>
        </v-breadcrumbs>
      </v-row>
      <router-view></router-view>
    </v-container>
    <!-- </v-content> -->
    <!-- <v-btn bottom color="pink" dark fab fixed right @click="dialog = !dialog">
      <v-icon>mdi-plus</v-icon>
    </v-btn> -->
    <!-- <v-dialog v-model="dialog" width="800px">
      <v-card>
        <v-card-title class="grey darken-2">Create contact</v-card-title>
        <v-container>
          <v-row class="mx-2">
            <v-col class="align-center justify-space-between" cols="12">
              <v-row align="center" class="mr-0">
                <v-avatar size="40px" class="mx-3">
                  <img src="//ssl.gstatic.com/s2/oz/images/sge/grey_silhouette.png" alt />
                </v-avatar>
                <v-text-field placeholder="Name" />
              </v-row>
            </v-col>
            <v-col cols="6">
              <v-text-field prepend-icon="mdi-account-card-details-outline" placeholder="Company" />
            </v-col>
            <v-col cols="6">
              <v-text-field placeholder="Job title" />
            </v-col>
            <v-col cols="12">
              <v-text-field prepend-icon="mdi-mail" placeholder="Email" />
            </v-col>
            <v-col cols="12">
              <v-text-field type="tel" prepend-icon="mdi-phone" placeholder="(000) 000 - 0000" />
            </v-col>
            <v-col cols="12">
              <v-text-field prepend-icon="mdi-text" placeholder="Notes" />
            </v-col>
          </v-row>
        </v-container>
        <v-card-actions>
          <v-btn text color="primary">More</v-btn>
          <v-spacer />
          <v-btn text color="primary" @click="dialog = false">Cancel</v-btn>
          <v-btn text @click="dialog = false">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog> -->
  </v-app>
</template>

<script>
import moment from "moment";
import EventHub from "@/components/EventHub.vue";
export default {
  components: {
    EventHub
  },
  props: {
    source: String
  },
  computed: {
    drawerComp: {
      get() {
        return this.drawer;
      },
      set(value) {
        this.drawer = value;
      }
    },
    notificationsStore() {
      return this.$store.getters["Notification/notifications"];
    },
    unreadNotificationsStore() {
      return this.$store.getters["Notification/unreadNotifications"];
    }
  },
  mounted() {
    this.$eventHub.$on("userLoggedIn", state => (this.authLogged = state));
  },
  watch: {
    $route: function() {
      this.fetchNotifications();
    }
  },
  methods: {
    logout() {
      this.$swal({
        title: "Are you sure?",
        text: `Your session will be done!`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Logout",
        confirmButtonColor: "#dd4b39",
        focusCancel: true,
        reverseButtons: true
      }).then(result => {
        if (result.value) {
          this.$store.dispatch("UserSingle/logout").then(() => {
            window.location.href = "/login";
          });
        }
      });
    },
    moment(date) {
      return moment(date).fromNow();
    },
    gotoHome() {
      window.location.href = "/";
    },
    openNav(value) {
      this.drawer = value;
    },
    unread(notify) {
      this.$store
        .dispatch("Notification/unread", notify)
        .then(({ notifications, unreadNotifications }) => {
          this.$eventHub.$emit("fetchOrders", notify.data.madh);
          if (this.$route.name != "order-manager")
            this.$router.push({ name: "order-manager" });
          this.notifications = notifications;
          this.totalNotify = unreadNotifications.length;
        });
    },
    fetchNotifications() {
      this.$store
        .dispatch("Notification/fetchNotifications")
        .then(({ notifications, unreadNotifications }) => {
          this.notifications = notifications;
          this.totalNotify = unreadNotifications.length;
        });
    }
  },
  created() {
    window.Echo.private(`OrderSuccess`).listen("OrderSuccess", e => {
      console.log(e);
    });
    window.Echo.private(`App.User.${this.$root["user"]["id"]}`).notification(
      notification => {
        this.$store
          .dispatch("Notification/fetchNotifications")
          .then(({ notifications }) => {
            this.notifications = notifications;
          });
        this.totalNotify = notification.count;
      }
    );
    this.fetchNotifications();
    this.$eventHub.$on("deleteNotify", madh => {
      let index = this.notifications.findIndex(
        notify => notify.data.madh === madh
      );
      this.$store
        .dispatch("Notification/delete", {
          user_id: this.$root["user"]["id"],
          notify: this.notifications[index]
        })
        .then(() => this.notifications.splice(index, 1));
    });
  },
  data() {
    let authLogged = sessionStorage.userLoggedIn ?? null;
    let user = JSON.parse(sessionStorage.user) ?? "";
    return {
      user: user,
      totalNotify: 0,
      authLogged: authLogged,
      drawer: false,
      dialog: false,
      notifications: [],
      items: [
        {
          icon: "briefcase",
          text: "Task Manager",
          model: false,
          can: "view_task_management",
          children: [
            {
              text: "Supplier Manager",
              to: "supplier-manager",
              icon: "account",
              can: "access_supplier"
            },
            {
              icon: "account",
              text: "Customer Manager",
              model: false,
              to: "customer-manager",
              can: "access_customer"
            },
            {
              text: "Category Manager",
              to: "category-manager",
              icon: "briefcase-account",
              can: "access_category"
            },
            {
              icon: "briefcase",
              text: "Product Manager",
              model: false,
              to: "product-manager",
              can: "access_product"
            },
          ]
        },
        {
          icon: "cart-arrow-down",
          text: "Order Manager",
          model: false,
          to: "order-manager",
          can: "access_order_manager"
        }
      ]
    };
  }
};
</script>