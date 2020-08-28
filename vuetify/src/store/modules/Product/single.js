import { apiURL } from "@/utils";
// eslint-disable-next-line no-unused-vars
import axios from "axios";
import {
  // eslint-disable-next-line no-unused-vars
  convertObjectToFormData,
  // eslint-disable-next-line no-unused-vars
  convertArrayToFormData
} from "../../../utils";
function initState() {
  return {
    product: {
      id: "",
      product_name: "",
      product_price: "",
      product_description: "",
      size: [],
      color: [],
      image: [],
      supplier: ""
    },
    sizesAll: [],
    colorsAll: [],
    loading: false,
    suppliersAll: [],
  };
}

// eslint-disable-next-line no-unused-vars
function getIndex(array) {
  let item = [];
  if (item) {
    array.forEach(v => item.push(v.id));
  }
  return item;
}
const getters = {
  product: state => state.product,
  loading: state => state.loading,
  rolesAll: state => state.rolesAll,
  sizesAll: state => state.sizesAll,
  colorsAll: state => state.colorsAll,
  suppliersAll: state => state.suppliersAll,
};

const actions = {
  // eslint-disable-next-line no-unused-vars
  fetch({ commit, dispatch }, product) {
    dispatch("Alert/resetState", null, { root: true });
    return new Promise((resolve, reject) => {
      apiURL
        .get(`products/${product.id}`)
        .then(({ data }) => {
          commit("SET_PRODUCT", data.data)
          resolve(data)
        })
        .catch(err => reject(err.response));
    })
  },
  updateProdStatus(context, data) {
    return new Promise((resolve, reject) => {
      apiURL.put('products/updateProdStatus/' + data.id, data)
        .then(({ data }) => resolve(data))
        .catch((response) => reject(response))
    })
  },

  updateQuantity({ dispatch }, product) {
    return new Promise((resolve, reject) => {
      apiURL.put(`products/saveQuantity/${product.id}`, product)
        .then(({ data: { message } }) => {
          resolve(message)
          dispatch("ProductIndex/fetchData", null, { root: true })
        })
        .catch(({ response }) => reject(response))
    })
  },
  // eslint-disable-next-line no-unused-vars
  store({ commit, dispatch }, product) {
    commit("SET_FETCHING", true);
    dispatch("Alert/resetState", null, { root: true });

    // let formData = new FormData();
    // convertObjectToFormData(product, formData);
    return new Promise((resolve, reject) => {
      apiURL
        .post("products", product)
        .then(({ data }) => {
          dispatch("ProductIndex/fetchData", null, { root: true });
          resolve(data);
        })
        .catch(error => {
          reject(error.response);
        })
        .finally(() => commit("SET_FETCHING", false));
    });
  },
  fetchSuppliersAll({ commit }) {
    apiURL.get('suppliers', { params: { showData: true } }).then(({ data }) => commit("SET_SUPPLIERS_ALL", data))
      .catch(({ response }) => console.log(response))
  },
  update({ commit, dispatch }, product) {
    commit("SET_FETCHING", true);
    return new Promise((resolve, reject) => {
      apiURL
        .put(`products/${product.id}`, product)
        .then(res => {
          commit("SET_PRODUCT", res.data.data)
          dispatch("ProductIndex/fetchData", null, { root: true });
          resolve(res);
        })
        .catch(err => {
          reject(err.response);
        })
        .finally(() => commit("SET_FETCHING", false));
    });
  },
  delete({ commit, dispatch }, product) {
    commit("SET_FETCHING", true);
    return new Promise((resolve, reject) => {
      apiURL
        .delete(`products/${product.id}`, product)
        .then(({ data }) => {
          dispatch("ProductIndex/fetchData", null, { root: true });
          resolve(data);
        })
        .catch(err => {
          let { errors, message } = err.reponse.data;
          dispatch("Alert/setAlert", { errors, message, color: "danger" });
          reject(err);
        })
        .finally(() => commit("SET_FETCHING", false));
    });
  },
  logout({ commit }) {
    return new Promise((resolve, reject) => {
      return apiURL
        .get("logout")
        .then(res => {
          commit("INIT_STATE");
          sessionStorage.removeItem("authToken");
          sessionStorage.removeItem("user");
          sessionStorage.removeItem("userLoggedIn");
          resolve(res.data);
        })
        .catch(err => reject(err.response));
    });
  },
  fetchSizesAll({ commit }) {
    apiURL.get("sizes").then(res => {
      commit("SET_SIZES_ALL", res.data);
    });
  },
  fetchColorsAll({ commit }) {
    apiURL.get("colors").then(res => {
      commit("SET_COLORS_ALL", res.data);
    });
  },
  resetState({ commit }) {
    commit("INIT_STATE");
  },
  setProduct(
    { commit },
    product = {
      id: "",
      product_name: "",
      product_price: "",
      product_description: "",
      size: [],
      color: [],
      image: [],
      supplier: ""
    }
  ) {
    commit("SET_PRODUCT", product);
  },
  updateProdName({ commit }, name) {
    commit("UPDATE_PROD_NAME", name);
  },
  updateProdPrice({ commit }, name) {
    commit("UPDATE_PROD_PRICE", name);
  },
  updateProdDescription({ commit }, name) {
    commit("UPDATE_PROD_DESCRIPTION", name);
  },
  updateProdSize({ commit }, name) {
    commit("UPDATE_PROD_SIZE", name);
  },
  updateProdColor({ commit }, name) {
    commit("UPDATE_PROD_COLOR", name);
  },
  updateProdImage({ commit }, name) {
    commit("UPDATE_PROD_IMAGE", name);
  }
};

const mutations = {
  SET_PRODUCT(state, product) {
    state.product = product;
  },
  SET_COLORS_ALL(state, colors) {
    state.colorsAll = colors;
  },
  SET_SIZES_ALL(state, sizes) {
    state.sizesAll = sizes;
  },
  SET_FETCHING(state, value) {
    state.loading = value;
  },
  UPDATE_PROD_NAME(state, product_name) {
    state.product.product_name = product_name;
  },
  UPDATE_PROD_PRICE(state, product_price) {
    state.product.product_price = product_price;
  },
  UPDATE_PROD_DESCRIPTION(state, product_description) {
    state.product.product_description = product_description;
  },
  UPDATE_PROD_SIZE(state, product_size) {
    state.product.size = product_size;
  },
  UPDATE_PROD_COLOR(state, product_color) {
    state.product.color = product_color;
  },
  SET_SUPPLIERS_ALL(state, suppliersAll) {
    state.suppliersAll = suppliersAll
  },
  UPDATE_PROD_IMAGE(state, product_image) {
    state.product.image = product_image;
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
