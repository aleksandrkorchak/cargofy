<template>
    <div class="btn-group mr-3">
        <button type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            {{ localization['nav_main_menu_title'] }}
        </button>
        <div class="dropdown-menu">
            <a
                class="dropdown-item"
                href="#"
                @click="addLoad"
            >{{ localization['nav_main_menu_add_load'] }}</a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Menu",

        data() {
            return {
                localization: this.$store.state.settings.localization,
            }
        },

        methods: {
            addLoad() {
                this.$modal.show('addLoad');
            }
        }

    }
</script>

<style scoped>

</style>
