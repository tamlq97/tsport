import { apiURL } from "@/utils";

function initState() {
  return {
    users: {
      meta: {
        last_page: 1,
        current_page: 1,
        total: 0
      }
    },
    fetching: false,
    pagination: {
      page: 1,
      dir: "desc",
      column: 0,
      search: "",
      length: 10
    },
    sortKey: "id",
    sortGroup: {},
    query: {
      length: 10,
      page: 1,
      column: 0,
      dir: "desc",
      search: ""
    }
  };
}

const getters = {
  users: state => state.users,
  fetching: state => state.fetching,
  pagination: state => state.pagination,
  sortGroup: state => state.sortGroup,
  sortKey: state => state.sortKey,
  query: state => state.query
};

const actions = {
  fetchData({ commit, state }, query = null) {
    commit("SET_FETCHING", true);
    return new Promise((resolve, reject) => {
      return apiURL
        .get(
          "users",
          // { params: state.query },
          query != null ? { params: query } : { params: state.query }
        )
        .then(res => {
          const data = res.data;
          commit("SET_ALL", data);
          resolve(data);
        })
        .catch(err => {
          commit("SET_ALERT", err.reponse);
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
  SET_ALL(state, data) {
    state.users = data;
  },
  SET_FETCHING(state, data) {
    state.fetching = data;
  },
  SET_PAGINATION(state, pagination) {
    state.pagination = pagination;
  },
  SET_KEY(state, key) {
    state.sortKey = key;
  },
  SET_PAGE(state, page) {
    state.users.meta.current_page = page;
    // state.query.page = page;
  },
  SET_GROUP(state, sortGroup) {
    state.sortGroup = sortGroup;
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
