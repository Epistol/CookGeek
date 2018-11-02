<template>
    <div>
        <div class="container addrecipe">
            <div class="round_bg">
                <div class="columns">
                    <div class="column">
                        <div class="has-text-centered">
                            <h1 class="title">Ajoutez votre recette
                                <span v-cloak v-if="titre_recette"
                                      class="ajout-recette-titre"> / {{titre_recette}} </span></h1>
                        </div>
                    </div>
                </div>
            </div>
            <section class="section">
                <transition appear

                            enter-active-class="animated fadeIn"
                            leave-active-class="animated fadeOut"
                            mode="out-in"
                >
                    <div key="1" v-if="step === 1">
                        <h1>ETAPE 1</h1>
                        <div class="columns">
                            <div class="column is-3" style="text-align: left;">
                                <label class="title is-4">Titre de la recette </label>
                            </div>
                            <div class="column">
                                <input class="input_modal blck" type="text" placeholder="" v-model="titre_recette"
                                       name="title" id="title" value=""
                                       required>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column is-3" style="text-align: left;">
                                <label class="title is-4 is-">Univers</label>
                            </div>
                            <div class="column">
                                <searchautocomplete searchtype="univers"></searchautocomplete>
                            </div>
                        </div>
                        <button @click.prevent="next()">Next</button>
                    </div>

                    <div key="2" v-if="step === 2">

                        <h1>Step Two</h1>

                        <section class="ingredients">
                            <div id="ingr">
                                <draggable :options="{group:'people'}" @start="drag=true" @end="drag=false">
                                    <div class="column is-3" style="text-align: left;">
                                        <h2 class="title is-4">Ingredients</h2>
                                    </div>
                                    <ingredient_form @applicant="Myliste"></ingredient_form>
                                </draggable>

                                <!--<span v-cloak v-show="errors.has('ingredient[]')" class="help is-danger">@lang('errors.ingr')</span>-->
                            </div>
                        </section>


                        <button @click.prevent="prev()">Previous</button>
                        <button @click.prevent="next()">Next</button>
                    </div>
                </transition>
            </section>
        </div>
    </div>

</template>

<script>
    export default {
        props: ["Myliste"],
        data: function () {
            return {
                step: 1,
                counter: 0,
                titre_recette: "",
                univers: "",
                liste: [
                    {
                        name: '',
                        qtt: '',
                    }
                ],
            };
        },
        methods: {
            addRow() {
                this.counter++;
                this.liste.push({
                    name: '',
                    qtt: '',
                });
            },

            removeRow: function (index) {
                this.counter--;
                this.liste.splice(index, 1);
            },

            prev() {
                this.step--;
            },
            next() {
                this.step++;
            },


        },
        mounted() {
            console.log('Component mounted.')
        },


    }
</script>