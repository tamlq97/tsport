import { apiURL } from "@/utils";
function getPermissionID(array) {
  let permission = [];
  if (array) {
    array.forEach(v => permission.push(v.id));
  }
  return permission;
}
function initState() {
  return {
    role: {
      id: "",
      name: "",
      permission: []
    },
    permissionsAll: [],
    fetching: false
  };
}

const getters = {
  role: state => state.role,
  fetching: state => state.fetching,
  permissionsAll: state => state.permissionsAll
};

const actions = {
  fetch({ commit, dispatch, state }) {
    apiURL
      .get(`roles/${state.role.id}`, state.role)
      .then(res => {
        commit("SET_ROLE", res.data.data);
      })
      .catch(err => {
        let { errors, message } = err.response.data;
        dispatch("Alert/setAlert", { errors, message, color: "danger" });
      });
    dispatch("fetchPermisisonsAll");
  },
  fetchPermisisonsAll({ commit, dispatch }) {
    apiURL
      .get("permissions", { params: { showData: true } })
      .then(({ data }) => {
        commit("SET_PERMISSIONS_ALL", data);
      })
      .catch(({ response }) =>
        dispatch(
          "Alert/setAlert",
          { errors: response.data, message: response.data, color: "danger" },
          { root: true }
        )
      );
  },
  store({ commit, dispatch, state }) {
    commit("SET_FETCHING", true);
    let role = {
      ...state.role,
      permission: getPermissionID(state.role.permission)
    };
    return new Promise((resolve, reject) => {
      apiURL
        .post("roles", role)
        .then(res => {
          dispatch("RoleIndex/fetchData", null, { root: true });
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
  update({ commit, dispatch, state }) {
    commit("SET_FETCHING", true);
    let role = {
      ...state.role,
      permission: getPermissionID(state.role.permission)
    };
    return new Promise((resolve, reject) => {
      apiURL
        .put(`roles/${state.role.id}`, role)
        .then(res => {
          dispatch("RoleIndex/fetchData", null, { root: true });
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
    let role = {
      ...state.role,
      permission: getPermissionID(state.role.permission)
    };
    return new Promise((resolve, reject) => {
      apiURL
        .delete(`roles/${state.role.id}`, role)
        .then(res => {
          dispatch("RoleIndex/fetchData", null, { root: true });
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
  updatePermission({ commit }, per) {
    commit("UPDATE_PERMISSION", per);
  },
  setRole({ commit }, role = { id: "", name: "", permission: [] }) {
    commit("SET_ROLE", role);
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
    state.role.name = name;
  },
  UPDATE_PERMISSION(state, permission) {
    state.role.permission = permission;
  },
  SET_PERMISSIONS_ALL(state, all) {
    state.permissionsAll = all;
  },
  SET_ROLE(state, role) {
    state.role = role;
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
