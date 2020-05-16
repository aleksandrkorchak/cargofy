<template>
    <div class="btn-group mr-3">
        <button type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ localization['nav_brand'] }}
        </button>
        <div class="dropdown-menu">
            <a
                class="dropdown-item"
                href="#"
                @click="showModal"
            >Добавить груз</a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MainMenu",
        computed: {
            localization(){
                return this.$store.state.settings.localization
            }
        },
        methods: {
            showModal(){
                this.$store.commit('setModal', true)
                console.log(this.$store.state.settings)
            }
        }
    }
</script>

<style scoped>

</style>
