<template>
    <div class="">
        <template v-for="(item, index) in steps">
            <div class="flex">
                <div class="w-2/12">
                    <span>Etape {{index+1}}</span>
                </div>
                <div class="w-8/12">
                        <textarea class="input_modal blck" type="text"
                                  @keyup.tab="addStep()" v-model="item.instruction" rows="4" name="step[]"
                                  id="step[]"></textarea>
                </div>
                <div class="w-2/12 is-flex-center" v-cloak v-if="index === (steps.length-1)">
                    <a @click="addStep()" class="button is-primary  is-small icon-delete">
                        <i class="fa fa-plus" aria-hidden="true"></i></a>
                </div>
                <div class="w-2/12  is-flex-center" v-cloak v-else-if="index === (steps.length-2)">
                    <a @click="removeStep(index)" class="button is-small icon-delete">
                        <i class="fa fa-minus" aria-hidden="true"></i></a>
                </div>
                <div class="" v-cloak v-else>
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
        name : 'stepsadd',
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
