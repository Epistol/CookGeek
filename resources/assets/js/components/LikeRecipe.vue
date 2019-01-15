<template v-cloak>
   <div>
       <a class="tag like" :class="{ 'liked': retour !== false }" @click="toggleLike(recipeid)" ><i class="material-icons">favorite</i><span hidden>Ajouter aux favoris</span></a>
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
				if(this.userid){
					axios.post('/api/like/toggle_like/', {recipeid :  this.recipeid, userid: this.userid } ).then(response => {
						this.retour = response.data;
					});
				}
				else {
					console.log("pas connecté");
					this.retour = false;
				}
			},
			async is_already_liked(){
				if(this.userid){
					axios.post('/api/like/check_liked/', {recipeid :  this.recipeid, userid: this.userid } ).then(response => {
						this.retour = response.data;
					});
                }
                else {
					this.retour = false;
                }
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
