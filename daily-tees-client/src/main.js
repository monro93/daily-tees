import Vue from 'vue'
import VueRouter from 'vue-router'
import config from './config.js';
import TeeList from './components/TeeList.vue';
import Buefy from 'buefy'
import 'buefy/dist/buefy.css'


global.config = config;
Vue.config.productionTip = false;

Vue.use(VueRouter);
Vue.use(Buefy);


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