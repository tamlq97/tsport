import Vue from "vue";
import Vuex from "vuex";
import UserSingle from "./modules/User/single.js";
import UserIndex from "./modules/User";
import RoleIndex from "./modules/Role";
import RoleSingle from "./modules/Role/single";
import PermissionIndex from "./modules/Permission";
import PermissionSingle from "./modules/Permission/single";
import ProductIndex from "./modules/Product";
import ProductSingle from "./modules/Product/single";
import Rules from "./modules/rules";
import Alert from "./modules/alert";
import HomeProduct from "./modules/HomeProduct/products";
import Category from "./modules/categories";
import Supplier from "./modules/supplier";
import Notification from "./modules/notifications";
import ColorPicture from "./modules/Product/ColorPicture/pictures";
import OrderIndex from "./modules/Order/index";
Vue.use(Vuex);

export default new Vuex.Store({
  // plugins: [createPersistedState({ storage: window.sessionStorage })],
  modules: {
    Alert,
    UserSingle,
    UserIndex,
    RoleIndex,
    RoleSingle,
    PermissionIndex,
    PermissionSingle,
    ProductIndex,
    ProductSingle,
    Rules,
    HomeProduct,
    Category,
    Supplier,
    Notification,
    ColorPicture,
    OrderIndex,
  },
});
