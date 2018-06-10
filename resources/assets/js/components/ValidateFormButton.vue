<template>
    <button class="button is-primary is-large" v-on:click="SubmitFn">
        <slot name="text">
        Inscription
        </slot>
    </button>


</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            SubmitFn: function (event) {
                grecaptcha.ready(function() {
                    grecaptcha.execute('6Le3UV0UAAAAAC7lpn-K7fr5gxI2qjNUe4Kf3tAU', {action: 'action_name'})
                        .then(function(token) {
                            $.ajax({
                                type: "POST",
                                url: "https://www.google.com/recaptcha/api/siteverify",
                                data: { token: token },
                                success: function (response) {
                                    if (response === true) {
                                        document.getElementById("formulaire").submit();

                                    }
                                }
                            });
                        });
                });
                // `this` fait référence à l'instance de Vue à l'intérieur de `methods`
                // alert('Bonjour  !')

            }
        }

    }
</script>
