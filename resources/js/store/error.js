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
            console.log('Blade: ', errors)
            // errors.forEach(error => {
            //     state.list.push(error)
            // })
            if (errors instanceof Array){
                errors.forEach(error => {
                    state.list.push(error)
                })
            }

            else if (typeof errors === 'object' && errors !== null) {
                for (let key in errors) {
                    // console.log('Error.js saveError for: ', errors[key])
                    // state.list.push(errors[key])

                    errors[key].forEach(error => {
                        state.list.push(error)
                    })
                }
            }
            else{
                console.log('Cannot to saveErrors because the variable is not an object')
            }

            // console.log('Error.js saveError state.list: ', state.list)
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
