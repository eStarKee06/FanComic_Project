import axios from 'axios'
  const state = {
    genreList: [],
    rating: "general",
    color: null,

  }
  const getters = {
    getGenreList: (state) => {
        return state.genreList;
    },
    getRating: (state) => {
        return state.rating;
    },
    getColor: (state) => {
        return state.color;
    },
  }
  const mutations = {
    setGenreList: (state, genre) => {
        if(!state.genreList.includes(genre)){
            state.genreList.push(genre);
        }else{
            const index = state.genreList.indexOf(genre);
            if (index > -1) {
                state.genreList.splice(index, 1);
            }
        }
    },
    setRating: (state, rating) => {
        state.rating = rating;
    },
    setColor: (state, color) => {
        state.color = color;
    },
  }
  const actions = {
    setGenreList: ({commit}, genre) => {
      commit("setGenreList", genre);
    },
    setRating: ({commit}, rating) => {
      commit("setRating", rating);
    },
    setColor: ({commit}, color) => {
      commit("setColor", color);
    },
  }

  export default {
    state,
    getters,
    mutations,
    actions
  };