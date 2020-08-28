import { apiURL } from "@/utils";

function initState() {
    return {
        orders: {
            meta: {
                last_page: 1,
                current_page: 1,
                total: 0
            }
        },
        fetching: false,
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
    orders: state => state.orders,
    fetching: state => state.fetching,
    query: state => state.query
};

const actions = {
    fetchData({ commit }, query = null) {
        commit("SET_FETCHING", true);
        return new Promise((resolve, reject) => {
            return apiURL
                .get(
                    "orders",
                    { params: query }
                )
                .then(({ data }) => {
                    commit("SET_ALL", data);
                    resolve(data);
                })
                .catch(err => {
                    commit("SET_ALERT", err.response);
                    reject(err.response);
                })
                .finally(() => {
                    commit("SET_FETCHING", false);
                });
        });
    },
    confirmOrder(context, data) {
        return new Promise((resolve, reject) => {
            return apiURL
                .post(
                    `confirmOrder/${data.madh}`,
                )
                .then(({ data }) => {
                    resolve(data);
                })
                .catch(err => {
                    reject(err.response);
                })
        });
    },
    fetchOrdersByUserID(context, uid) {
        return new Promise((resolve, reject) => {
            apiURL.get(`fetchOrders/${uid}`)
                .then(({ data }) => resolve(data))
                .catch(({ response }) => reject(response))

        })
    },
    outOfStock(context, data) {
        return new Promise((resolve, reject) => {
            return apiURL
                .post(
                    `outOfStock/${data.madh}`,
                )
                .then(({ data }) => {
                    resolve(data);
                })
                .catch(err => {
                    reject(err.response);
                })
        });
    },
    delete({ dispatch }, data) {
        return new Promise((resolve, reject) => {
            return apiURL
                .delete(
                    `delete/${data.madh}`,
                )
                .then(({ data }) => {
                    dispatch("OrderIndex/fetchData", null, { root: true })
                    resolve(data);
                })
                .catch(err => {
                    reject(err.response);
                })
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
        state.orders = data;
    },
    SET_FETCHING(state, data) {
        state.fetching = data;
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
