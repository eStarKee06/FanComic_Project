import axios from 'axios'
  const state = {
    editProcessState: 0,
    workSelected: null,
    chapterSelected: null,
  };
  
  const getters = {
    getEditProcessState: (state) => {
      return state.editProcessState;
    },
    getWorkSelected: (state) => {
      return state.workSelected;
    },
    getChapterSelected: (state) => {
      return state.chapterSelected;
    }
  };
  
  const mutations = {
    setEditProcessState: (state, newState) => {
      state.editProcessState = newState;
    },
    setWorkSelected: (state, newWorkSelected) => {
      state.workSelected = newWorkSelected
    },
    setChapterSelected: (state, newChapterSelected) => {
      state.chapterSelected = newChapterSelected
    },
  };
  
  const actions = {
    setEditProcessState: ({commit}, newState) => {
      commit("setEditProcessState", newState);
    },
    setWorkSelected: ({commit}, newWorkSelected) => {
      commit("setWorkSelected", newWorkSelected);
    },
    setChapterSelected:({commit}, newChapterSelected) => {
      commit("setChapterSelected", newChapterSelected);
    }
  };
  
  export default {
    state,
    getters,
    mutations,
    actions
  };