<template>
    <transition name="modal">
        <div class="modal is-active">
            <div class="modal-background" @click="$emit('close')">
            </div>
            <div class="modal-content" @click.stop>
                <div class="boxmodal is-marginless">

                    <section class="modal-card-body">
                        <template v-if="network === 'twitter' ">
                            <!--<a :href="'https://www.facebook.com/sharer/sharer.php?u='+url">Sur facebook</a>-->
                            <vue-friendly-iframe :src="'https://twitter.com/intent/tweet?text='+titre+'%20'+url"></vue-friendly-iframe>
                        </template>
                    </section>

                    <footer class="modal-card-foot">
                        <slot name="footer">

                        </slot>
                        <button class="button">Annuler</button>
                    </footer>

                </div>
            </div>
            <button class="modal-close is-large" aria-label="close" @click="$emit('close')"></button>
        </div>
    </transition>
</template>

<script>
    export default {
	    props : ["url", "network", "titre"],

	    mounted() {
            //console.log('Component mounted.')

        }
    }
</script>
