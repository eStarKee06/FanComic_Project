import Vue from 'vue';
import Vuex from 'vuex';

import SignInUp from "./stores/modules/SignInUp.js"


Vue.use(Vuex);
import * as actions from './stores/actions';
import * as mutations from './stores/mutations';
import * as getters from './stores/getters';
export const store = new Vuex.Store({
  state: {},
  getters,
  mutations,
  actions,
  modules: {
    SignInUp
  }
});
