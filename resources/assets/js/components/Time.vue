<template>
    <Clock :blink="false" :displaySeconds="false" />
</template>

<script>
    import Clock from 'vue-digital-clock'

    export default {
        components: {
            Clock,
        },
        name : "fulltime"
    }
</script>