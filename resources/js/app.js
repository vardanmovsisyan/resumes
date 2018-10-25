require('./bootstrap');

window.Vue = require('vue');
//import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter);

import Login from './components/Login';
import Register from './components/Register';
import MyHeader from './components/HeaderComponent';
import Home from './components/Home';
import VerifyUsers from './components/VerifyUsers';
import bAlert from 'bootstrap-vue/es/components/alert/alert';

const axios = require('axios');

const routes = [
    { path: '/login', component: Login },
    { path: '/register', component: Register },
    //{ path: '/', redirect: '/login' }
];
const router = new VueRouter({
    mode: 'history',
    routes
});
const app = new Vue({
    el: '#app',
    router,
    components:{MyHeader,VerifyUsers,Home,bAlert}

});
