import { apiURL } from "@/utils";

function initState() {
  return {
    permission: {
      id: "",
      name: ""
    },
    fetching: false
  };
}

const getters = {
  permission: state => state.permission,
  fetching: state => state.fetching
};

const actions = {
  fetch({ commit, dispatch, state }) {
    apiURL
      .get(`permissions/${state.permission.id}`, state.permission)
      .then(res => {
        commit("SET_PERMISSION", res.data.data);
      })
      .catch(err => {
        let { errors, message } = err.response.data;
        dispatch("Alert/setAlert", { errors, message, color: "danger" });
      });
  },
  store({ commit, dispatch, state }) {
    commit("SET_FETCHING", true);
    return new Promise((resolve, reject) => {
      apiURL
        .post("permissions", state.permission)
        .then(res => {
          dispatch("PermissionIndex/fetchData", null, { root: true });
          resolve(res);
        })
        .catch(err => {
          const { errors, message } = err.response.data;
          dispatch(
            "Alert/setAlert",
            { errors, message, color: "danger" },
            { root: true }
          );
          reject(err.response);
        })
        .finally(() => commit("SET_FETCHING", false));
    });
  },
  update({ commit, dispatch, state }) {
    commit("SET_FETCHING", true);
    return new Promise((resolve, reject) => {
      apiURL
        .put(`permissions/${state.permission.id}`, state.permission)
        .then(res => {
          dispatch("PermissionIndex/fetchData", null, { root: true });
          resolve(res);
        })
        .catch(err => {
          const { errors, message } = err.reponse.data;
          dispatch(
            "Alert/setAlert",
            { errors, message, color: "danger" },
            { root: true }
          );
          reject(err);
        })
        .finally(() => commit("SET_FETCHING", false));
    });
  },
  delete({ commit, dispatch, state }) {
    commit("SET_FETCHING", true);
    return new Promise((resolve, reject) => {
      apiURL
        .delete(`permissions/${state.permission.id}`, state.permission)
        .then(res => {
          dispatch("PermissionIndex/fetchData", null, { root: true });
          resolve(res);
        })
        .catch(err => {
          const { errors, message } = err.reponse.data;
          dispatch(
            "Alert/setAlert",
            { errors, message, color: "danger" },
            { root: true }
          );
          reject(err);
        })
        .finally(() => commit("SET_FETCHING", false));
    });
  },
  updateName({ commit }, name) {
    commit("UPDATE_NAME", name);
  },
  setPermission({ commit }, permission = { id: "", name: "" }) {
    commit("SET_PERMISSION", permission);
  },
  resetState({ commit }) {
    commit("INIT_STATE");
  }
};

const mutations = {
  SET_FETCHING(state, stus) {
    state.fetching = stus;
  },
  UPDATE_NAME(state, name) {
    state.permission.name = name;
  },
  SET_PERMISSION(state, permission) {
    state.permission = permission;
  },
  // eslint-disable-next-line no-unused-vars
  INIT_STATE(state) {
    state = Object.assign(state, initState());
  }
};

export default {
  namespaced: true,
  state: initState(),
  getters,
  actions,
  mutations
};
