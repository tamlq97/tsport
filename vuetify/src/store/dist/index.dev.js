"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _vue = _interopRequireDefault(require("vue"));

var _vuex = _interopRequireDefault(require("vuex"));

var _single = _interopRequireDefault(require("./modules/User/single.js"));

var _User = _interopRequireDefault(require("./modules/User"));

var _Role = _interopRequireDefault(require("./modules/Role"));

var _single2 = _interopRequireDefault(require("./modules/Role/single"));

var _Permission = _interopRequireDefault(require("./modules/Permission"));

var _single3 = _interopRequireDefault(require("./modules/Permission/single"));

var _Product = _interopRequireDefault(require("./modules/Product"));

var _single4 = _interopRequireDefault(require("./modules/Product/single"));

var _rules = _interopRequireDefault(require("./modules/rules"));

var _alert = _interopRequireDefault(require("./modules/alert"));

var _products = _interopRequireDefault(require("./modules/HomeProduct/products"));

var _categories = _interopRequireDefault(require("./modules/categories"));

var _supplier = _interopRequireDefault(require("./modules/supplier"));

var _notifications = _interopRequireDefault(require("./modules/notifications"));

var _pictures = _interopRequireDefault(require("./modules/Product/ColorPicture/pictures"));

var _index = _interopRequireDefault(require("./modules/Order/index"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

// import createPersistedState from "vuex-persistedstate";
_vue["default"].use(_vuex["default"]);

var _default = new _vuex["default"].Store({
  // plugins: [createPersistedState({ storage: window.sessionStorage })],
  modules: {
    Alert: _alert["default"],
    UserSingle: _single["default"],
    UserIndex: _User["default"],
    RoleIndex: _Role["default"],
    RoleSingle: _single2["default"],
    PermissionIndex: _Permission["default"],
    PermissionSingle: _single3["default"],
    ProductIndex: _Product["default"],
    ProductSingle: _single4["default"],
    Rules: _rules["default"],
    HomeProduct: _products["default"],
    Category: _categories["default"],
    Supplier: _supplier["default"],
    Notification: _notifications["default"],
    ColorPicture: _pictures["default"],
    OrderIndex: _index["default"]
  }
});

exports["default"] = _default;