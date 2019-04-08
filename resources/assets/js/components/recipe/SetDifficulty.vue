<template>
    <div class="field">
        <div class="control">
            <div class="select is-fullwidth">
                <select required name="difficulty" id="difficulty">
                    <option disabled value="">Difficulté</option>
                    <option v-for="(item, index) in this.difficulty" value="{{index}}">
                        {{item}}
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
    }
</script>
