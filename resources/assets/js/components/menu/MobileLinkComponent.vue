<template>
    <div>
        <a :href="url" v-bind:class="{'text-main' : active}" class="text-black">
            <slot>

            </slot>
        </a>
    </div>
</template>

<script>
    export default {
        name: "MobileLinkComponent",
        props: {
            url: null,
            active : false,
        }
    }
</script>

<style scoped>

</style>