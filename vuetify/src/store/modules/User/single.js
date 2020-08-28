import {
  apiURL,
  convertObjectToFormData
} from "@/utils";

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

const getters = {

  user: state => state.user,
  loading: state => state.loading,
  rolesAll: state => state.rolesAll
};

const actions = {
  updateUserProfile(context, data) {
    let formData = new FormData();
    convertObjectToFormData(data, formData);

    formData.append("_method", 'put')
    return new Promise((resolve, reject) => {
      apiURL.post(`auth/update/${data.id}`, formData)
        .then(({
          data
        }) => {
          resolve({
            data
          })
        })
        .catch(({
          response
        }) => reject(response))
    })
  },
  updateCustomerProfile(context, data) {
    let formData = new FormData();
    convertObjectToFormData(data, formData);

    formData.append("_method", 'put')
    return new Promise((resolve, reject) => {
      apiURL.post(`customers/${data.id}`, formData)
        .then(({
          data
        }) => {
          resolve(data)
        })
        .catch(({
          response
        }) => reject(response))
    })
  },
  updateSupplierProfile(context, data) {
    let formData = new FormData();
    convertObjectToFormData(data, formData)
    formData.append('_method', 'put')
    return new Promise((resolve, reject) => {
      apiURL.post(`suppliers/${data.supplier_code}`, formData)
        .then(({
          data
        }) => {
          resolve(data)
        })
        .catch(({
          response
        }) => reject(response))
    })

  },
  loginUser({
    commit
  }, user) {
    commit("SET_LOADING", true);
    return new Promise((resolve, reject) => {
      return apiURL
        .post("auth/login", user)

        .then(res => {

          commit("SET_USER", res.data.user);
          sessionStorage.setItem("user", JSON.stringify(res.data.user));
          sessionStorage.setItem("authToken", res.data.access_token);
          sessionStorage.setItem("userLoggedIn", "logged");

          let d = new Date()
          d.setHours(d.getHours() + (res.data.expires_in / 60 / 60))
          sessionStorage.setItem("expires_in", d);
          resolve(res);
        })
        .catch(err => {
          console.log(err);

          reject(err);
        })
        .finally(() => commit("SET_LOADING", false));
    });
  },
  registerUser({
    commit
  }, user) {
    commit("SET_LOADING", true);
    return new Promise((resolve, reject) => {
      return apiURL
        .post("register", user)
        .then(({
          data
        }) => {
          resolve(data);
        })
        .catch(({
          response
        }) => {
          reject(response);
        })
        .finally(() => commit("SET_LOADING", false));
    });
  },
  // eslint-disable-next-line no-unused-vars
  fetch({
    commit,
    dispatch
  }, user) {
    dispatch("Alert/resetState", null, {
      root: true
    });
    return new Promise((resolve, reject) => {
      apiURL
        .get(`users/${user.id}`)
        .then(({
          data: {
            data
          }
        }) => {

          commit("SET_USER", data)
          dispatch("fetchRolesAll");
          resolve(data)
        })
        .catch(err => reject(err));
    })

  },
  fetchRolesAll({
    commit
  }) {
    apiURL
      .get("roles", {
        params: {
          showData: true
        }
      })

      .then(res => {
        commit("SET_ROLES_ALL", res.data);
      })
      .catch(err => console.log(err));
  },
  store({
    dispatch,
    commit
  }, user) {
    commit("SET_FETCHING", true);
    dispatch("Alert/resetState", null, {
      root: true
    });

    return new Promise((resolve, reject) => {
      apiURL
        .post("users", user)

        .then(res => {
          dispatch("UserIndex/fetchData", null, {
            root: true
          });
          resolve(res);
        })
        .catch(error => {

          let message = error.response.data.message || error.message;
          let errors = error.response.data.errors;
          dispatch(
            "Alert/setAlert", {
              message,
              errors,
              color: "danger"
            }, {
              root: true
            }
          );
          reject(error.response);
        })
        .finally(() => commit("SET_FETCHING", false));
    });
  },

  me() {
    return new Promise((resolve, reject) => {

      apiURL.post('auth/me')
        .then(({
          data
        }) => resolve(data))
        .catch((response) => reject(response))
    })
  },

  update({
    commit,
    dispatch
  }, user) {
    commit("SET_FETCHING", true);
    return new Promise((resolve, reject) => {
      apiURL
        .put(`users/${user.id}`, user)

        .then(res => {
          dispatch("UserIndex/fetchData", null, {
            root: true
          });
          resolve(res);
        })
        .catch(err => {
          let message = err.response.data.message || err.message;
          let errors = err.response.data.errors;
          dispatch(
            "Alert/setAlert", {
              message,
              errors,
              color: "danger"
            }, {
              root: true
            }
          );
          reject(err);
        })
        .finally(() => commit("SET_FETCHING", false));
    });
  },
  delete({
    commit,
    dispatch
  }, user) {
    commit("SET_FETCHING", true);
    return new Promise((resolve, reject) => {
      apiURL
        .delete(`users/${user.id}`, user)

        .then(res => {
          dispatch("UserIndex/fetchData", null, {
            root: true
          });
          resolve(res);
        })
        .catch(err => {
          let {
            errors,
            message
          } = err.reponse.data;
          dispatch("Alert/setAlert", {
            errors,
            message,
            color: "danger"
          });
          reject(err);
        })
        .finally(() => commit("SET_FETCHING", false));
    });
  },
  logout({
    commit
  }) {
    return new Promise((resolve, reject) => {
      return apiURL
        .get("auth/logout")

        .then(res => {
          commit("INIT_STATE");
          sessionStorage.removeItem("authToken");
          sessionStorage.removeItem("user");
          sessionStorage.removeItem("userLoggedIn");

          sessionStorage.removeItem('expires_in')
          sessionStorage.removeItem('notifyTokenExpireBefore5Minute')
          resolve(res.data);
        })
        .catch(err => reject(err.response));
    });
  },
  resetState({
    commit
  }) {
    commit("INIT_STATE");
  },
  setUser({
      commit
    },
    user = {
      id: "",
      email: "",
      password: "",
      name: "",

      role: []
    }
  ) {
    commit("SET_USER", user);
  },
  updateRole({
    commit
  }, role) {
    commit("UPDATE_ROLE", role);
  },
  updateName({
    commit
  }, name) {
    commit("UPDATE_NAME", name);
  },
  updateEmail({
    commit
  }, email) {
    commit("UPDATE_EMAIL", email);
  },
  updatePassword({
    commit
  }, password) {
    commit("UPDATE_PASSWORD", password);

  }
};

const mutations = {
  SET_USER(state, user) {
    state.user = user;
  },
  UPDATE_PASSWORD(state, pass) {
    state.user.password = pass;
  },
  SET_FETCHING(state, value) {
    state.loading = value;
  },
  SET_ROLES_ALL(state, data) {
    state.rolesAll = data;
  },
  // eslint-disable-next-line no-unused-vars
  INIT_STATE(state) {
    state = Object.assign(state, initState());
  },
  UPDATE_EMAIL(state, email) {
    state.user.email = email;
  },
  UPDATE_ROLE(state, role) {
    state.user.role = role;
  },
  UPDATE_NAME(state, name) {
    state.user.name = name;

  }
};

export default {
  namespaced: true,
  state: initState(),
  getters,
  actions,

  mutations
};