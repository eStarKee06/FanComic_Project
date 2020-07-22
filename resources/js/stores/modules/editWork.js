import axios from 'axios'
  const state = {
    workToShow: null,
  }
  const getters = {
    getWorkToShow: (state) => {
        return state.workToShow;
    },
  }
  const mutations = {
    setWorkToShow: (state, work) => {
        state.workToShow = work;
    },
  }
  const actions = {
    setWorkToShow: ({commit}, work) => {
      commit("setWorkToShow", work);
    },
  }

  export default {
    state,
    getters,
    mutations,
    actions
  };