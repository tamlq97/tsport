import { apiURL } from "@/utils";
function initState() {
    return {
        notifications: [],
        loading: false,
        unreadNotifications: [],
    };
}

const getters = {
    notifications: state => state.notifications,
    unreadNotifications: state => state.unreadNotifications,
};

const actions = {
    fetchNotifications({ commit }) {
        commit("SET_LOADING", true);
        return new Promise((resolve, reject) => {
            return apiURL
                .get("/notifications")
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
    unread({ commit },notify){
        return new Promise((resolve, reject) => {
            return apiURL
                .get(`/unread/${notify.id}/${notify.notifiable_id}`)
                .then(({ data }) => {
                    commit("SET_ALL", data);
                    resolve(data);
                })
                .catch(err => {
                    reject(err.response);
                })
        })
    },
    delete(context,data){
        console.log(data);
        return new Promise((resolve, reject) => {
            return apiURL
                .delete(`/deleteNotify/${data.user_id}/${data.notify.id}`)
                .then(({ data }) => {
                    resolve(data);
                })
                .catch(err => {
                    reject(err.response);
                })
        })
    }
};

const mutations = {
    SET_ALL(state, data) {
        state.notifications = data.notifications
        state.unreadNotifications = data.unreadNotifications
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
