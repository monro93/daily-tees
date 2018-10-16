import Vue from 'vue'
import VueRouter from 'vue-router'
import config from './config.js';

global.config = config;
Vue.config.productionTip = false;

Vue.use(VueRouter);

import TeeList from './components/TeeList.vue';

const routes = [
    { path: '/', component: TeeList },
];

const router = new VueRouter({
    mode: 'history',
    routes
});

new Vue({
    router,
    render: h => h(TeeList)
}).$mount('#app');