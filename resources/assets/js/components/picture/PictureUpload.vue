<template>
    <label>
        <template v-if="!showPreview">
            <template v-if="picture !== 'users/default.png'">
                <figure class="image is-square is-128x128">
                    <template v-if="type === 'recipe'">
                        <img class="fit-cover" :src="'/recipes/' + recipeid + '/' + user_id + '/' + picture"/>
                    </template>
                    <template v-else>
                        <img class="fit-cover" :src="picture"/>
                    </template>
                    <div class="change-picture">
                        <i class="fas fa-camera-retro"></i>
                    </div>
                </figure>
            </template>
            <template v-else>
                <figure class="image is-square is-128x128">
                    <img class="fit-cover" :src="'https://api.adorable.io/avatars/'+user" v-show="!showPreview"
                         style="max-height:196px;">
                    <div class="change-picture">
                        <i class="fas fa-camera-retro"></i>
                    </div>
                </figure>
            </template>
        </template>
        <template v-else>
            <figure class="image is-square is-128x128">
                <img v-bind:src="imagePreview" class="fit-cover" style="max-height:196px;"/>
                <div class="change-picture">
                    <i class="fas fa-camera-retro"></i>
                </div>
            </figure>
        </template>

        <input @change="previewFiles" ref="myFiles" class="" id="upload" type="file" name="resume"
               accept="image/x-png,image/jpeg" style="display:none">
    </label>
</template>

<script>

	export default {
		props: ["picture", "user", "user_id", "type", "recipeid"],
        name : 'pictureupload',
		data: function() {
			return {
				picture_sent: '',
				url: null,
				showPreview: false,
				imagePreview: null,
				user: '',
			};
		},

		methods: {
			previewFiles() {
				this.picture_sent = this.$refs.myFiles.files[0];
				let reader = new FileReader();
				reader.addEventListener("load", function() {
					this.showPreview = true;
					this.imagePreview = reader.result;
				}.bind(this), false);

				if(this.picture_sent) {
					/*
                      Ensure the file is an image file.
                    */
					if(/\.(jpe?g|png|gif)$/i.test(this.picture_sent.name)) {
						/*
                          Fire the readAsDataURL method which will read the file in and
                          upon completion fire a 'load' event which we will listen to and
                          display the image in the preview.
                        */
						reader.readAsDataURL(this.picture_sent);
					}
				}
			}

		},
		mounted() {
		},

		computed: {},

	}
</script>
