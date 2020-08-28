function initAlert() {
  return {
    errors: null,
    message: null,
    color: "success"
  };
}

const getters = {
  errors: state => state.errors,
  message: state => state.message,
  color: state => state.color
};

const actions = {
  setErrors({ commit }, errors) {
    commit("SET_ERRORS", errors);
  },
  setMessage({ commit }, message) {
    commit("SET_MESSAGE", message);
  },
  setColor({ commit }, color) {
    commit("SET_COLOR", color);
  },
  setAlert({ commit }, data) {
    commit("SET_MESSAGE", data.message);
    commit("SET_COLOR", data.color);
    commit("SET_ERRORS", data.errors);
  },
  resetState({ commit }) {
    commit("RESET_ALERT");
  }
};
const mutations = {
  SET_MESSAGE(state, message) {
    state.message = message;
  },
  SET_COLOR(state, color) {
    state.color = color;
  },
  SET_ERRORS(state, errors) {
    state.errors = errors;
  },
  // eslint-disable-next-line no-unused-vars
  RESET_ALERT(state) {
    state = Object.assign(state, initAlert());
  }
};

export default {
  namespaced: true,
  state: initAlert(),
  getters,
  actions,
  mutations
};
