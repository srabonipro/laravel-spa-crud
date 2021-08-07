import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        message: "Hi, I am coming from the state that is why you can find me in every component with passing props"
      },
      getters: {
        getMessage(state){
            return state.message
          }
      },
      mutations: {
        // put sychronous functions for changing state e.g. add, edit, delete
      },
      actions: {
        // put sychronous functions for changing state e.g. add, edit, delete
      },
})
export default store;
