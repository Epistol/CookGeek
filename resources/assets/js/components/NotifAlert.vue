<template>
    <transition name="fade" v-cloak >
        <section class="section" >
            <div class="notification"  @click="$emit('close')"  :class="title">
                <button class="delete" @click="$emit('close')"></button>
                {{this.content}}
            </div>
        </section>
    </transition>

</template>

<script>
    export default {
        mounted() {
            // console.log('Component mounted.')
        },

        props: ['title', 'content'],
        methods: {
        }

    }
</script>
