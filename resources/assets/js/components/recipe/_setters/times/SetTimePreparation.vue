<template>
    <div class="field prep is-clearfix">
        <label class="label"><i class="fas fa-utensils" aria-hidden="true"></i><span
                class="timing">Temps de préparation</span></label>
        <div class="field-body">
            <div class="field has-addons">
                <div class="control">
                    <input class="input" id="prep_heure" name="prep_heure" type="number" placeholder="0" value="" min="0"
                           pattern="[0-9]">
                </div>
                <div class="control">
                    <a class="button is-static">
                        heure(s)
                    </a>

                </div>
            </div>
            <div class="field has-addons">
                <div class="control">
                    <input class="input" id="prep_minute" name="prep_minute" type="number" placeholder="0" value="" min="0"
                           pattern="[0-9]">
                </div>
                <div class="control">
                    <a class="button is-static">
                        minute(s)
                    </a>

                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "SetTimePreparation"
    }
</script>

<style scoped>

</style>