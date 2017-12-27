<template>
    <transition name="modal">
        <div class="modal-mask" >
            <div class="modal-wrapper" @click="$emit('close')" >
                <div class="modal-container" @click.stop>

                    <div class="closingcross">
                        <button class="modal-default-button" @click="$emit('close')">
                            X
                        </button>
                    </div>
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

                    <div class="modal-footer">
                        <slot name="footer">
                            default footer
                        </slot>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
