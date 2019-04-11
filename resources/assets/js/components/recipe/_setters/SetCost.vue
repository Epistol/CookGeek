<template>
    <div class="field">
        <div class="control">
            <div class="lecout">
                <p>{{ $t('Cost of making') }}</p>
                <fieldset class="rating">
                    <input type="radio" v-for="(item, index) in this.cost" :id="item"
                           :value="item" name="cost"/>
                    <label class="cost button" :for="item">
                        <i class="fas fa-dollar-sign" aria-hidden="true"></i>
                    </label>
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
