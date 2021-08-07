import axios from 'axios'

export default({
    namespaced: true,

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
        },
        DELETE_BOOK(state,bookId){
            const index = state.books.findIndex(c => c.id === bookId)
            state.books.splice(index, 1)
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
});
