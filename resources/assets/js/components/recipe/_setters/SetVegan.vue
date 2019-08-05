<template>
    <div class="field vegan is-horizontal">
        <div style="width: 100%;">
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input id="switchNormal"
                               type="checkbox"
                               name="vegan" class="switch  rounded-full is-success">
                        <label for="switchNormal"> <i class="fas fa-leaf" aria-hidden="true"></i> Vegan
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SetVegan"
    }
</script>

<style scoped>

</style>