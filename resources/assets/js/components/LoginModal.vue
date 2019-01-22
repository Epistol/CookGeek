<template>
    <div>
        <modal v-if="showModal = true" @keyup.esc="showModal = false" v-cloak>
            <h3 slot="header">Connexion</h3>
            <div slot="body">

                <div class="columns">
                    <div class="column is-5 is-paddingless">
                            <img src="/img/chat_mascotte.png" alt="Login cat" class="">
                    </div>
                    <div class="column is-two-fifths is-paddingless">
                        <div class="blockcontent">
                            <div class="columns">
                                <div class="column is-three-quarters is-offset-1">

                                    <div class=" field form-group">
                                        <label for="email" class="label col-md-4 control-label">Pseudo ou Email
                                        </label>
                                        <div class="control">
                                            <input id="email" type="email" class="input form-control" name="email"
                                                   value="" required autofocus>
                                        </div>
                                    </div>


                                    <div class="field form-group">
                                        <label for="password" class="col-md-4 control-label">Mot de passe</label>
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="input form-control"
                                                   name="password" required>
                                        </div>
                                    </div>

                                    <a class=" help">
                                        Mot de passe oublié ?
                                    </a>

                                    <div class="field is-grouped is-grouped-right">
                                        <p class="control">
                                            <button class="button is-primary ">
                                                Connexion
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </modal>
    </div>
</template>

<script>
    import Modal from './ModalView.vue';
    export default {
        name: "LoginModal",
        props: ['showModal'],
        components : {Modal},

        data() {
            return {}
        },

    }
</script>

<style scoped>

</style>