import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        books:[]
    },
    getters: {
        getBooks(state){
            return state.books;
        }
    },
    mutations: {
        SET_BOOKS(state,data){
            state.books = data
        }
    },
    actions: {
        loadBooks({commit}){
            axios.get('api/books')
            .then(response => {
                commit('SET_BOOKS',response.data)
            });
        },
    },
})
export default store;
