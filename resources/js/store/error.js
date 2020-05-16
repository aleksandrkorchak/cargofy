export default {

    state: {
        list: [],
        timer: null,
    },

    mutations: {
        clearErrors(state) {
            state.list = []
        },

        timerError(state, payload) {
            state.timer = payload
        },

        saveErrors(state, errors) {
            if (errors instanceof Array){
                errors.forEach(error => {
                    state.list.push(error)
                })
            }

            else if (typeof errors === 'object' && errors !== null) {
                for (let key in errors) {
                    errors[key].forEach(error => {
                        state.list.push(error)
                    })
                }
            }

        },
    },

    actions: {
        showErrors({state, commit}, errors) {
            commit('saveErrors', errors)

            if (state.timer) {
                clearTimeout(state.timer)
            }

            let timer = setTimeout(() => {
                commit('clearErrors')
            }, 10000)
            commit('timerError', timer)
        },
    }

}
