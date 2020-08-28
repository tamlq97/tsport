import { apiURL } from "@/utils";

function initState() {
  return {
    roles: {
      meta: {
        last_page: 1,
        current_page: 1,
        total: 0
      }
    },
    query: {
      length: 10,
      dir: "desc",
      column: 0,
      search: "",
      page: 1
    },
    fetching: false
  };
}

const getters = {
  roles: state => state.roles,
  query: state => state.query,
  fetching: state => state.fetching
};

const actions = {
  fetchData({ commit, state }, query = null) {
    commit("SET_FETCHING", true);
    return new Promise((resolve, reject) => {
      return apiURL
        .get(
          "roles",
          query != null ? { params: query } : { params: state.query }
        )
        .then(res => {
          const { data, meta, links } = res.data;
          commit("SET_ALL", { meta, links, data });
          resolve(res.data);
        })
        .catch(err => {
          reject(err.response);
        })
        .finally(() => {
          commit("SET_FETCHING", false);
        });
    });
  },

  setQuery({ commit }, query) {
    commit("SET_QUERY", query);
  },
  resetState({ commit }) {
    commit("INIT_STATE");
  }
};

const mutations = {
  SET_FETCHING(state, stus) {
    state.fetching = stus;
  },
  SET_ALL(state, data) {
    state.roles = data;
  },
  SET_QUERY(state, query) {
    state.query = query;
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
