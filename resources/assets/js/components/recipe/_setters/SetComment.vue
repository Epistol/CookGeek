<template>
    <div class="field">
        <label class="label">Commentaire</label>
            <div class="control">
                <label for="comment"></label>
                <textarea class="textarea" v-model="this.comment" rows="2"
                          placeholder="Un petit mot à rajouter ? " value=""
                          name="comment" id="comment"></textarea>
            </div>
    </div>
</template>

<script>
    export default {
        name: "SetComment",
        data() {
            return {
                comment: ''
            }
        },
    }
</script>

<style scoped>

</style>