<template>
    <label style="display: table-caption;">
        <template v-if="!showPreview">
            <template v-if="picture !== 'users/default.png' && picture !== null && picture !== 'null' ">
                <figure class="image is-square is-128x128">
                    <img :src="'/universe/' + universe_id + '/' + picture"/>
                    <!--<div class="change-picture">
                        <i class="fas fa-camera-retro"></i>
                    </div>-->
                </figure>
            </template>
            <template v-else>
                <figure class="image is-square is-128x128">
                    <img :src="'https://api.adorable.io/avatars/'+universe_id" v-show="!showPreview"
                         style="max-height:196px;">
                    <!--<div class="change-picture">
                        <i class="fas fa-camera-retro"></i>
                    </div>-->
                </figure>
            </template>
        </template>
        <template v-else>
            <figure class="image is-square is-128x128">
                <img v-bind:src="imagePreview" style="max-height:196px;"/>
                <!--<div class="change-picture">
                    <i class="fas fa-camera-retro"></i>
                </div>-->
            </figure>
        </template>

       <!-- <input @change="previewFiles" ref="myFiles" class="" id="upload" type="file" name="resume"
               accept="image/x-png,image/jpeg" style="display:none">-->
    </label>
</template>

<script>

	export default {
		props: ["picture", "universe_id", "user_id"],
        name : "univpictureupload",
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
