<template>
    <div id="create-recipe">
        <div class="background-round">
            <div class="columns">
                <div class="column has-text-centered">
                    <h1 class="title">{{ $t('Create your recipe')}}
                        <span v-cloak v-if="titre" class="ajout-recette-titre"> /  @{{titre}} </span>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Create"
    }
</script>

<style scoped>

</style>