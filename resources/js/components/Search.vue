<template>
    <form
        ref="form"
        class="form-inline my-2 my-lg-0"
        @submit.prevent=""
    >
        <input class="form-control mr-sm-2"
               type="search"
               :value="city"
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

        props: [
            'cities',
            'locale',
        ],

        data() {
            return {
                localization: this.$store.state.settings.localization,
                city: '',
                route: '',
            }
        },

        methods: {

            /*
             * Search button clicked
             */
            submitForm() {

                let slug = this.getSlugForCityName(this.city)

                if (slug || slug === ''){
                    let path = this.getPath(slug)

                    console.log('Form action:', path)

                    localStorage.oldSearch = this.city
                    this.$refs.form.setAttribute('action', path)
                    this.$refs.form.submit()
                }
                else {
                    this.$store.commit('loads', [])
                }

            },


            /*
             * Get slug for city name
             */
            getSlugForCityName(cityName) {
                if (cityName === '')
                {
                    return ''
                }

                let slug = false
                if(cityName){
                    this.cities.forEach((item) => {
                        if (item['names'].includes(cityName.toLowerCase())){
                            slug = item['slug']
                        }
                    })
                }

                return slug
            },


            /*
             * Get path for submit
             */
            getPath(slug){
                let route = ''

                if (slug) {
                    if (this.locale === 'en') {
                        route = '/from/' + slug
                    } else {
                        route = '/' + this.locale + '/from/' + slug
                    }
                }
                else {
                    if (this.locale === 'en') {
                        route = '/'
                    } else {
                        route = '/' + this.locale
                    }
                }

                return route
            },



            /*
             *  Change browser address
             */
            // changeBrowserAddress(slug) {
            //     if (slug) {
            //         if (this.locale === 'en') {
            //             this.route = '/from/' + slug
            //         } else {
            //             this.route = '/' + this.locale + '/from/' + slug
            //         }
            //     }
            //     else {
            //         if (this.locale === 'en') {
            //             this.route = '/'
            //         } else {
            //             this.route = '/' + this.locale
            //         }
            //     }
            //     //Change browser address bar
            //     window.history.pushState({}, null, this.route)
            // }


        },

        mounted() {
            this.city = localStorage.oldSearch ? localStorage.oldSearch : ''
        },

        created() {

        }

    }
</script>

<style scoped>

</style>
