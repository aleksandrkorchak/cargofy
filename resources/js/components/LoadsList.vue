<template>
    <div>
        <h1>{{ localization['loads_main_header'] }}</h1>

        <div class="card my-2"
             v-for="load in loadsStore"
             :key="load.id"
        >
            <div class="card-body hand"
                 @click="clickListItem($event, load.id)"
            >
                <div class="d-flex">
                    <div class="flex-grow-1">
                        {{ load.city_from.name[locale] }} - {{ load.city_to.name[locale] }}
                    </div>
                    <div>
                        {{ load.volume + localization['ton_abbreviation']}}
                    </div>
                </div>
            </div>

            <transition name="fade">
                <div class="card-body pt-0"
                     v-show="load.id === selectedLoadId"
                >
                    <hr class="mt-0">
                    <h4>{{ load.name[locale] }}</h4>
                    <div class="d-flex flex-row justify-content-center flex-wrap flex-xl-nowrap">
                        <img
                            :src="'http://cargofy.loc/' + load.photo"
                            class="rounded img-fluid"
                            alt="..."
                        >
                        <img
                            :src="getUriGoogleStaticMap(load.city_to.lat, load.city_to.lng)"
                            class="rounded img-fluid"
                            alt="..."
                        >
                    </div>
                </div>
            </transition>

        </div>

    </div>
</template>

<script>
    export default {
        name: "LoadsList",

        props: [
            'loads',
        ],

        data() {
            return {
                locale: this.$store.state.settings.locale,
                localization: this.$store.state.settings.localization,
                selectedLoadId: null
            }
        },

        methods: {
            getUriGoogleStaticMap(latitude, longitude) {
                let url = new URL('https://maps.googleapis.com/maps/api/staticmap');
                url.searchParams.append('markers', `${latitude},${longitude}`)
                url.searchParams.append('size', '280x170')
                url.searchParams.append('key', process.env.MIX_APP_GOOGLE_KEY)

                return url.toString()
            },
            clickListItem(event, loadId) {
                if (this.selectedLoadId === loadId) {
                    this.selectedLoadId = null
                } else {
                    this.selectedLoadId = loadId
                }

            }
        },

        computed: {
            loadsStore() {
                return this.$store.state.loads
            }
        },

        created() {
            this.$store.commit('loads', this.loads)
        }
    }
</script>

<style scoped>
    img {
        margin: 5px;
        width: 280px;
        height: 170px;
    }

    .hand {
        cursor: pointer;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }

    .fade-enter, .fade-leave-to {
        opacity: 0;
    }
</style>
