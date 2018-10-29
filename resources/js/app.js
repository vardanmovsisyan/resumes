require('./bootstrap');

window.Vue = require('vue');
//import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter);

import Login from './components/Login';
import Register from './components/Register';
import MyHeader from './components/HeaderComponent';
import Home from './components/Home';
import VerifyUsers from './components/admin/VerifyUsers';
import CreateCategory from './components/admin/categories/CreateCategory';
import EditCategory from './components/admin/categories/EditCategory';
import ViewCategories from './components/admin/categories/ViewCategories';
import CreateMovie from './components/admin/movies/CreateMovie';
import EditMovie from './components/admin/movies/EditMovie';
import ViewMovies from './components/admin/movies/ViewMovies';
import bAlert from 'bootstrap-vue/es/components/alert/alert';
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue);

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
    components:{
        MyHeader,
        VerifyUsers,
        Home,
        bAlert,
        CreateCategory,
        CreateMovie,
        EditCategory,
        EditMovie,
        ViewCategories,
        ViewMovies
    }

});
