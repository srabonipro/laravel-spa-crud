require('./bootstrap');
window.Vue = require('vue').default;

import App from './App.vue';
import VueRouter from 'vue-router';
import { routes } from './routes';
import store from './store/index'
// import { Form, HasError, AlertError } from 'vform'

// Vue.component(HasError.name, HasError)
// Vue.component(AlertError.name, AlertError)
// window.Form = Form

import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'
Vue.use(Toaster, { timeout: 5000 })


Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App),
});
