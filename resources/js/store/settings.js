export default {
    state: {
        localization: [],
        languages: [],
        locale: 'en',
        modal: false,
    },
    getters: {

    },
    mutations: {

        setLocalization(state, payload){
            state.localization = payload
        },
        setLanguages(state, payload){
            state.languages = payload
        },
        setLocale(state, payload){
            state.locale = payload
        },
        setModal(state, payload){
            state.modal = payload
        },


    },
    actions: {

    }
}
