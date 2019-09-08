<template v-cloak>
    <div class="recipe-list-object is-flex">
        <template v-if="picture">
            <figure class="image is-64x64 rounded">
                <!--TODO : recuperer l'image crop square (et la generer aussi du coup) -->
                <img :src="picture"
                     style="background-picture : 'https://picsum.photos/64/?random'" alt=""/>
            </figure>
        </template>
        <template v-else>
        </template>
        <a :href="'/recette/'+recipe.slug" class="content-title">{{recipe.title}}</a>
        <!--Ingredients-->
        <ul id="example-1">
            <li v-for="(ingredient,index) in ingredients" v-if="index <= 5">
                {{ ingredient.qtt }} {{ ingredient.name }}
            </li>
        </ul>


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