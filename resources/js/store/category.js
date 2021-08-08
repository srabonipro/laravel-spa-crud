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
        DELETE_CATEGORY(state,categoryId){
            const index = state.categories.findIndex(c => c.id === categoryId)
            state.categories.splice(index, 1)
        }
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
