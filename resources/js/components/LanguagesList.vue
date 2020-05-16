<template>
    <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"
           href="#"
           id="lang"
           role="button"
           data-toggle="dropdown"
           aria-haspopup="true"
           aria-expanded="false"
        >{{ localization['nav_language'] }}</a>
        <div class="dropdown-menu" aria-labelledby="lang">
            <a
                class="dropdown-item"
                :href="languages['en']['path']"
            >{{ languages['en']['name'] }}</a>
            <a
                class="dropdown-item"
                :href="languages['ua']['path']"
            >{{ languages['ua']['name'] }}</a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LanguagesList",
        data() {
            return {
                // languages: this.$store.state.settings.languages,
                localization: this.$store.state.settings.localization
            }
        },
        computed: {
            languages(){
                return this.$store.state.settings.languages
            }
        },
        created() {
        }
    }
</script>

<style scoped>

</style>
