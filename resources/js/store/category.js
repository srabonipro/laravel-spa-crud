import axios from 'axios'

export default({
    namespaced: true,

    state: {
        categories:[],
    },
    getters: {
        getCategories(state){
            return state.categories;
        }
    },
    mutations: {
        SET_CATEGORIES(state,data){
            state.categories = data
        },
    },
    actions: {
        loadCategories({commit}){
            axios.get('/api/categories')
            .then(response => {
                commit('SET_CATEGORIES',response.data)
            });
        },
    },
});
