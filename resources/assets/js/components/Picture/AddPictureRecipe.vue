<template>
    <transition name="fade">
        <div>
            <a class="button_picture button is-rounded " @click="showModal()">
                <span class="icon is-small">
                      <span class=" fa-stack ">
                      <i class="fas fa-camera fa-stack-1x " style="color: #7f5fbf;"></i>
                    </span>
                 </span>
                <span> Ajouter ma photo</span>
            </a>

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
    </transition>
</template>

<script>
    import PictureInput from 'vue-picture-input';
    import modal from "../ModalView.vue";

    export default {
        name: "AddPictureRecipe",
        props: ["recipeid", "recipehash", "user"],
        data() {
            return {
                clicked: false,
                image: '',
                sent: false,
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
                    recipehash: this.recipehash,
                    user: this.user,
                    picture: this.image,
                }).then(response => {
                    this.sent = true;
                    console.log(response);
                }).catch(error => {

                });
            }
        }
    }
</script>

<style scoped>

</style>