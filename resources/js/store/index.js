import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

import book from './book'
import category from './category'

const store = new Vuex.Store({
    modules:{
        book,
        category
    },
    state: {
    },
    getters: {

    },
    mutations: {

    },
    actions: {

    },
})
export default store;
