<template>


    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">

                    <div class="modal-header">
                        <slot name="header">
                            default header
                        </slot>
                    </div>

                    <div class="modal-body">
                        <slot name="body">
                            default body
                        </slot>
                    </div>

                    <div class="modal-footer">
                        <slot name="footer">
                            default footer
                            <button class="modal-default-button" @click="$emit('close')">
                                OK
                            </button>
                        </slot>
                    </div>
                </div>
            </div>
        </div>
    </transition>



<!--    <div class="modal" tabindex="-1" role="dialog">-->
<!--        <div class="modal-dialog">-->
<!--            <div class="modal-content">-->
<!--                <div class="modal-header">-->
<!--                    <h5 class="modal-title">Modal title</h5>-->
<!--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                        <span aria-hidden="true">&times;</span>-->
<!--                    </button>-->
<!--                </div>-->
<!--                <div class="modal-body">-->
<!--                    <p>Modal body text goes here.</p>-->
<!--                </div>-->
<!--                <div class="modal-footer">-->
<!--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--                    <button type="button" class="btn btn-primary">Save changes</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->


    <!--    <div v-show="this.$store.state.settings.modal"-->
    <!--        ref="modal" class="modal fade" id="modal" tabindex="-1" role="dialog"-->
    <!--         aria-labelledby="modalLabel"-->
    <!--         aria-hidden="true">-->
    <!--        <div class="modal-dialog modal-dialog-centered" role="document">-->
    <!--            <div class="modal-content">-->

    <!--                <div class="modal-header">-->
    <!--                    <h5 class="modal-title" id="modalLabel">sdgfdsgfsdgdfs</h5>-->
    <!--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
    <!--                        <span aria-hidden="true">&times;</span>-->
    <!--                    </button>-->
    <!--                </div>-->

    <!--                <div class="modal-body">-->

    <!--                    <form ref="form">-->

    <!--                        <div class="form-group">-->
    <!--                            <label for="category">Категория:</label>-->
    <!--                            <select-->
    <!--                                class="custom-select"-->
    <!--                                id="category"-->
    <!--                                name="category"-->
    <!--                                required-->
    <!--                                @change="formChanged"-->
    <!--                            >-->
    <!--                                <option-->
    <!--                                    disabled-->
    <!--                                    value="0"-->
    <!--                                    selected="1"-->
    <!--                                >Choose...-->
    <!--                                </option>-->
    <!--                                <option-->

    <!--                                    value="category.id"-->
    <!--                                    selected="fd"-->
    <!--                                >dfdfgf</option>-->
    <!--                            </select>-->
    <!--                        </div>-->


    <!--&lt;!&ndash;                        v-for="category in categories"&ndash;&gt;-->

    <!--                        <input type="hidden"-->
    <!--                               id="id"-->
    <!--                               name="id"-->
    <!--                               value="sdgfs"-->
    <!--                        >-->

    <!--                        <div class="form-group">-->
    <!--                            <label for="name" class="col-form-label">Название:</label>-->
    <!--                            <input type="text"-->
    <!--                                   class="form-control"-->
    <!--                                   id="name"-->
    <!--                                   name="name"-->
    <!--                                   value="sdfgfds"-->
    <!--                                   @input="formChanged"-->
    <!--                            >-->
    <!--                        </div>-->

    <!--                        &lt;!&ndash;                        @input="$emit('formchanged', settings)"&ndash;&gt;-->


    <!--                        <div class="form-group">-->
    <!--                            <label for="volume" class="col-form-label">Объем:</label>-->
    <!--                            <input type="text"-->
    <!--                                   class="form-control"-->
    <!--                                   id="volume"-->
    <!--                                   name="volume"-->
    <!--                                   value="sdfg"-->
    <!--                                   @input="formChanged"-->
    <!--                            >-->
    <!--                        </div>-->

    <!--                        <div class="form-group">-->
    <!--                            <label for="cost" class="col-form-label">Цена:</label>-->
    <!--                            <input type="text"-->
    <!--                                   class="form-control"-->
    <!--                                   id="cost"-->
    <!--                                   name="cost"-->
    <!--                                   value="sdfgs"-->
    <!--                                   @input="formChanged"-->
    <!--                            >-->
    <!--                        </div>-->
    <!--                    </form>-->

    <!--                    <div class="modal-footer">-->
    <!--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>-->
    <!--                        <button type="button"-->
    <!--                                id="saveButton"-->
    <!--                                class="btn btn-primary"-->
    <!--                                @click="sendForm"-->
    <!--                        >Сохранить-->
    <!--                        </button>-->
    <!--                    </div>-->

    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->


</template>

<script>
    export default {
        name: "Modal",
        props: [
            'settings',
        ],
        data() {
            return {
                sets: this.settings
            }
        },
        computed: {


            // categories() {
            //     // return this.$store.state.category.list
            // },

            // sets: {
            //     get(){
            //
            //     },
            //     set(){
            //
            //     }
            // }

        },
        methods: {
            formChanged(event) {
                switch (event.target.name) {
                    case 'name':
                        this.sets.product.name = event.target.value
                        break
                    case 'volume':
                        this.sets.product.volume = event.target.value
                        break
                    case 'cost':
                        this.sets.product.cost = event.target.value
                        break
                    case 'category':
                        this.sets.product.category_id = event.target.value
                        break
                }

                this.$emit('formchanged', this.sets)

            },

            sendForm() {
                let productForm = this.$refs.productForm
                // console.log(productForm)
                let formData = new FormData(productForm)
                // console.log('Name:', formData.get('name'))
                // console.log('Category:', formData.get('category'))
                // console.log('Volume:', formData.get('volume'))
                // console.log('Cost:', formData.get('cost'))
                // console.log('Id:', formData.get('id'))

                // console.log(productForm)
                // let formData = new FormData();
                // formData.append('name', 'qqqqq')
                // formData.append('category', '3')
                // formData.append('volume', '4')
                // formData.append('cost', '345345')


                const id = formData.get('id');

                //Add new product
                if (id == 0) {
                    axios.post('/product', formData)
                        .then((response) => {
                            // console.log(response)
                            this.$store.commit('addProduct', {...response.data.product})
                        })
                        .catch((error) => {
                            const errors = error.response.data.errors.name;
                            console.log(error.response)
                            this.$store.dispatch('showErrors', errors)
                        })
                        .then(() => {
                            const modal = this.$refs.productModal
                            $(modal).modal('hide')

                        })
                }
                //Edit existing product
                else {
                    //TODO: When axios "put" method send data with "FormData" Laravel get empty request params,
                    //TODO: so use workaround
                    formData.append('_method', 'PUT');
                    axios.post('/product/' + id, formData)
                        .then((response) => {
                            console.log(response.data.product)
                            this.$store.commit('updateProduct', {...response.data.product})
                        })
                        .catch((error) => {
                            //TODO: повторение кода
                            // console.log(error)
                            const errors = error.response.data.errors.name;
                            // console.log(error.response)
                            this.$store.dispatch('showErrors', errors)
                        })
                        .then(() => {
                            const modal = this.$refs.productModal
                            $(modal).modal('hide')
                        })
                }


            },

        }

    }
</script>

<style scoped>

</style>
