<template>
    <transition name="modal">
        <div class="modal is-active">
            <!--@close="machin = false-->
            <div class="modal-background" @click="$emit('close')">
            </div>
            <div class="modal-content" @click.stop>
                <div class="boxmodal is-marginless">

                    <header class="modal-card-head">
                        <p class="modal-card-title"><slot name="header"></slot></p>
                        <button class="delete" aria-label="close" @click="$emit('close')"></button>
                    </header>
                    <section class="modal-card-body">
                        <slot name="body"></slot>
                    </section>


                    <footer class="modal-card-foot">
                        <slot name="footer">
                        </slot>
                        <!--<button class="button" @click="$emit('close')">Annuler</button>-->
                    </footer>

                </div>
            </div>
            <button class="modal-close is-large" aria-label="close" @click="$emit('close')"></button>
        </div>
    </transition>
</template>

<script>
    export default {
        mounted() {
            //console.log('Component mounted.')
        },
        data() {
            return {
            }
        },
    }
</script>
