<template>
    <div id="create-recipe">
        <div class="background-round">
            <div id="recipe-name-img">
                <div class="column has-text-centered">
                    <h1 class="title">{{ $t('Create your recipe')}} </h1>
                    <label for="title">{{ $t('recipe.univers')}}</label>
                    <input class="ajout-recette-titre input_modal blck" type="text" placeholder=""
                           v-model="registration.title" name="title" id="title">
                </div>
                <DropPicturePreview></DropPicturePreview>
            </div>
            <div id="universe-name">
                <div class="column is-3" style="text-align: left;">
                    <label class="title is-4 is-">{{ $t('recipe.univers')}}</label>
                </div>
                <div class="column is-8" id="universe_input">
                    <label class="title is-4 is-">{{ $t('recipe.univers')}}</label>
                    <SearchAutocomplete searchtype="univers"></SearchAutocomplete>
                </div>
            </div>
            <div id="ingredients-list">
                <section class="ingredients">
                    <div id="ingr">
                        <div class="column is-3" style="text-align: left;">
                            <h2 class="title is-4">Ingredients</h2>
                        </div>
                        <Ingredients></Ingredients>
                    </div>
                </section>
            </div>
            <div id="steps-list">
                <StepsAdd></StepsAdd>
            </div>
            <div id="sliders">
                <SetDifficulty></SetDifficulty>
                <SetCategory></SetCategory>
                <SetCost></SetCost>
            </div>
            <div id="timing" class="columns">
                <div class="column is-paddingless pags" style="margin-bottom: 2rem;">
                    <div class="padding-sides columns timing">
                        <div class="column is-10 is-offset-1 ">
                            <SetTimePreparation></SetTimePreparation>
                            <SetTimeCooking></SetTimeCooking>
                            <SetTimeRest></SetTimeRest>
                            <SetParts></SetParts>
                            <SetVegan></SetVegan>
                        </div>
                    </div>
                </div>
            </div>
            <div id="comment">
                <div class="columns" style="margin-bottom: 2rem;">
                    <div class="column is-12 ">
                        <SetComment></SetComment>
                        <SetVideo></SetVideo>
                        <SetMedia></SetMedia>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import SearchAutocomplete from '../Autocomplete.vue'
    import Ingredients from "./ingredients/Ingredients.vue";
    import StepsAdd from "./steps/StepsAdd";
    import DropPicturePreview from "../picture/DropPicturePreview";
    import SetDifficulty from "./_setters/SetDifficulty";
    import SetCategory from "./_setters/SetCategory";
    import SetCost from "./_setters/SetCost";
    import SetTimePreparation from "./_setters/times/SetTimePreparation";
    import SetTimeCooking from "./_setters/times/SetTimeCooking";
    import SetTimeRest from "./_setters/times/SetTimeRest";
    import SetParts from "./_setters/SetParts";
    import SetVegan from "./_setters/SetVegan";
    import SetComment from "./_setters/SetComment";
    import SetVideo from "./_setters/SetVideo";
    import SetMedia from "./_setters/SetMedia";

    export default {
        name: "Create",
        components: {
            SetCost, SetCategory, SearchAutocomplete, Ingredients,
            StepsAdd, DropPicturePreview, SetDifficulty,
            SetTimePreparation, SetTimeCooking, SetTimeRest, SetParts, SetVegan, SetComment, SetVideo, SetMedia
        },
        data() {
            return {
                registration: {
                    title: null,
                    name: null,
                    email: null,
                    street: null,
                    city: null,
                    state: null,
                }
            }
        },
        methods: {},
    }
</script>

<style scoped>

</style>