<template>
    <button class="button is-primary " v-on:click="SubmitFn">
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
        name : "validationform",
        methods: {
            SubmitFn: function (event) {
                grecaptcha.ready(function () {
                    grecaptcha.execute(process.env.mix.MIX_INVISIBLE_RECAPTCHA_SITEKEY, {action: 'action_name'})
                        .then(function (token) {
                            $.ajax({
                                type: "POST",
                                url: "https://www.google.com/recaptcha/api/siteverify",
                                data: {token: token},
                                success: function (response) {
                                    if (response === true) {
                                        document.getElementById("formulaire").submit();
                                    }
                                }
                            });
                        });
                });
            }
        }
    }
</script>
