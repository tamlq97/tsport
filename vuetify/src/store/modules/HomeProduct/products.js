import { apiURL } from "@/utils";

function initState() {
  return {
    products: [],
    relatedProducts: [],
    fetching: false,
    product: {},
    sizesAll: [],
  };
}

const getters = {
  products: state => state.products,
  product: state => state.product,
  relatedProducts: state => state.relatedProducts,
  sizesAll: state => state.sizesAll,
};

const actions = {
  fetchData({ commit, state }, query = null) {
    commit("SET_FETCHING", true);
    return new Promise((resolve, reject) => {
      return apiURL
        .get(
          "getAllProducts",
          // { params: state.query },
          query != null ? { params: query } : { params: state.query }
        )
        .then(res => {
          const data = res.data;
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
  filterProductsBySize({ commit }, query) {
    return new Promise((resolve, reject) => {
      return apiURL
        .get(
          "filterProductsBySize",
          { params: query }
        )
        .then(({ data }) => {
          console.log(data);
          commit("SET_ALL", data);
          resolve(data);
        })
        .catch(({ response }) => {
          reject(response);
        })
    });
  },
  filterProductsByKeyWord({commit},data){
    return new Promise((resolve, reject) => {
      return apiURL
        .get(
          "filterProductsByKeyWord",
          { params: data }
        )
        .then(({ data }) => {
          console.log(data);
          commit("SET_ALL", data);
          resolve(data);
        })
        .catch(({ response }) => {
          reject(response);
        })
    });
  },
  fetchSizesAll({ commit }) {
    apiURL.get('sizes')
      .then(({ data }) => {
        commit("SET_SIZE_ALL", data)
      })
      .catch(({ response }) => {
        console.log(response);
      })
  },
  fetch({ commit }, id) {
    return new Promise((resolve, reject) => {
      apiURL.get(`getProduct/${id}`)
        .then(({ data: { data } }) => {
          commit("SET_PRODUCT", data)
          resolve(data)
        })
        .catch(({ response }) => reject(response))
    })
  },
  fetchProdsByKey(context,query){
    return new Promise((resolve,reject)=>{
      apiURL.get(`fetchProdsByKey`,{params:query})
      .then(({data})=> {
        resolve(data);
      })
      .catch(({response})=>reject(response.data))
    })
  },
  fetchRelatedProducts({ commit }, id) {
    apiURL.get(`getRelatedProducts/${id}`)
      .then(({ data: { data } }) => {
        commit("SET_RELATED_PRODUCTS", data)
      })
      .catch(({ response }) => console.log(response))
  }
};

const mutations = {
  SET_ALL(state, data) {
    state.products = data;
  },
  SET_SIZE_ALL(state, sizesAll) {
    state.sizesAll = sizesAll
  },
  SET_FETCHING(state, stus) {
    state.fetching = stus
  },
  SET_PRODUCT(state, product) {
    state.product = product
  },
  SET_RELATED_PRODUCTS(state, relProds) {
    state.relatedProducts = relProds
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
