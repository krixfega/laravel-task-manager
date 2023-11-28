import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    tasks: [], // Initialize with empty array or initial data
   
  },
  mutations: {
    // Define mutations to modify state
    SET_TASKS(state, tasks) {
      state.tasks = tasks;
    },
    
  },
  actions: {
    // Define actions to commit mutations
    setTasks({ commit }, tasks) {
      commit('SET_TASKS', tasks);
    },
    
  },
  getters: {
    // Define getters to access state
    getTasks: (state) => state.tasks,
    
  },
});
