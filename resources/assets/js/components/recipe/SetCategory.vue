<template>
    <div class="field">
        <div class="control">
            <div class="select is-fullwidth">
                <select required name="difficulty" id="difficulty">
                    <option disabled value="">Category</option>
                    <option v-for="(item, index) in this.category" value="{{index}}">
                        {{item}}
                    </option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SetCategory",
        data: function () {
            return {
                categories: '',
            };
        },
        methods: {
            getCategoryList() {
                axios.get('/api/category/').then(response => {
                    this.categories = response.data;
                });
            }
        },
        mounted() {
            this.getCategoryList();
        },
    }
</script>
