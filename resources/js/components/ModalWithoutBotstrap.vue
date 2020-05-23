<template>
    <modal-window name="addLoad" draggable=".window-header" transition="pop-out" :width="modalWidth" :focus-trap="true"
                  :height="400">

        <div class="box">
            <div class="box-part" id="bp-left">
                <div class="partition" id="partition-register">
                    <div class="partition-title">{{ localization['modal_title'] }}</div>

                    <div v-if="errors.length" class="alert alert-danger">
                        <ul>
                             <li v-for="error in errors">
                                 {{ error }}
                             </li>
                         </ul>
                     </div>

                    <div class="partition-form">
                        <form
                            ref="form"
                            id="form"
                            enctype="multipart/form-data"
                            method="post"
                            action="/loads"
                            @submit.prevent=""
                            autocomplete="false"
                        >

                            <input type="hidden" name="_token" :value="csrf">
                            <!--                                <div class="autocomplete-fix">-->
                            <!--                                    <input disabled type="password">-->
                            <!--                                </div>-->
                            <select name="cityFrom">
                                <option value disabled selected>{{ localization['modal_from_city_title'] }}</option>
                                <option
                                    v-for="city in cities"
                                    :key="city['id']"
                                    :value="city['id']"
                                >{{ city['name'] }}
                                </option>
                            </select>
                            <select name="cityTo">
                                <option value disabled selected>{{ localization['modal_to_city_title'] }}</option>
                                <option
                                    v-for="city in cities"
                                    :key="city['id']"
                                    :value="city['id']"
                                >{{ city['name'] }}
                                </option>
                            </select>
                            <input name="uaName" type="text" :placeholder="localization['modal_name_ukrainian']">
                            <input name="enName" type="text" :placeholder="localization['modal_name_english']">
                            <input name="volume" type="text" :placeholder="localization['modal_volume']">


                            <div class="file_upload" ref="fileUpload" style="margin-top: 10px">
                                <button
                                    ref="fileButton"
                                    type="button"
                                    @focus="focusInput"
                                >{{ localization['modal_button_select'] }}</button>
                                <div ref="fileLabel">{{ localization['modal_photo_label'] }}</div>
                                <input
                                    ref="fileInput"
                                    type="file"
                                    name="photo"
                                    @focus="focusInput"
                                    @blur="blurInput"
                                    @change="changeInput"
                                >
                            </div>


                        </form>

                        <div style="margin-top: 5px">
                        </div>

                        <div class="button-set">
                            <button id="closeButton" @click="clickCloseButton">{{ localization['modal_button_close'] }}</button>
                            <button id="register-btn" @click="clickAddButton">{{ localization['modal_button_add'] }}</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </modal-window>
</template>

<script>
    const MODAL_WIDTH = 328
    export default {
        name: 'Modal',

        props: [
            'cities',
        ],

        data() {
            return {
                modalWidth: MODAL_WIDTH,
                localization: this.$store.state.settings.localization,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

            }
        },
        created() {
            this.modalWidth =
                window.innerWidth < MODAL_WIDTH ? MODAL_WIDTH / 2 : MODAL_WIDTH


        },
        mounted() {
            // console.log('Errors:', this.errors)
            // if (this.errors.length){
            //
            //     this.$modal.show('addLoad');
            // }
        },

        methods: {
            focusInput(){
                this.$refs.fileInput.classList.add( "focus" );
            },
            blurInput(){
                this.$refs.fileInput.classList.remove( "focus" );
            },
            changeInput(event){
                let fileName = event.target.files[0].name

                if( ! fileName.length )
                    return;

                if( this.$refs.fileLabel.offsetWidth > 0 && this.$refs.fileLabel.offsetHeight > 0){
                    this.$refs.fileLabel.textContent = fileName;
                    this.$refs.fileButton.textContent = this.localization['modal_button_select'] ;
                }else
                    this.$refs.fileButton.textContent = fileName;
            },
            clickCloseButton() {
                this.$modal.hide('addLoad');
            },
            clickAddButton() {

                // console.log('Errors after click submit', this.errors)
                localStorage.modal = true
                this.$refs.form.submit()
            }
        },


        computed: {
            errors(){
                console.log('computed errors from Modal:', this.$store.state.error.list)
                if (localStorage.modal){
                    return this.$store.state.error.list
                }
                else {
                    return []
                }
            }
        }


    }
</script>

<style lang="scss">
    $background_color: #404142;
    $github_color: #dba226;
    $facebook_color: #3880ff;
    .box {
        background: white;
        overflow: hidden;
        /*width: 656px;*/
        width: 328px;
        height: 400px;
        border-radius: 2px;
        box-sizing: border-box;
        box-shadow: 0 0 40px black;
        color: #8b8c8d;
        font-size: 0;

        .box-part {
            display: inline-block;
            position: relative;
            vertical-align: top;
            box-sizing: border-box;
            height: 100%;
            width: 100%;
            /*width: 50%;*/
            /*&#bp-right {*/
            /*    background: url('/static/panorama.jpg') no-repeat top left;*/
            /*    border-left: 1px solid #eee;*/
            /*}*/
        }

        .box-messages {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
        }

        .box-error-message {
            position: relative;
            overflow: hidden;
            box-sizing: border-box;
            height: 0;
            line-height: 32px;
            padding: 0 12px;
            text-align: center;
            width: 100%;
            font-size: 11px;
            color: white;
            background: #f38181;
        }

        .partition {
            width: 100%;
            height: 100%;

            .partition-title {
                box-sizing: border-box;
                padding: 30px;
                width: 100%;
                text-align: center;
                letter-spacing: 1px;
                font-size: 20px;
                font-weight: 300;
            }

            .partition-form {
                padding: 0 20px;
                box-sizing: border-box;
            }
        }

        select {
            display: block;
            box-sizing: border-box;
            width: 100%;
            line-height: 2;
            font-size: 14px;
            margin-bottom: 4px;
            padding: 4px 8px;
            border: 0;
            border-bottom: 1px solid #dddedf;
            font-family: inherit;
            transition: 0.5s all;
            background-color: rgb(255, 255, 255);
        }



        input[type='text'] {
            display: block;
            box-sizing: border-box;
            margin-bottom: 4px;
            width: 100%;
            font-size: 14px;
            line-height: 2;
            border: 0;
            border-bottom: 1px solid #dddedf;
            padding: 4px 8px;
            font-family: inherit;
            transition: 0.5s all;
        }

        button {
            background: white;
            border-radius: 4px;
            box-sizing: border-box;
            padding: 10px;
            letter-spacing: 1px;
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
            min-width: 140px;
            margin-top: 8px;
            color: #8b8c8d;
            cursor: pointer;
            border: 1px solid #dddedf;
            text-transform: uppercase;
            transition: 0.1s all;
            font-size: 10px;

            &:hover {
                border-color: mix(#dddedf, black, 90%);
                color: mix(#8b8c8d, black, 80%);
            }
        }

        .large-btn {
            width: 100%;
            background: white;

            span {
                font-weight: 600;
            }

            &:hover {
                color: white !important;
            }
        }

        .button-set {
            margin-bottom: 8px;
        }

        #register-btn,
        #signin-btn {
            margin-left: 8px;
        }

        .facebook-btn {
            border-color: $facebook_color;
            color: $facebook_color;

            &:hover {
                border-color: $facebook_color;
                background: $facebook_color;
            }
        }

        .github-btn {
            border-color: $github_color;
            color: $github_color;

            &:hover {
                border-color: $github_color;
                background: $github_color;
            }
        }

        .autocomplete-fix {
            position: absolute;
            visibility: hidden;
            overflow: hidden;
            opacity: 0;
            width: 0;
            height: 0;
            left: 0;
            top: 0;
        }
    }

    .pop-out-enter-active,
    .pop-out-leave-active {
        transition: all 0.5s;
    }

    .pop-out-enter,
    .pop-out-leave-active {
        opacity: 0;
        transform: translateY(24px);
    }



/*    ///////////////////////////////////////////*/


    .file_upload{
        position: relative;
        /*overflow: hidden;*/
        font-size: 14px;        /* example */
        /*height: 100px;           !* my *!*/
        height: 3em;           /* example */
        line-height: 2       /* the same as height */
    }
    .file_upload > button{
        float: right;
        width: 40px;            /* example */
        min-width: 70px;
        height: 100%;
        margin: 0;
        border-radius: 0;
        border: 1px inherit;
    }
    .file_upload > div{
        padding-left: 1em;      /* example */
        margin-top: 0.5em;
    }
    /*@media only screen and ( max-width: 500px ){  !* example *!*/
    /*    .file_upload > div{*/
    /*        display: none*/
    /*    }*/
    /*    .file_upload > button{*/
    /*        width: 100%*/
    /*    }*/
    /*}*/
    .file_upload input[type=file]{
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        /*height: 100%;*/
        /*transform: scale(20);*/
        letter-spacing: 10em;     /* IE 9 fix */
        -ms-transform: scale(20); /* IE 9 fix */
        opacity: 0;
        cursor: pointer
    }

    /* Making it beautiful */


    .file_upload{
        border: 1px solid #ccc;
        border-radius: 3px;
        box-shadow: 0 0 5px rgba(0,0,0,0.1);
        transition: box-shadow 0.1s linear
    }

    .file_upload.focus{
        box-shadow: 0 0 5px rgba(0,30,255,0.4)
    }




</style>
