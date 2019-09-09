<template>
    <div class="bg-main fixed z-50 left-0 right-0 bottom-0 w-full sm:hidden md:hidden lg:hidden"
         id="navbarMobile"
         :class="{ 'navbar--hidden': !showNavbar }">

        <nav class="w-full mobile-bottom-menu" role="navigation" aria-label="main navigation">
            <div class="p-4 h-16 flex w-full items-center flex-row justify-between shadow">
                <slot>
                    <!-- Ici le contenu courant -->
                </slot>
            </div>
        </nav>
    </div>
</template>

<script>

    export default {
        name: "MobileMenuComponent",
        components: {},
        data() {
            return {
                showNavbar: true,
                lastScrollPosition: 0
            }
        },
        mounted() {
            // window.addEventListener('scroll', this.onScroll)
        },
        beforeDestroy() {
            // window.removeEventListener('scroll', this.onScroll)
        },
        methods: {
            onScroll() {
                const currentScrollTop = window.pageYOffset || document.documentElement.scrollTop;

                console.log("////");
                console.log(currentScrollTop);
                console.log(this.lastScrollPosition);
                console.log("////");

                if (currentScrollTop < 0) {
                    return
                }
                // Stop executing this function if the difference between
                // current scroll position and last scroll position is MORE than some offset
                if (Math.abs(currentScrollTop + this.lastScrollPosition) < 60) {
                    return
                }
                this.showNavbar = currentScrollTop < this.lastScrollPosition;
                this.lastScrollPosition = currentScrollTop
            }
        }
    }
</script>

<style scoped>
    #navbarMobile {
        transform: translate3d(0, 0, 0);
        transition: 0.1s all ease-out;
    }

    #navbarMobile.navbar--hidden {
        box-shadow: none;
        transform: translate3d(0, 100%, 0);
    }
</style>