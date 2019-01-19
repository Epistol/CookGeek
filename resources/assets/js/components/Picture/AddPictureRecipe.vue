<template>
    <div>
        <a class="button_picture" @click="showModal()">

                <span class=" fa-stack " style="margin-right: 0.4rem;position: absolute;left: 2%;">
      <i class="fas fa-circle fa-stack-2x" style="color: #7f5fbf;"></i>
      <i class="fas fa-camera fa-stack-1x " style="color: #ebeaf5;"></i>
                      <i class="fas fa-plus " style="position:absolute;color:white"></i>
    </span>

            Ajouter votre photo
        </a>

        <template v-if="clicked">
            <modal v-if="clicked" @close="clicked = false" v-cloak>
                <h3 slot="header">Ajouter votre photo</h3>
                <div slot="body">
                    <picture-input @change="onChange"
                                   :custom-strings="{
        upload: '<h1>Bummer!</h1>',
        drag: '<i class=\'fas fa-camera-retro\'></i> Ajouter votre photo'
      }"
                    ></picture-input>
                </div>
                <div slot="footer">
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
        name: "AddPictureRecipe",
        props: ["recipeid", "user"],
        data() {
            return {
                clicked: false,
                image: '',
            }
        },
        components: {
            PictureInput, modal
        },
        methods: {
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
                    user: this.user,
                    picture: this.image,
                }).then(response => {
                    console.log(response);

                }).catch(error => {

                });
            }
        }
    }
</script>

<style scoped>

</style>