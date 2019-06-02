<template>
    <div class="column">
        <template v-for="(item, index) in steps">
            <div class="columns">
                <div class="column is-1">
                    <span>Etape {{index+1}}</span>
                </div>
                <div class="column">
                    <div class="columns">
                        <div class="column is-10">
                        <textarea class="input_modal blck" type="text"
                                  @keyup.tab="addStep()" v-model="item.instruction" rows="4" name="step[]"
                                  id="step[]"></textarea>
                        </div>
                        <div class="column is-2 is-flex-center" v-cloak v-if="index === (steps.length-1)">
                            <a @click="addStep()" class="button is-primary  is-small icon-delete">
                                <i class="fa fa-plus" aria-hidden="true"></i></a>
                        </div>
                        <div class="column is-2  is-flex-center" v-cloak v-else-if="index === (steps.length-2)">
                            <a @click="removeStep(index)" class="button is-small icon-delete">
                                <i class="fa fa-minus" aria-hidden="true"></i></a>
                        </div>
                        <div class="" v-cloak v-else>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                counter: -1,
                steps: []
            };
        },
        methods: {
            addStep() {
                this.counter++;
                this.steps.push(
                    {
                        instruction: '',
                        images: {},
                        video: '',
                        type: ''
                    },
                );
            },
            removeStep: function (index) {
                this.counter--;
                this.steps.splice(index, 1);
            },
        },
        mounted() {
            this.addStep();
        },
    }
</script>
