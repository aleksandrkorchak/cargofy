export default {
    state: {
        list: [],
        timer: null
    },

    mutations: {
        clearMessages(state) {
            state.list = [];
        },

        saveMessage(state, message) {
            state.list.push(message)
        },

        timerMessage(state, payload){
            state.timer = payload
        },
    },

    actions: {
        showMessages({state, commit}, message) {
            commit('saveMessage', message)

            if (state.timer) {
                clearTimeout(state.timer)
            }

            let timer = setTimeout(() => {
                commit('clearMessages')
            }, 10000)
            commit('timerMessage', timer)

        },
    }
}
