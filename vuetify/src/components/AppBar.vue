<template>
  <v-app-bar :clipped-left="$vuetify.breakpoint.lgAndUp" app color="blue darken-3" dark>
    <v-app-bar-nav-icon @click.stop="openNav" />
    <v-toolbar-title style="width: 300px" class="ml-0 pl-4">
      <span class="hidden-sm-and-down">Google Contacts</span>
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
    <v-btn icon large>
      <v-avatar size="32px" item>
        <v-img src="https://cdn.vuetifyjs.com/images/logos/logo.svg" alt="Vuetify" />
      </v-avatar>
    </v-btn>
    <v-menu offset-y>
      <template #activator="{ on }">
        <v-btn text class="white--text" v-on="on">
          <span>Member</span>
          <v-icon right>mdi-menu-down</v-icon>
        </v-btn>
      </template>
      <v-list>
        <v-list-item v-for="(item, index) in memberItems" :key="index" link :to="{name:item.to}">
          <v-list-item-title>
            <span>{{ item.title }}</span>
            <v-icon right>{{item.icon}}</v-icon>
          </v-list-item-title>
        </v-list-item>
      </v-list>
    </v-menu>
  </v-app-bar>
</template>

<script>
export default {
  props: {
    drawerComp: {
      type: Boolean,
      required: true
    }
  },
  data: () => ({
    memberItems: [
      { title: "Profile", icon: "mdi-face-profile", to: "profile" },
      { title: "Login", icon: "mdi-login-variant", to: "login" },
      { title: "Logout", icon: "mdi-logout-variant", to: "logout" }
    ]
  }),
  methods: {
    openNav() {
      this.$emit("openNav", !this.drawerComp);
    }
  }
};
</script>

<style>
</style>