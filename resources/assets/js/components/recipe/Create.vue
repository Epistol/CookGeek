<template>
    <div id="create-recipe">
        <div class="background-round">
            <div v-if="step === 1" id="recipe-name-img">
                <div class="column has-text-centered">
                    <h1 class="title">{{ $t('Create your recipe')}} </h1>
                    <input class="ajout-recette-titre" class="input_modal blck" type="text" placeholder=""
                           name="title" id="title"/>
                </div>

                <DropPicturePreview></DropPicturePreview>

                <button @click.prevent="next()">{{ $t('next')}}</button>
            </div>


            <div v-if="step === 2" id="universe-name">
                <div class="column is-3" style="text-align: left;">
                    <label class="title is-4 is-">{{ $t('recipe.univers')}}</label>
                </div>
                <div class="column is-8" id="universe_input">
                    <SearchAutocomplete searchtype="univers"
                                        data_old="{!! clean(strip_tags(old('univers'))) !!}  "></SearchAutocomplete>
                    <label for="universe"></label>
                    <input class="input_modal blck" type="text" placeholder="" name="universe" id="universe" value="">
                    <button @click.prevent="prev()">{{ $t('previous')}}</button>
                    <button @click.prevent="next()">{{ $t('next')}}</button>

                </div>
            </div>

            <div v-if="step === 3" id="ingredients-list">
                <section class="ingredients">
                    <div id="ingr">
                        <div class="column is-3" style="text-align: left;">
                            <h2 class="title is-4">Ingredients</h2>
                        </div>
                        <Ingredients></Ingredients>
                    </div>
                </section>
                <button @click.prevent="prev()">{{ $t('previous')}}</button>
                <button @click.prevent="next()">{{ $t('next')}}</button>
            </div>
            <div v-if="step === 4" id="steps-list">
                <StepsAdd></StepsAdd>
                <button @click.prevent="prev()">{{ $t('previous')}}</button>
                <button @click.prevent="next()">{{ $t('next')}}</button>
            </div>
            <div v-if="step === 5" id="sliders">
                <SetDifficulty></SetDifficulty>
                <SetCategory></SetCategory>
                <SetCost></SetCost>
                <button @click.prevent="prev()">{{ $t('previous')}}</button>
                <button @click.prevent="next()">{{ $t('next')}}</button>
            </div>

        </div>
</template>

<script>
    import SearchAutocomplete from '../Autocomplete.vue'
    import Ingredients from "./ingredients/Ingredients.vue";
    import StepsAdd from "./steps/StepsAdd";
    import DropPicturePreview from "../picture/DropPicturePreview";
    import SetDifficulty from "../recipe/SetDifficulty";
    import SetCategory from "./SetCategory";
    import SetCost from "./SetCost";

    export default {
        name: "Create",
        components: {
            SetCost,
            SetCategory,
            SearchAutocomplete, Ingredients, StepsAdd, DropPicturePreview, SetDifficulty
        },
        data() {
            return {
                step: 1,
                registration: {
                    name: null,
                    email: null,
                    street: null,
                    city: null,
                    state: null,
                }
            }
        },
        methods: {
            prev() {
                this.step--;
            },
            next() {
                this.step++;
            },
        },
    }
</script>

<style scoped>

</style>