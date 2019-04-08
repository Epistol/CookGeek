<template>
    <vueDropzone id="drop1" :options="dropOptions"></vueDropzone>
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
                addRemoveLinks: true
            }
        })
    }

</script>

<style scoped>

</style>