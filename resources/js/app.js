/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css'

import App from './App.vue';
import router from './routes';

// register vuetify
Vue.use(Vuetify);
const vuetify = new Vuetify();

const root = new Vue({
    el: '#root',
    router,
    vuetify,
    render: h => h(App)
});