<template>
    <div class="field">
        <div class="control type-selector cc-selector">
            <div class="field-label" style="text-align: left;padding-bottom: 2rem;">
                <label class="title is-4">Média</label>
            </div>

            <div class="columns is-multiline">
                <div class="column has-text-centered">

                    <label class="radio" v-for="(item, index) in this.medias ">
                        <input type="radio" :id="index"
                               name="type" :value="item">
                        <label :class="'drinkcard-cc'+item" :for="index"></label>
                    </label>
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
            };
        },
        methods: {
            getCategoryList() {
                axios.get('/api/mediaTypes/').then(response => {
                    this.medias = response.data;
                });
            }
        },
        mounted() {
            this.getCategoryList();
        },
    }
</script>

<style scoped>

</style>