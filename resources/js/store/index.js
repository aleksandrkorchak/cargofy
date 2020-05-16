import Vue from 'vue'
import Vuex from 'vuex'
import settings from "./settings"
import error from "./error"
import message from "./message"

Vue.use(Vuex)

const store = new Vuex.Store({
    strict: process.env.NODE_ENV !== 'production',

    modules: {
        settings,
        error,
        message
    },
    state: {
        loads: []
    },
    getters: {},
    mutations: {
        loads(state, payload){
            state.loads = payload
        }
    },
    actions: {}

})

export default store
