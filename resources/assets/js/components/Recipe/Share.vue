<template>
    <div class="sharing-block">
        <div class="field has-addons" style="margin-left: 1rem">

            <p class="control">
                <a class="button" @click="startframe('facebook')">
                          <span class=" is-small">
                 <i class="fas fa-share"></i>
                    Partager
                          </span>
                </a>
            </p>
            <template v-if="componentshow">
                <component :is="currentComponent" :url="url" :network="reseau"></component>
            </template>

        </div>
    </div>

</template>

<script>
	export default {
		name: "Share.vue",
		props: ["url"],

		data() {
			return {
				currentComponent: 'sharemodal',
				reseau: '',
				componentshow: false,
			}
		},

		methods: {
			startframe($data) {
				this.reseau = $data;
				this.componentshow = true;
			},


		},


	}
</script>

<style scoped>

</style>