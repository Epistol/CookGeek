<template>
    <div class="field">
        <div class="control type-selector cc-selector">
            <div class="field-label" style="text-align: left;padding-bottom: 2rem;">
                <label class="label">Média</label>
            </div>
            <div class="columns is-multiline">
                <div class="column is-flex has-text-centered">
                    <template v-for="(item, index) in this.medias">
                        <input type="radio" :id="'choice-'+item.id"
                               name="type" :value="item.id" v-model="choice">
                        <label type="button" :class="'drinkcard-cc '+item.name" :for="'choice-'+item.id">{{item.name  | capitalize  }}</label>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SetMedia",
        data: function () {
            return {
                medias: '',
                choice: '',
            };
        },
        methods: {
            getCategoryList() {
                axios.post('/api/universe/mediaTypes/').then(response => {
                    console.log(response);
                    this.medias = response.data;
                });
            }
        },
        mounted() {
            this.getCategoryList();
        },
        filters: {
            capitalize: function (value) {
                if (!value) {
                    return '';
                }
                value = value.toString();
                return value.charAt(0).toUpperCase() + value.slice(1)
            }
        }
    }
</script>

<style scoped>

</style>