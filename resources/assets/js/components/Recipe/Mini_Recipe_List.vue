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
        <!--Ingredients-->
        <ul id="example-1">
            <li v-for="ingredient in ingredients">
                {{ ingredient.qtt }}    {{ ingredient.name }}
            </li>
        </ul>

        <!--Timing   -->

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
				ingredients: '',
				timing: '',
			};
		},

		methods: {
			async getFirstPicture() {
				axios.post('/api/recipe/get_picture/', {recipeid: this.recipe.id}).then(response => {
					this.picture = response.data;
				});
			},

			async getIngredients() {
				axios.post('/api/recipe/get_ingredients/', {recipeid: this.recipe.id}).then(response => {
					this.ingredients = response.data;
				});
			},

		},

		mounted() {
			this.getFirstPicture();
			this.getIngredients();
		}

	}
</script>

<style scoped>

</style>