<template>
    <on-click-outside :do="handleClickOutside">
        <div class="relative w-48 ">
            <button @click="open = !open" type="button"
                    class="w-full block text-black rounded px-4
                    hover:text-main
                    focus:outline-0 cursor-pointer">
                <slot name="buttontext">
                </slot>
                <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                    <i class="fas fa-caret-down"></i>
                </div>
            </button>
            <transition
                    name="custom-classes-transition"
                    enter-active-class="animated slideInDown faster"
                    leave-active-class="animated fadeOutUp faster"
            >
                <div v-show="open"
                     class="absolute mt-px z-10 text-sm text-center text-grey-darker leading-normal rounded bg-purple border p-4">
                    <slot name="menuelems">
                    </slot>
                </div>
            </transition>
        </div>
    </on-click-outside>
</template>

<script>
    import OnClickOutside from "./OnClickOutside.vue";

    export default {
        name: "DropDown",
        components: {
            OnClickOutside
        },
        data() {
            return {
                open: false
            };
        },
        methods: {
            handleClickOutside() {
                if (this.open) {
                    this.open = false;
                }
            }
        }
    }
</script>

<style scoped>

</style>