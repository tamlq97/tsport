import { apiURL } from "@/utils";
import { convertObjectToFormData } from "../../../../utils";

function initState() {
  return {
    picture:{},
    fetching: false,
  };
}

const getters = {
  picture: state => state.picture,
};

const actions = {
  fetch({commit},data){
    apiURL.get(`products/${data.product_id}/colors/${data.color_id}`)
    .then(({data:{data}})=>{
        commit('SET_PICTURE',data)
    })
    .catch(({response})=>console.log(response))
  },
  addImageForColorProduct({dispatch},product){
    let formData = new FormData()
    convertObjectToFormData(product,formData)
    return new Promise((resolve,reject)=>{
      apiURL.post(`products/${product.id}/colors/${product.color_name.id}`,formData)
      .then(({data})=> {
        dispatch("ProductSingle/fetch",product,{root:true})
        resolve(data)
      })
      .catch(({response})=>reject(response))
    });
  },
  deleteSelectedItem(context,data){
    return new Promise((resolve,reject)=>{
      apiURL.post('colorpicture/deleteSelectedItem',data)
      .then(({data})=>{
        resolve(data)
      })
      .catch(({response})=>reject(response))
    })
  },
  resetState({ commit }) {
    commit("INIT_STATE");
  }
};

const mutations = {
  SET_PICTURE(state,pic){
      state.picture = pic
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
