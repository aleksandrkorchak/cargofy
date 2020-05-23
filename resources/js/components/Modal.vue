<template>
    <modal-window
        name="addLoad"
        height="auto"
        :scrollable="true"
        draggable=".window-header"
        :width="500"
        @closed="modalClosed"
    >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="window-header d-flex justify-content-center mt-3">
                        <h4 class="">{{ localization['modal_title'] }}</h4>
                    </div>

                    <hr>

                    <div v-if="errors.length" class="alert alert-danger">
                        <ul class="list-group">
                            <li
                                v-for="error in errors"
                            >
                                {{ error }}
                            </li>
                        </ul>
                    </div>


                    <form
                        ref="form"
                        id="form"
                        enctype="multipart/form-data"
                        method="post"
                        action="/loads"
                    >
                        <input type="hidden" name="_token" :value="csrf">

                        <div class="form-group">
                            <label for="cityFrom">{{ localization['modal_from_city_title'] }}</label>
                            <select
                                class="form-control"
                                name="cityFrom"
                                id="cityFrom"
                            >
                                <option selected disabled>{{ localization['modal_city_placeholder_choose'] }}</option>
                                <option
                                    v-for="city in cities"
                                    :key="city['id']"
                                    :value="city['id']"
                                    :selected="city['id'] == old.cityFrom"
                                >{{ city['name'] }}
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="cityTo">{{ localization['modal_to_city_title'] }}</label>
                            <select class="form-control" name="cityTo" id="cityTo">
                                <option selected disabled>{{ localization['modal_city_placeholder_choose'] }}</option>
                                <option
                                    v-for="city in cities"
                                    :key="city['id']"
                                    :value="city['id']"
                                    :selected="city['id'] == old.cityTo"
                                >{{ city['name'] }}
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="uaName">{{ localization['modal_name_ukrainian'] }}</label>
                            <input
                                type="text"
                                class="form-control"
                                id="uaName"
                                name="uaName"
                                :value="old.uaName"
                            >
                        </div>


                        <div class="form-group">
                            <label for="enName">{{ localization['modal_name_english'] }}</label>
                            <input
                                type="text"
                                class="form-control"
                                id="enName"
                                name="enName"
                                :value="old.enName"
                            >
                        </div>


                        <div class="form-group">
                            <label for="volume">{{ localization['modal_volume'] }}</label>
                            <input
                                type="text"
                                class="form-control"
                                id="volume"
                                name="volume"
                                :value="old.volume"
                            >
                        </div>


                        <label class="mb-0">{{ localization['modal_photo_label'] }}</label>
                        <div class="custom-file mt-1">

                            <input
                                type="file"
                                class="custom-file-input"
                                id="photo"
                                name="photo"
                                @change="changeFileInput"
                            >
                            <label
                                class="custom-file-label"
                                for="photo"
                                :data-browse="localization['modal_photo_input_browse_title']"
                            >{{ localization['modal_photo_input_placeholder'] }}</label>
                        </div>

                        <hr>

                        <div class="my-3 d-flex justify-content-center">
                            <input
                                class="btn btn-primary mr-1"
                                type="button"
                                :value="localization['modal_button_close']"
                                @click="clickButtonClose"
                            >
                            <input
                                class="btn btn-primary ml-1"
                                type="submit"
                                :value="localization['modal_button_add']"
                            >
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </modal-window>
</template>

<script>
    export default {
        name: "Modal",

        props: [
            'cities',
            'old'
        ],

        data() {
            return {
                localization: this.$store.state.settings.localization,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },

        methods: {
            changeFileInput(event) {
                let fileInput = event.target
                let fileName = fileInput.value.split('\\').pop()
                let fileLabel = fileInput.nextElementSibling
                fileLabel.classList.add("selected")
                fileLabel.innerHTML = fileName.toString()
            },

            clickAddButton() {
                localStorage.modal = true
                this.$refs.form.submit()
            },

            clickButtonClose() {
                this.$modal.hide('addLoad')
            },

            modalClosed() {
                if (localStorage.modal) {
                    localStorage.modal = false
                    this.$store.commit('clearErrors')
                }
            }

        },

        computed: {
            errors() {
                if (localStorage.modal) {
                    return this.$store.state.error.list
                } else {
                    return []
                }
            }
        },

        created() {
            console.log(this.old)
        }

    }
</script>

<style scoped>
    .window-header {
        cursor: pointer;
    }

    ul > li {
        list-style-type: none;
    }
</style>


