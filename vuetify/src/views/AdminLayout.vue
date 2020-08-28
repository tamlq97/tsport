<template>
  <v-app id="inspire">
    <event-hub></event-hub>
    <v-navigation-drawer
      disable-resize-watcher
      v-model="drawer"
      :clipped="$vuetify.breakpoint.lgAndUp"
      app
    >
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
          <v-list-group
            v-else-if="item.children"
            :key="item.text"
            v-model="item.model"
            :prepend-icon="item.model ? item.icon : item['icon-alt']"
            append-icon
          >
            <template v-slot:activator>
              <v-list-item-content>
                <v-list-item-title>{{ item.text }}</v-list-item-title>
              </v-list-item-content>
            </template>
            <v-list-item v-for="(child, i) in item.children" :key="i" link :to="child.to">
              <v-list-item-action v-if="child.icon">
                <v-icon>mdi-{{ child.icon }}</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>{{ child.text }}</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-group>

          <v-list-item v-else :key="item.text" link :to="{name:item.to}">
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
      <v-toolbar-title style="width: 300px" class="ml-0 pl-4" @click="gotoHome">
        <span class="hidden-sm-and-down">VinhTrang</span>
      </v-toolbar-title>
      <v-text-field
        flat
        solo-inverted
        hide-details
        prepend-inner-icon="mdi-magnify"
        label="Search"
        class="hidden-sm-and-down"
      />
      <v-spacer />
      <v-btn icon>
        <v-icon>mdi-apps</v-icon>
      </v-btn>
      <v-btn icon>
        <v-icon>mdi-bell</v-icon>
      </v-btn>
      
      <v-menu offset-y>
        <template #activator="{ on }">
          <v-btn text class="white--text" v-on="on">
            <span>{{user ? user.email :'Member'}}</span>
            <v-icon right>mdi-menu-down</v-icon>
          </v-btn>
        </template>
        <v-list>
          <v-list-item v-if="authLogged == 'logged'" link :to="{name:'user'}">
            <v-list-item-title>
              <span>User</span>
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
    </v-btn>
    <v-dialog v-model="dialog" width="800px">
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
    }
  },
  mounted() {
    this.$eventHub.$on("userLoggedIn", state => (this.authLogged = state));
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
    gotoHome() {
      window.location.href = "/";
    },
    openNav(value) {
      this.drawer = value;
    }
  },
  data() {
    let authLogged = sessionStorage.userLoggedIn ?? null;
    let user = JSON.parse(sessionStorage.user) ?? "";
    return {
      user: user,
      authLogged: authLogged,
      drawer: false,
      dialog: false,
      items: [
        {
          icon: "align-vertical",
          text: "Dashboard",
          model: false,
          to: "dashboard"
        },
        {
          icon: "mdi-chevron-up",
          "icon-alt": "mdi-chevron-down",
          text: "User Management",
          model: false,
          children: [
            { text: "Users", to: "users", icon: "account" },
            { text: "Roles", to: "roles", icon: "briefcase-account" },
            {
              text: "Permissions",
              to: "permissions",
              icon: "briefcase-account"
            }
          ]
        },
        // {
        //   icon: "align-vertical",
        //   text: "Statistical",
        //   model: false,
        //   to: "statistical"
        // }
      ]
    };
  }
};
</script>