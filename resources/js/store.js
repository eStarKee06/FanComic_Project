import Vue from 'vue';
import Vuex from 'vuex';

import workDisplay from "./stores/modules/workDisplay.js"
import createWork from "./stores/modules/createWork.js"
import editWork from "./stores/modules/editWork.js"
import axios from "axios";

Vue.use(Vuex);

import * as actions from './stores/actions';
import * as mutations from './stores/mutations';
import * as getters from './stores/getters';

export const store = new Vuex.Store({
  state: {},
  getters: {},
  mutations: {},
  actions: {},
  modules: {
    workDisplay,
    createWork,
    editWork  
  }
});

