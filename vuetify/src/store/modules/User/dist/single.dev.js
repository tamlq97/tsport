"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _utils = require("@/utils");

function initState() {
  return {
    user: {
      id: "",
      email: "",
      password: "",
      name: "",
      role: []
    },
    rolesAll: [],
    loading: false
  };
}

var getters = {
  user: function user(state) {
    return state.user;
  },
  loading: function loading(state) {
    return state.loading;
  },
  rolesAll: function rolesAll(state) {
    return state.rolesAll;
  }
};
var actions = {
  updateUserProfile: function updateUserProfile(context, data) {
    var formData = new FormData();
    (0, _utils.convertObjectToFormData)(data, formData);
    formData.append("_method", 'put');
    return new Promise(function (resolve, reject) {
      _utils.apiURL.post("auth/update/".concat(data.id), formData).then(function (_ref) {
        var data = _ref.data;
        resolve({
          data: data
        });
      })["catch"](function (_ref2) {
        var response = _ref2.response;
        return reject(response);
      });
    });
  },
  updateCustomerProfile: function updateCustomerProfile(context, data) {
    var formData = new FormData();
    (0, _utils.convertObjectToFormData)(data, formData);
    formData.append("_method", 'put');
    return new Promise(function (resolve, reject) {
      _utils.apiURL.post("customers/".concat(data.id), formData).then(function (_ref3) {
        var data = _ref3.data;
        resolve(data);
      })["catch"](function (_ref4) {
        var response = _ref4.response;
        return reject(response);
      });
    });
  },
  updateSupplierProfile: function updateSupplierProfile(context, data) {
    var formData = new FormData();
    (0, _utils.convertObjectToFormData)(data, formData);
    formData.append('_method', 'put');
    return new Promise(function (resolve, reject) {
      _utils.apiURL.post("suppliers/".concat(data.supplier_code), formData).then(function (_ref5) {
        var data = _ref5.data;
        resolve(data);
      })["catch"](function (_ref6) {
        var response = _ref6.response;
        return reject(response);
      });
    });
  },
  loginUser: function loginUser(_ref7, user) {
    var commit = _ref7.commit;
    commit("SET_LOADING", true);
    return new Promise(function (resolve, reject) {
      return _utils.apiURL.post("auth/login", user).then(function (res) {
        commit("SET_USER", res.data.user);
        sessionStorage.setItem("user", JSON.stringify(res.data.user));
        sessionStorage.setItem("authToken", res.data.access_token);
        sessionStorage.setItem("userLoggedIn", "logged");
        var d = new Date();
        d.setHours(d.getHours() + res.data.expires_in / 60 / 60);
        sessionStorage.setItem("expires_in", d);
        resolve(res);
      })["catch"](function (err) {
        console.log(err);
        reject(err);
      })["finally"](function () {
        return commit("SET_LOADING", false);
      });
    });
  },
  registerUser: function registerUser(_ref8, user) {
    var commit = _ref8.commit;
    commit("SET_LOADING", true);
    return new Promise(function (resolve, reject) {
      return _utils.apiURL.post("register", user).then(function (_ref9) {
        var data = _ref9.data;
        resolve(data);
      })["catch"](function (_ref10) {
        var response = _ref10.response;
        reject(response);
      })["finally"](function () {
        return commit("SET_LOADING", false);
      });
    });
  },
  // eslint-disable-next-line no-unused-vars
  fetch: function fetch(_ref11, user) {
    var commit = _ref11.commit,
        dispatch = _ref11.dispatch;
    dispatch("Alert/resetState", null, {
      root: true
    });
    return new Promise(function (resolve, reject) {
      _utils.apiURL.get("users/".concat(user.id)).then(function (_ref12) {
        var data = _ref12.data.data;
        commit("SET_USER", data);
        dispatch("fetchRolesAll");
        resolve(data);
      })["catch"](function (err) {
        return reject(err);
      });
    });
  },
  fetchRolesAll: function fetchRolesAll(_ref13) {
    var commit = _ref13.commit;

    _utils.apiURL.get("roles", {
      params: {
        showData: true
      }
    }).then(function (res) {
      commit("SET_ROLES_ALL", res.data);
    })["catch"](function (err) {
      return console.log(err);
    });
  },
  store: function store(_ref14, user) {
    var dispatch = _ref14.dispatch,
        commit = _ref14.commit;
    commit("SET_FETCHING", true);
    dispatch("Alert/resetState", null, {
      root: true
    });
    return new Promise(function (resolve, reject) {
      _utils.apiURL.post("users", user).then(function (res) {
        dispatch("UserIndex/fetchData", null, {
          root: true
        });
        resolve(res);
      })["catch"](function (error) {
        var message = error.response.data.message || error.message;
        var errors = error.response.data.errors;
        dispatch("Alert/setAlert", {
          message: message,
          errors: errors,
          color: "danger"
        }, {
          root: true
        });
        reject(error.response);
      })["finally"](function () {
        return commit("SET_FETCHING", false);
      });
    });
  },
  me: function me() {
    return new Promise(function (resolve, reject) {
      _utils.apiURL.post('auth/me').then(function (_ref15) {
        var data = _ref15.data;
        return resolve(data);
      })["catch"](function (response) {
        return reject(response);
      });
    });
  },
  update: function update(_ref16, user) {
    var commit = _ref16.commit,
        dispatch = _ref16.dispatch;
    commit("SET_FETCHING", true);
    return new Promise(function (resolve, reject) {
      _utils.apiURL.put("users/".concat(user.id), user).then(function (res) {
        dispatch("UserIndex/fetchData", null, {
          root: true
        });
        resolve(res);
      })["catch"](function (err) {
        var message = err.response.data.message || err.message;
        var errors = err.response.data.errors;
        dispatch("Alert/setAlert", {
          message: message,
          errors: errors,
          color: "danger"
        }, {
          root: true
        });
        reject(err);
      })["finally"](function () {
        return commit("SET_FETCHING", false);
      });
    });
  },
  "delete": function _delete(_ref17, user) {
    var commit = _ref17.commit,
        dispatch = _ref17.dispatch;
    commit("SET_FETCHING", true);
    return new Promise(function (resolve, reject) {
      _utils.apiURL["delete"]("users/".concat(user.id), user).then(function (res) {
        dispatch("UserIndex/fetchData", null, {
          root: true
        });
        resolve(res);
      })["catch"](function (err) {
        var _err$reponse$data = err.reponse.data,
            errors = _err$reponse$data.errors,
            message = _err$reponse$data.message;
        dispatch("Alert/setAlert", {
          errors: errors,
          message: message,
          color: "danger"
        });
        reject(err);
      })["finally"](function () {
        return commit("SET_FETCHING", false);
      });
    });
  },
  logout: function logout(_ref18) {
    var commit = _ref18.commit;
    return new Promise(function (resolve, reject) {
      return _utils.apiURL.get("auth/logout").then(function (res) {
        commit("INIT_STATE");
        sessionStorage.removeItem("authToken");
        sessionStorage.removeItem("user");
        sessionStorage.removeItem("userLoggedIn");
        sessionStorage.removeItem('expires_in');
        sessionStorage.removeItem('notifyTokenExpireBefore5Minute');
        resolve(res.data);
      })["catch"](function (err) {
        return reject(err.response);
      });
    });
  },
  resetState: function resetState(_ref19) {
    var commit = _ref19.commit;
    commit("INIT_STATE");
  },
  setUser: function setUser(_ref20) {
    var commit = _ref20.commit;
    var user = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {
      id: "",
      email: "",
      password: "",
      name: "",
      role: []
    };
    commit("SET_USER", user);
  },
  updateRole: function updateRole(_ref21, role) {
    var commit = _ref21.commit;
    commit("UPDATE_ROLE", role);
  },
  updateName: function updateName(_ref22, name) {
    var commit = _ref22.commit;
    commit("UPDATE_NAME", name);
  },
  updateEmail: function updateEmail(_ref23, email) {
    var commit = _ref23.commit;
    commit("UPDATE_EMAIL", email);
  },
  updatePassword: function updatePassword(_ref24, password) {
    var commit = _ref24.commit;
    commit("UPDATE_PASSWORD", password);
  }
};
var mutations = {
  SET_USER: function SET_USER(state, user) {
    state.user = user;
  },
  UPDATE_PASSWORD: function UPDATE_PASSWORD(state, pass) {
    state.user.password = pass;
  },
  SET_FETCHING: function SET_FETCHING(state, value) {
    state.loading = value;
  },
  SET_ROLES_ALL: function SET_ROLES_ALL(state, data) {
    state.rolesAll = data;
  },
  // eslint-disable-next-line no-unused-vars
  INIT_STATE: function INIT_STATE(state) {
    state = Object.assign(state, initState());
  },
  UPDATE_EMAIL: function UPDATE_EMAIL(state, email) {
    state.user.email = email;
  },
  UPDATE_ROLE: function UPDATE_ROLE(state, role) {
    state.user.role = role;
  },
  UPDATE_NAME: function UPDATE_NAME(state, name) {
    state.user.name = name;
  }
};
var _default = {
  namespaced: true,
  state: initState(),
  getters: getters,
  actions: actions,
  mutations: mutations
};
exports["default"] = _default;