<template>
    <div class="field">
        <div class="control">
            <div class="select is-fullwidth">
                <select required name="difficulty" id="difficulty">
                    <option disabled value="">Categorie</option>
                    <option v-for="(item, index) in this.categories" :key="item.id" :value="item.id">
                        {{item.name | capitalize}}
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
                axios.get('/api/recipe/category/').then(response => {
                    this.categories = response.data;
                    // console.log(response.data);
                });
            }
        },
        mounted() {
            this.getCategoryList();
        },
        filters: {
            capitalize: function (value) {
                if (!value) return '';
                value = value.toString();
                return value.charAt(0).toUpperCase() + value.slice(1);
            }
        }
    }
</script>
