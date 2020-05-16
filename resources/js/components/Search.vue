<template>
    <form ref="form" class="form-inline my-2 my-lg-0" :action="route" @submit.prevent="">
        <input class="form-control mr-sm-2"
               type="search"
               :placeholder="localization['nav_input_placeholder']"
               @input="city = $event.target.value"
               @keyup.enter="submitForm"
               aria-label="Search">
        <input
            ref="button"
            class="btn btn-outline-success my-2 my-sm-0"
            type="button"
            @click="submitForm"
            :value="localization['nav_button_name']">
    </form>
</template>

<script>
    export default {
        name: "search",

        data() {
            return {
                localization: this.$store.state.settings.localization,
                locale: this.$store.state.settings.locale,
                city: '',
                route: '',
            }
        },
        methods: {

            /*
             * Search button clicked
             */
            submitForm() {
                if (this.city === '') {
                    this.getLoadsList('')
                } else {
                    this.getSlugForCityName(this.city)
                }
            },


            /*
             * Get slug for city name
             */
            getSlugForCityName(cityName) {
                //Disable Search Button
                this.$refs.button.setAttribute('disabled', 'true')

                axios.get('/api/slug',
                    {
                        params: {
                            city: cityName
                        }
                    })
                    .then((response) => {
                        const slug = response['data'].slug


                        //Get list of loads
                        this.getLoadsList(slug)

                    })
                    .catch(error => {
                        const errors = error.response.data.errors;
                        this.$store.dispatch('showErrors', errors)
                    })
                    .then(() => {
                        //Enable Search Button
                        this.$refs.button.removeAttribute('disabled')
                    })

            },


            /*
             *  Get list of loads
             */
            getLoadsList(slug) {
                axios.get('/api/loads', {
                    params: {
                        slug
                    }
                })
                    .then(response => {
                        this.changeBrowserAddress(slug)

                        this.$store.commit('loads', response.data)
                        this.getLanguagesList(this.route)
                    })
                    .catch(error => {
                        const errors = error.response.data.errors;
                        this.$store.dispatch('showErrors', errors)
                    })
            },


            /*
             *  Get list of languages
             */
            getLanguagesList(currentPath) {
                axios.get('/api/lang', {
                    params: {
                        path: currentPath
                    }
                })
                    .then(response => {
                        this.$store.commit('setLanguages', response.data)
                    })
                    .catch(error => {
                        const errors = error.response.data.errors;
                        this.$store.dispatch('showErrors', errors)
                    })
            },


            /*
             *  Change browser address
             */
            changeBrowserAddress(slug) {
                if (slug) {
                    if (this.locale === 'en') {
                        this.route = '/from/' + slug
                    } else {
                        this.route = '/' + this.locale + '/from/' + slug
                    }
                }
                else {
                    if (this.locale === 'en') {
                        this.route = '/'
                    } else {
                        this.route = '/' + this.locale
                    }
                }
                //Change browser address bar
                window.history.pushState({}, null, this.route)
            }


        }

    }
</script>

<style scoped>

</style>
