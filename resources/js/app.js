/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import store from './store'


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


import LoadsList from "./components/LoadsList";
import Search from "./components/Search";
import LanguagesList from "./components/LanguagesList";
import Errors from "./components/Errors";
import Messages from "./components/Messages";
import MainMenu from "./components/MainMenu";

const app = new Vue({
    el: '#app',
    store,
    components: {
        'mainMenu': MainMenu,
        'loadsList': LoadsList,
        'search': Search,
        'languagesList': LanguagesList,
        'errors': Errors,
        'messages': Messages
    },
    created(){
        this.$store.commit('setLocalization', window.app.localization)
        this.$store.commit('setLanguages', window.app.languages)
        this.$store.commit('setLocale', window.app.locale)
        this.$store.dispatch('showErrors', window.app.errors)

        if (window.app.messages){
            this.$store.dispatch('showMessages', window.app.messages)
        }

    }
});
