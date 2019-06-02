<template>
    <div id="create-recipe">
        <div class="background-round">
            <div id="recipe-name-img">
                <h1 class="title">{{ $t('Create your recipe')}}
                    <template v-if="registration.title"> : {{registration.title}}</template>
                </h1>
                <div class="columns">
                    <div class="column is-3">
                        <picture-input
                                ref="pictureInput"
                                :width="500"
                                :removable="true"
                                removeButtonClass="is-error button"
                                :height="500"
                                accept="image/jpeg, image/png, image/gif"
                                buttonClass=" button primary"
                                @change="onChangePic"
                                :customStrings="this.pictureStrings">
                        </picture-input>
                    </div>
                    <div class="column has-text-centered">
                        <span class="timing">{{ $t('recipe.add.name')}} </span>
                        <input class="ajout-recette-titre input_modal blck" type="text" placeholder=""
                               v-model="registration.title" name="title" id="title">
                        <SetComment></SetComment>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column is-half">
                    <div id="universe-name" class="columns">
                        <div class="column is-3" style="text-align: left;">
                            <label class="label">{{ $t('recipe.univers')}}</label>
                        </div>
                        <div class="column is-8" id="universe_input">
                            <SearchAutocomplete searchtype="univers"></SearchAutocomplete>
                        </div>
                    </div>
                    <SetMedia></SetMedia>
                </div>
                <div class="column is-half">
                    <div id="category-name" class="columns">
                        <div class="column is-3" style="text-align: left;">
                            <label class="label">{{ $t('recipe.category')}}</label>
                        </div>
                        <div class="column is-8" id="category_input">
                            <SetCategory></SetCategory>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <div class="columns">
                                <div class="column is-3">
                                    <label class="label">Difficulté</label>
                                </div>
                                <div class="column">
                                    <SetDifficulty></SetDifficulty>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ingredients-list">
                <section class="ingredients">
                    <div id="ingr">
                        <div class="column is-3" style="text-align: left;">
                            <p class="title is-4">Ingredients</p>
                        </div>
                        <Ingredients></Ingredients>
                    </div>
                </section>
            </div>
            <div id="steps-list">
                <section class="">
                    <p class="title is-4">Etapes</p>
                    <StepsAdd></StepsAdd>
                </section>
            </div>
            <div id="timing" class="columns">
                <div class="column is-paddingless pags" style="margin-bottom: 2rem;">
                    <div class="padding-sides columns timing">
                        <div class="column is-12">
                            <SetTimePreparation></SetTimePreparation>
                            <SetTimeCooking></SetTimeCooking>
                            <SetTimeRest></SetTimeRest>
                            <SetParts></SetParts>
                            <div id="sliders">
                                <div class="columns">
                                    <div class="column">
                                        <SetCost></SetCost>
                                    </div>
                                </div>
                            </div>
                            <SetVegan></SetVegan>
                        </div>
                    </div>
                </div>
            </div>
            <div id="comment">
                <div class="columns" style="margin-bottom: 2rem;">
                    <div class="column is-12 ">
                        <SetVideo></SetVideo>
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
    import PictureInput from 'vue-picture-input';

    export default {
        name: "Create",
        components: {
            SetCost,
            SetCategory,
            SearchAutocomplete,
            Ingredients,
            StepsAdd,
            DropPicturePreview,
            SetDifficulty,
            SetTimePreparation,
            SetTimeCooking,
            SetTimeRest,
            SetParts,
            SetVegan,
            SetComment,
            SetVideo,
            SetMedia,
            PictureInput
        },
        data() {
            return {
                registration: {
                    title: null,
                    name: null,
                },
                pictureStrings: {
                    drag: 'Faites glisser ou cliquez pour ajouter votre image',
                    change: 'Changer de photo',
                    remove: 'Supprimer la photo',
                    select: 'Choisir une photo'
                }
            }
        },
        methods: {
            onChangePic(image) {
                console.log('New picture selected!')
                if (image) {
                    console.log('Picture loaded.')
                    this.image = image
                } else {
                    console.log('FileReader API not supported: use the <form>, Luke!')
                }
            }
        },
    }
</script>
