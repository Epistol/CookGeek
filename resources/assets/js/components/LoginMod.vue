<template>
    <transition name="modal">
        <div class="modal is-active" >
            <div class="modal-background" @click="$emit('close')" >
            </div>
            <div class="modal-content" @click.stop>
                <div class="boxmodal is-marginless">

                    <div class="modal-header">
                        <slot name="header">
                            default header
                        </slot>
                    </div>

                    <div class="modal-body">
                        <slot name="body">
                            default body
                        </slot>
                    </div>

                </div>
                <div class="modal-footer" >
                    <slot name="footer">
                        default footer
                    </slot>
                </div>
            </div>
            <button class="modal-close is-large" aria-label="close"  @click="$emit('close')"></button>
        </div>
    </transition>
</template>

<script>
    export default {
        mounted() {
            //console.log('Component mounted.')
        }
    }
</script>
