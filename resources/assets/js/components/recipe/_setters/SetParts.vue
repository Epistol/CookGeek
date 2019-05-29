<template>
    <div class="field parts is-clearfix">
        <label class="label"><i class="fa fa-child" aria-hidden="true"></i><span class="parts">Pour</span></label>
        <div class="field-body">
            <div class="field has-addons">
                <div class="control">
                    <input class="input" id="unite_part" name="unite_part" type="number" placeholder="ex : 4">
                </div>
                <div class="control">
                    <input class="input" id="value_part" name="value_part" type="text"
                           placeholder="personnes, parts, etc" value="">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SetParts"
    }
</script>

<style scoped>

</style>