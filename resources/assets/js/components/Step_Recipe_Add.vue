<template>
    <div>
        <div class="container addrecipe">
            <div class="round_bg">
                <div class="columns">
                    <div class="column">
                        <div class="has-text-centered">
                            <h1 class="title">Ajoutez votre recette
                                <span v-cloak v-if="titre_recette" class="ajout-recette-titre"> / {{titre_recette}} </span></h1>
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
        <div  key="1" v-if="step === 1" >
            <h1>Step One</h1>
            <div class="columns">
                <div class="column is-3" style="text-align: left;">
                    <label class="title is-4">Titre de la recette  </label>
                </div>
                <div class="column">
                    <input class="input_modal blck" type="text" placeholder="" v-model="titre_recette" name="title" id="title" value=""
                           required>
                </div>
            </div>
            <button @click.prevent="next()">Next</button>
        </div>

        <div key="2" v-if="step === 2"  >

            <h1>Step Two</h1>
            <p>
                <legend for="name">Your Name:</legend>
                <input id="name" name="name" >
            </p>

            <p>
                <legend for="email">Your Email:</legend>
                <input id="email" name="email" type="email">
            </p>
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
        data: function () {
            return {
                step:1,
                counter: 0,
                titre_recette:"",
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
        }
    }
</script>