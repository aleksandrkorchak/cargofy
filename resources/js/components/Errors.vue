<template>
    <div v-if="errors.length" class="container pt-4">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div v-for="error in errors">{{ error }}</div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Errors",

        computed: {
            errors() {
                if (!localStorage.modal){
                    return  this.$store.state.error.list;
                }
                else {
                    return []
                }
            }
        }
    }
</script>

<style scoped>

</style>
