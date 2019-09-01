<template>
    <div class="flex">
        <div class="w-full">
            <div class="is-flex-center file has-name is-boxed">
                <div class="flex is-multiline">
                    <div class="w-full is-flex-center">
                        <label class="file-label">
                            <input class="file-input" type="file" name="resume" @change="onFileChange" id="upload"
                                   accept="image/x-png,image/jpeg">
                            <span class="file-cta span-flex-center">
      <span class="file-icon">
        <i class="fas fa-upload"></i>
      </span>
      <span class="file-label">
        Ajouter une image
      </span>
    </span>
                            <span class="file-name" v-if="filename">
      {{this.filename}}
    </span>
                        </label>
                    </div>
                    <div class="w-full is-flex-center">
                        <div id="preview">
                            <img v-if="url" :src="url" style="max-width: 15rem; max-height: 10rem"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    import PictureInput from 'vue-picture-input';

    export default {
        components: {
            PictureInput
        },
        name: 'set-picture',
        data() {
            return {
                url: null,
                filename: null,
            }
        },
        methods: {
            onFileChange(e) {
                const file = e.target.files[0];
                this.url = URL.createObjectURL(file);
                this.filename = file.name;
            }
        }
    }
</script>

<style>
    span.picture-inner-text {
        font-size: 1.2em !important;
    }
</style>