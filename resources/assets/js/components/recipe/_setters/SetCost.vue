<template>
    <div class="field">
        <div class="control">
            <div class="lecout">
                <p>{{ $t('Cost of making') }}</p>
                <fieldset class="rating">
                    <template v-for="(item, index) in this.cost">
                        <input type="radio" v-bind="item" :id="item"
                               :value="item" name="cost"/>
                        <label class="cost button" :for="item">
                            <i class="fas fa-dollar-sign" aria-hidden="true"></i>
                        </label>
                    </template>
                </fieldset>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SetCost",
        data: function () {
            return {
                cost: 3,
            };
        },
        methods: {},
        mounted() {
        },
    }
</script>
