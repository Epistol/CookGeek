<template>
    <div class="field">
        <div class="control">
            <div class="select is-fullwidth">
                <select required name="difficulty" id="difficulty">
                    <option disabled value="">Difficulté</option>
                    <option v-for="(item, index) in this.difficulties" :value="item.id">
                        {{item.name | capitalize}}
                    </option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SetDifficulty",
        data: function () {
            return {
                difficulties: '',
            };
        },
        methods: {
            getDifficultyList() {
                axios.get('/api/difficulty/').then(response => {
                    this.difficulties = response.data;
                });
            }
        },
        mounted() {
            this.getDifficultyList();
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
