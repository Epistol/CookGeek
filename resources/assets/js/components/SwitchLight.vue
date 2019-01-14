<template>
        <a class="navbar-item" @click="toggleLight()"  id="toggle-theme" v-model="switch_content" >
            <i :class="'fas ' +  this.switch_content + ' fa-fw'"> </i>
        </a>
</template>

<script>
	export default {
		name: "SwitchLight",

		data: function() {
			return {
				switch_content :''
			};
		},

		methods: {
			toggleLight() {
				const el = document.body;
				const htmeuleu = document.documentElement;
				if(el.classList.contains('nightmode')) {
					// Turning the theme off:
					el.classList.remove('nightmode');
					htmeuleu.classList.remove('nightmode');

					localStorage.removeItem('nightmode');

					this.switch_content  = '<i class="fas fa-moon"></i>';
					this.checkLight();
				} else {
					el.classList.add('nightmode');
					htmeuleu.classList.add('nightmode');

					localStorage.setItem('nightmode', true);
					this.switch_content  = '<i class="fas fa-sun"></i>';
					this.checkLight();
				}
			},

			checkLight() {
				const el = document.body;
				const htmeuleu = document.documentElement;

				if(localStorage.getItem('nightmode')) {
					el.classList.add('nightmode');
					htmeuleu.classList.add('nightmode');
					this.switch_content  = 'fa-sun';
				}
				else {
					this.switch_content  = 'fa-moon';
				}
			}
		},
		mounted() {
			this.checkLight();
		},

		computed: {},
	}
</script>

<style scoped>

</style>