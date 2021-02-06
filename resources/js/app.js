/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');




//Import View Router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import vuetify from './vuetify';
import routes from './routes';




import App from './App.vue';
const app = new Vue({
    vuetify,
    router: routes,
    render: h => h(App),
    el: '#app',

});
export default app;