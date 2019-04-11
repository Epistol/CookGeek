<template>
    <div id="create-recipe">
        <div class="background-round">
            <div v-if="step === 1" id="recipe-name-img">
                <div class="column has-text-centered">
                    <h1 class="title">{{ $t('Create your recipe')}} </h1>
                    <input class="ajout-recette-titre input_modal blck" type="text" placeholder=""
                           name="title" id="title">
                </div>
                <DropPicturePreview></DropPicturePreview>
                <button @click.prevent="next()" class="button is-primary">{{ $t('next')}}</button>
            </div>
            <div v-if="step === 2" id="universe-name">
                <div class="column is-3" style="text-align: left;">
                    <label class="title is-4 is-">{{ $t('recipe.univers')}}</label>
                </div>
                <div class="column is-8" id="universe_input">
                    <SearchAutocomplete searchtype="univers"></SearchAutocomplete>

                    <button @click.prevent="prev()">{{ $t('previous')}}</button>
                    <button @click.prevent="next()" class="button is-primary">{{ $t('next')}}</button>

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
                <button @click.prevent="next()" class="button is-primary">{{ $t('next')}}</button>
            </div>
            <div v-if="step === 4" id="steps-list">
                <StepsAdd></StepsAdd>
                <button @click.prevent="prev()">{{ $t('previous')}}</button>
                <button @click.prevent="next()" class="button is-primary">{{ $t('next')}}</button>
            </div>
            <div v-if="step === 5" id="sliders">
                <SetDifficulty></SetDifficulty>
                <SetCategory></SetCategory>
                <SetCost></SetCost>
                <button @click.prevent="prev()">{{ $t('previous')}}</button>
                <button @click.prevent="next()" class="button is-primary">{{ $t('next')}}</button>
            </div>
            <div v-if="step === 6" id="timing">
                <div class="columns" style="margin-bottom: 2rem;">
                    <div class="column  is-paddingless page is-4">
                        <div class="padding-sides">
                            <div class="columns timing">
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
                </div>
                <button @click.prevent="prev()">{{ $t('previous')}}</button>
                <button @click.prevent="next()" class="button is-primary">{{ $t('next')}}</button>
            </div>
            <div v-if="step === 7" id="comment">
                <div class="columns" style="margin-bottom: 2rem;">
                    <div class="column is-12 ">
                        <SetComment></SetComment>
                        <SetVideo></SetVideo>
                        <SetMedia></SetMedia>
                    </div>
                </div>
                <button @click.prevent="prev()">{{ $t('previous')}}</button>
                <button @click.prevent="submit()" class="button is-primary is-large publish" id="submit-all">Ajouter ma
                    recette
                </button>
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