<template>
    <transition name="vodal-zoom">
        <div>
            <ModalView v-if="showModal" @keyup.esc="$emit('close')" @close="$emit('close')" v-cloak>
                <h3 slot="header">Connexion</h3>
                <div slot="body">
                    <template v-if="this.sent === false">
                        <form v-on:submit.prevent="onSubmit">
                            <div class="columns">
                                <div class="column is-5 is-paddingless">
                                    <img src="/img/chat_mascotte.png" alt="Login cat" class="">
                                </div>
                                <div class="column is-5 is-offset-1 is-paddingless">
                                    <div class=" field form-group">
                                        <label for="email" class="label col-md-4 control-label">Pseudo ou Email
                                        </label>
                                        <div class="control">
                                            <input id="email" class="input form-control" name="email"
                                                   v-model="pseudo" required autofocus>
                                        </div>
                                    </div>

                                    <div class="field form-group">
                                        <label for="password" class="col-md-4 control-label">Mot de passe</label>
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="input form-control"
                                                   v-model="mdp" name="password" required>
                                        </div>
                                    </div>
                                    <div class="columns">
                                        <div class="column">
                                            <a class=" help">
                                                Mot de passe oublié ?
                                            </a>
                                        </div>
                                        <div class="column">
                                            <div class="field is-grouped ">
                                                <p class="control">
                                                    <button class="button is-primary " type="submit">
                                                        Connexion
                                                    </button>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </template>
                    <template v-else>
                    <span v-if="errorCode === 422">
                        <template v-for="erreur in this.errorMsg.errors">
                             {{ erreur[0]}}
                        </template>
                    </span>
                        <span v-if="isLogged">
                        Vous êtes bien connecté ! La page va recharger pour vous permettre de continuer.
                    </span>
                    </template>
                </div>
            </ModalView>
        </div>
    </transition>
</template>

<script>

    import ModalView from "./ModalView";

    export default {
        name: "login-modal",
        props: ['showModal', 'url'],
        components: {
            ModalView
        },
        data() {
            return {
                'pseudo': '',
                'mdp': '',
                'sent': false,
                'errorCode': '',
                'errorMsg': '',
                'isLogged': false,
                'closing': false,

            }
        },
        methods: {
            onSubmit() {
                this.errorCode = '';
                this.errorMsg = '';
                return axios.post('/login', {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    identity: this.pseudo,
                    password: this.mdp,
                }).then(response => {
                    this.sent = true;
                    console.log(response);
                    if (response.status === 200) {
                        this.isLogged = true;
                    }
                }).catch(error => {
                    this.sent = true;
                    if (error.response) {
                        this.errorCode = error.response.status;
                        this.errorMsg = error.response.data;
                    }
                });
            },
        },
        watch: {
            showModal: function () {
                if (this.showModal === false) {
                    this.sent = false;
                }
            },
            isLogged: function () {
                if (this.isLogged === true) {
                    setTimeout(function () {
                        document.location.href = window.location.pathname;
                    }, 500);
                }
            }
        }

    }
</script>

<style scoped>

</style>