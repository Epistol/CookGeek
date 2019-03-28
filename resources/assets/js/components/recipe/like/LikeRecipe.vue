<template v-cloak>
    <div>
        <a class="button tag like tooltip" :data-tooltip="nbLike" :class="{ 'liked': retour !== false }"
           @click="clickLike()">
            <i class="material-icons">favorite</i><span hidden>Ajouter aux favoris</span>
        </a>
        <template v-if="!user && clicked">
            <login-modal :showModal="this.clicked" @close="closing()" ></login-modal>
        </template>
    </div>
</template>

<script>
    import modal from "./ModalView.vue";
    import LoginModal from "./LoginModal.vue";

    export default {
        props: ["recipeid", "userid"],
        data: function () {
            return {
                counter: 0,
                retour: '',
                nbLike: '',
                clicked: false,

            };
        },
        components: {
            modal, LoginModal
        },
        methods: {
            async toggleLike() {
                if (this.userid) {
                    axios.post('/api/like/toggle_like/', {
                        recipeid: this.recipeid,
                        userid: this.userid
                    }).then(response => {
                        this.retour = response.data;
                    });
                } else {
                    console.log("pas connecté");
                    this.retour = false;
                }
            },
            clickLike() {
                this.clicked = true;
                if (this.userid) {
                    axios.post('/api/like/toggle_like/', {
                        recipeid: this.recipeid,
                        userid: this.userid
                    }).then(response => {
                        this.retour = response.data;
                    });
                } else {
                    console.log("pas connecté");
                }
            },
            async is_already_liked() {
                if (this.userid) {
                    axios.post('/api/like/check_liked/', {
                        recipeid: this.recipeid,
                        userid: this.userid
                    }).then(response => {
                        this.retour = response.data;
                    });
                } else {
                    this.retour = false;
                }
            },
            async getNbLike() {
                if (this.userid) {
                    axios.post('/api/like/nblike/', {recipeid: this.recipeid}).then(response => {
                        this.nbLike = response.data;
                    });
                } else {
                    this.nbLike = false;
                }
            },
            closing(){
                this.clicked = false;
            }
        },
        mounted() {
            this.is_already_liked();
            this.getNbLike();
        },

        computed: {
            countminus: function () {
                return this.counter - 1;
            },
        },

    }
</script>
