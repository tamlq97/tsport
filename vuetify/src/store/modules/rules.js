import { apiURL } from "@/utils";
function init() {
  return {
    rules: null
  };
}

const getters = {
  rules: state => state.rules
};

// import axios from 
const actions = {
  fetchData({ commit }) {
    return new Promise((resolve, reject) => {
      return apiURL
        .get("rules")
        .then(res => {
          commit("SET_ALL", res.data);
          resolve(res.data);
        })
        .catch(err => reject(err.response));
    });
  },
  resetState({ commit }) {
    commit("INIT_STATE");
  }
};

const mutations = {
  SET_ALL(state, data) {
    state.rules = data;
  },
  // eslint-disable-next-line no-unused-vars
  INIT_STATE(state) {
    state = Object.assign(state, init());
  }
};

export default {
  namespaced: true,
  state: init(),
  getters,
  actions,
  mutations
};
