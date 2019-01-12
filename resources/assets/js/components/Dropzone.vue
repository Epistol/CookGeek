<template>
    <div id="drop">
        <vue-dropzone id="drop1" :options="dropOptions"></vue-dropzone>
    </div>
</template>

<script>
    import vueDropzone from "vue2-dropzone";

    export default {
        data: () => ({
            dropOptions: {
                url: "https://httpbin.org/post"
            }
        }),
        components: {
            vueDropzone
        }
    };
</script>