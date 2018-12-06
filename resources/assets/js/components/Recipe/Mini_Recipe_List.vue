<template v-cloak>
    <div class="recipe_list_object is-flex">
        <!--<p>Hey</p>-->
        <template v-if="picture">
            <figure class="image is-64x64 radiused">
                <!--TODO : recuperer l'image crop square (et la generer aussi du coup) -->
                <img :src="'/recipes/'+picture.recipe_id+'/'+'/'+picture.user_id+'/'+picture.image_name"
                     style="background-picture : 'https://picsum.photos/64/?random'" alt=""/>
            </figure>
        </template>
        <template v-else>
            <!--<img :src="'https://picsum.photos/64/?random'" alt=""/>-->
        </template>
        <a :href="'/recette/'+recipe.slug" class="titre_content">{{recipe.title}}</a>
    </div>
</template>

<script>
	export default {
		props: {
			recipe: {
				type: Object,
				required: true
			},

		},

		data: function() {
			return {
				counter: 0,
				retour: '',
				picture: 'https://picsum.photos/64/?random',
				test: '',
			};
		},

		methods: {
			async getFirstPicture() {
				axios.post('/api/recipe/get_picture/', {recipeid: this.recipe.id}).then(response => {
					this.picture = response.data;
				});
			},
		},

		mounted() {
			this.getFirstPicture();
		}

	}
</script>

<style scoped>

</style>