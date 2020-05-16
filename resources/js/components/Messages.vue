<template>
    <div v-if="messages.length" class="container">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div v-for="message in messages">{{ message }}</div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Messages",

        computed: {
            messages() {
                return  this.$store.state.message.list;
            }
        }
    }
</script>

<style scoped>

</style>
