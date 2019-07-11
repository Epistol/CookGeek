<template>
    <password
            v-model="password"
            :toggle="true"
            @feedback="showFeedback"
            :name="name"
    />
</template>

<script>
    import Password from 'vue-password-strength-meter'
    export default {
        components: { Password },
        data: () => ({
            password: null
        }),
        name : "password",
        props: {
            name: {
                type: String,
                default: null,
            },
        },
        methods: {
            showFeedback ({suggestions, warning}) {
                console.log('🙏', suggestions)
                console.log('⚠', warning)
            },
            showScore (score) {
                console.log('💯', score)
            }
        }
    }
</script>