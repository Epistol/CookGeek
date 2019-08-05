<template>
    <transition name="vodal-zoom">
        <div>
            <template v-if="this.type === 'button'">
                <a class="button-picture button is-outlined rounded-full " @click="showModal()">
                <span class="icon is-small">
                      <span class=" fa-stack ">
                      <i class="fas fa-camera fa-stack-1x " style="color: #7f5fbf;"></i>
                    </span>
                 </span>
                    <span>Ajouter ma photo</span>
                </a>
            </template>
            <template v-else-if="this.type === 'no-button'">
                <h3 slot="header">Ajouter votre photo</h3>
                <div slot="body" >
                    <template v-if="!sent">
                        <picture-input @change="onChange"  ref="pictureInput" :height="this.height" :width="this.width" :prefill="this.prefilled"  removable="true" id="picture" name="picture"
                                       :custom-strings="{
        upload: '<h1>Bummer!</h1>',
        drag: '<i class=\'fas fa-camera-retro\'></i> Ajouter votre photo'
      }"
                        ></picture-input>
                    </template>
                    <template v-else>
                        <h1 class="title">Photo envoyée ! Nous la validerons d'ici peu ! </h1>
                    </template>
                </div>
                <div slot="footer" v-if="!sent && this.send === 'true' ">
                    <button class="button is-primary" type="button" @click="uploadImage()">Envoyer</button>
                </div>
            </template>
            <template v-else>
                <div
                        class="is-flex-center fit-cover pointer-hover" :alt="this.text"
                        :style="this.colorGenerated + 'height: 20vh;'" @click="showModal()">
                    <span class="uploadIcon"><i class="fas fa-cloud-upload-alt fa-7x"></i></span>
                    <span style="z-index:0;">Ajouter ma propre photo
            </span>
                </div>
            </template>
            <template v-if="clicked">
                <template v-if="user !== '' ">
                    <ModalView v-if="clicked" @close="clicked = false" v-cloak>
                        <h3 slot="header">Ajouter votre photo</h3>
                        <div slot="body">
                            <template v-if="!sent">
                                <picture-input @change="onChange"
                                               :custom-strings="{
        upload: '<h1>Bummer!</h1>',
        drag: '<i class=\'fas fa-camera-retro\'></i> Ajouter votre photo'
      }"
                                ></picture-input>
                            </template>
                            <template v-else>
                                <h1 class="title">Photo envoyée ! Nous la validerons d'ici peu ! </h1>
                            </template>
                        </div>
                        <div slot="footer" v-if="!sent">
                            <button class="button is-primary" @click="uploadImage()" type="button">Envoyer</button>
                        </div>
                    </ModalView>
                </template>
                <template v-else>
                        <login-modal :showModal="true" @close="closing()" ></login-modal>
                </template>
            </template>
        </div>
    </transition>
</template>

<script>
    import PictureInput from 'vue-picture-input';
    import LoginModal from "../modal/LoginModal.vue";
    import ModalView from "../modal/ModalView";

    export default {
        props: ["url", "anyid", "height", "width", "send", "recipeid", "recipehash", "user", "type", "prefilled"],
        name : "add-any-picture",
        data() {
            return {
                colors: ['background-image: linear-gradient(45deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%);', 'background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);', 'background-image: linear-gradient(to top, #fad0c4 0%, #ffd1ff 100%);', 'background-image: linear-gradient(to right, #ffecd2 0%, #fcb69f 100%);', 'background-image: linear-gradient(to top, #ff9a9e 0%, #fecfef 99%, #fecfef 100%);', 'background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%);', 'background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);', 'background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);', 'background-image: linear-gradient(120deg, #fccb90 0%, #d57eeb 100%);'],
                colorGenerated: '',
                clicked: false,
                image: '',
                sent: false,
            }
        },
        components: {
            PictureInput, ModalView, LoginModal
        },
        methods: {
            generateColors() {
                const idFirst = Math.floor(Math.random() * this.colors.length);
                this.colorGenerated = this.colors[idFirst];
            },
            closing(){
                this.clicked = false;
            },
            showModal() {
                this.clicked = true;
            },
            onChange(image) {
                console.log('New picture selected!');
                if (image) {
                    console.log('Picture loaded.');
                    this.image = image;
                    // this.$refs.pictureInput.file
                    this.$emit('updated', this.$refs.pictureInput.file)
                } else {
                    console.log('FileReader API not supported: use the <form>, Luke!')
                }
            },
            uploadImage() {
                return axios.post('/'+this.url+'/addmypicture', {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    anyid: this.anyid,
                    user: this.user,
                    picture: this.image,
                }).then(response => {
                    this.sent = true;
                    console.log(response);
                }).catch(error => {

                });
            }
        },
        created: function () {
            this.generateColors();
        },
        computed: {
            clicked: function () {
                if (this.clicked === true) {
                    if (this.user === '') {
                        this.showModal = true;
                    }
                }
            },

        },
    }
</script>

<style scoped>

</style>