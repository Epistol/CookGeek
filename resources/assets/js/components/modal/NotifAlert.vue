<template>
    <transition name="fade" v-cloak >
        <section class="section" style="padding: 1.5rem;">
            <div class="notification"  @click="$emit('close')"  :class="title">
                <button class="delete" @click="$emit('close')"></button>
                <slot name="text"></slot>
            </div>
        </section>
    </transition>

</template>

<script>
    export default {
        mounted() {
            // console.log('Component mounted.')
        },
        name : 'notif',
        props: ['title', 'content'],
        methods: {
        }

    }
</script>
