const state = {
    username: null,
    password: null,
    email: null
  };
  
  const getters = {
  };
  
  const mutations = {
    setUsername(state, newUsername){
      console.log(newUsername);
        state.username = newUsername;
    },
    setPassword(state, newPassword){
      console.log(newPassword);
        state.password = newPassword;
    },
    //with sign up:
    setEmail(state, newEmail){
        state.email = newEmail;
    }
  };
  
  const actions = {
    setUsername({commit}, newUsername){
        commit('setUsername', newUsername);
    },
    setPassword({commit}, newPassword){
        commit('setPassword', newPassword);
    },
    setEmail({commit}, newEmail){
        commit('setEmail', newEmail);
    }
  };
  
  export default {
    state,
    getters,
    mutations,
    actions
  };