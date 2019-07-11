<template v-cloak>
    <div>
        <template v-cloak v-if="!picture">
            <div class="recipe-index-object">
                <a :href="'/recette/'+recipe.slug" class="home-text">{{recipe.title}}</a>
                <!--Ingredients-->
                <ul>
                    <li v-for="ingredient in ingredients">
                        {{ ingredient.qtt }} {{ ingredient.name }}
                    </li>
                </ul>
            </div>
        </template>
        <template v-else v-cloak>

            <div class="card">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img :src="'/recipes/'+picture.recipe_id+'/'+'/'+picture.user_id+'/'+picture.image_name"
                             :alt='recipe.title'>
                    </figure>
                </div>
                <div class="card-content">
                    <div class="media">
                        <div class="media-content">
                            <a :href="'/recette/'+recipe.slug" class="home-text">{{recipe.title}}</a>
                        </div>
                    </div>

                    <div class="container">
                        <ul>
                            <li v-for="ingredient in ingredients">
                                {{ ingredient.qtt }} {{ ingredient.name }}
                            </li>
                        </ul>
                        {{recipe.commentary_author}}
                        <br>
                        <time :datetime="recipe.updated_at">{{recipe.updated_at}}</time>
                    </div>
                </div>
            </div>


        </template>
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
        name : "homerecipes",
        data: function () {
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