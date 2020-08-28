import { apiURL } from "@/utils";
function initState() {
    return {
        supplier: {},
        loading: false
    };
}

const getters = {
    supplier: state => state.supplier
};

const actions = {
    store({ dispatch }, data) {
        return new Promise((resolve, reject) => {
            apiURL.post('suppliers', data)
                .then(({ data }) => {
                    resolve(data)
                    dispatch("ProductSingle/fetchSuppliersAll", null, { root: true });
                })
                .catch(({ response }) => reject(response))
        })
    }
};

const mutations = {
    SET_SUPPLIER(state, supplier) {
        state.supplier = supplier
    }
};

export default {
    namespaced: true,
    state: initState(),
    getters,
    actions,
    mutations
};
