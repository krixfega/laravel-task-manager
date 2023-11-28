import Vue from 'vue';
import store from './store';
import VueRouter from 'vue-router';
import TaskList from './components/TaskList.vue';
import CreateTask from './components/CreateTask.vue';

Vue.use(VueRouter);

const routes = [
  {
    path: '/tasks',
    component: TaskList,
  },
  {
    path: '/tasks/create',
    component: CreateTask,
  },
];

const router = new VueRouter({
  mode: 'history', 
  routes,
});

new Vue({
  el: '#taskApp',
  router,
  store,
  components: {
    TaskList,
  },
  template: '<router-view></router-view>', 
});
