<template v-cloak>
    <div>
        <template v-if="text_icon">
            <div :class="'icones ' + textToLower ">
            </div>
        </template>
    </div>
</template>

<script>
	export default {
		props: ['text_icon'],
        name : "categ_icon",
		data: function() {
			return {
				counter: 0,
			};
		},

		computed: {
			textToLower() {
				return this.text_icon.toLowerCase().trim();
			}
		}

	}

</script>

<style scoped>

</style>