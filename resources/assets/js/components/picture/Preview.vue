<template>
    <div>
        <input type="file" @change="onFileChange" :name="name" :id="id" />

        <div id="preview">
            <img v-if="url" :src="url" />
        </div>

    </div>
</template>

<script>
    import PictureInput from 'vue-picture-input';
    import LoginModal from "../modal/LoginModal.vue";
    import ModalView from "../modal/ModalView";

    export default {
        props: ["name", "id"],
        data() {
            return {
                url: null,
            }
        },
        name : "preview-image",
        components: {
            PictureInput, ModalView, LoginModal
        },
        methods: {
            onFileChange(image) {
                let form = new FormData();

                if (image) {
                        const file = image.target.files[0];
                        this.url = URL.createObjectURL(file);
                        form.append('imagen', file);
                         console.log(form.get('imagen'));

                } else {
                    console.log('FileReader API not supported: use the <form>, Luke!')
                }
            },
        },
    }
</script>

<style scoped>

</style>