import { apiURL } from "@/utils";
function initState() {
    return {
        categories: [],
        loading: false,
        category: {},
    };
}

const getters = {
    categories: state => state.categories,
    category: state => state.category
};

const actions = {
    fetchData({ commit }, params = null) {
        commit("SET_LOADING", true);
        return new Promise((resolve, reject) => {
            return apiURL
                .get("/categories", { params: params })
                .then(({ data }) => {
                    commit("SET_ALL", data);
                    resolve(data);
                })
                .catch(err => {
                    reject(err.response);
                })
                .finally(() => commit("SET_LOADING", false));
        })
    },
    store({dispatch}, category) {
        return new Promise((resolve, reject) => {
            return apiURL
                .post("/categories", category)
                .then(({ data }) => {
                    dispatch("Category/fetchData", null, { root: true })
                    resolve(data);
                })
                .catch(err => {
                    reject(err.response);
                })
        })
    }
};

const mutations = {
    SET_ALL(state, cates) {
        state.categories = cates
    },
    SET_CATEGORY(state, cate) {
        state.category = cate
    },
    SET_LOADING(state, stat) {
        state.loading = stat
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
