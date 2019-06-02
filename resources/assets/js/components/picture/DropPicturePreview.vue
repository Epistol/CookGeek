<template>
    <vueDropzone id="customdropzone"
                 :options="dropOptions"></vueDropzone>
</template>

<script>
    import vueDropzone from "vue2-dropzone";

    export default {
        name: "DropPicturePreview",
        components: {
            vueDropzone
        },
        data: () => ({
            dropOptions: {
                url: 'https://httpbin.org/post',
                autoProcessQueue: false,
                addRemoveLinks: true,
                // previewTemplate: this.templateDz,
            }
        }),
        methods: {

        },
    }
</script>

<style scoped>

</style>