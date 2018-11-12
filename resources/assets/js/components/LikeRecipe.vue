<template v-cloak>
   <div>
       <a class="tag like" :class="{ 'liked': retour !== false }" @click="toggleLike(recipeid)"  ><i class="material-icons">favorite</i></a>
   </div>
</template>

<script>
	export default {
		props : ["recipeid", "userid"],
		data: function () {
			return {
				counter: 0,
                retour : '',

			};
		},

		methods: {
			async toggleLike() {
				axios.post('/api/like/toggle_like/', {recipeid :  this.recipeid, userid: this.userid } ).then(response => {
					this.retour = response.data;
				});
			},
			async is_already_liked(){
				axios.post('/api/like/check_liked/', {recipeid :  this.recipeid, userid: this.userid } ).then(response => {
					this.retour = response.data;
				});
			},
		},
		mounted() {
			this.is_already_liked();
		},

		computed: {
			countminus: function(){
				return this.counter - 1 ;
			},

		},

	}
</script>
