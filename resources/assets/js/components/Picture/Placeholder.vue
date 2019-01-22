<template>
    <div>
        <div
                class="is-flex-center fit-cover hover_pointer" :alt="this.text"
                :style="this.colorGenerated + 'height: 20vh;'" @click="showModal()">
            <span class="uploadIcon"><i class="fas fa-cloud-upload-alt fa-7x"></i></span>

            <span style="  z-index:0;"> Ajouter ma propre photo
            </span>

        </div>
        <template v-if="clicked">
            <modal v-if="clicked" @close="clicked = false" v-cloak>
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
                    <button class="button is-primary" @click="uploadImage()">Envoyer</button>
                </div>

            </modal>
        </template>
    </div>


</template>

<script>
    import PictureInput from 'vue-picture-input';
    import modal from "../ModalView.vue";

    export default {
        name: "Placeholder",
        props: ["text", "recipeid", "recipehash", "user"],
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
            PictureInput, modal
        },
        methods: {
            generateColors() {
                const idFirst = Math.floor(Math.random() * this.colors.length);
                this.colorGenerated = this.colors[idFirst];
            }
            ,
            created: function () {
                this.generateColors()
            },
            showModal() {
                this.clicked = true;
            },
            onChange(image) {
                console.log('New picture selected!');
                if (image) {
                    console.log('Picture loaded.');
                    this.image = image
                } else {
                    console.log('FileReader API not supported: use the <form>, Luke!')
                }
            },
            uploadImage() {
                return axios.post('/recette/addmypicture', {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    recipe: this.recipeid,
                    recipehash: this.recipehash,
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
        }
    }
</script>

<style scoped>

</style>