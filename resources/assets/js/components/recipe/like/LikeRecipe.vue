<template v-cloak>
    <div>
        <a class="rounded-full like tooltip" :data-tooltip="nbLike" :class="{ 'liked': retour !== 0 }"
           @click="toggleLike()">
            <i class="fas fa-heart"></i><span hidden>Ajouter aux favoris</span>
        </a>
        <template v-if="!userid && clicked">
            <login-modal :showModal="this.clicked" @close="closing()"></login-modal>
        </template>
    </div>
</template>

<script>
    import LoginModal from "../../modal/LoginModal";

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
        name : "LikeRecipe",
        components: {
            LoginModal
        },
        methods: {
            async toggleLike() {
                if (this.userid) {
                    axios.post('/like/toggleLikeRecipe/', {
                        recipeid: this.recipeid,
                        userid: this.userid
                    }).then(response => {
                        if (response.data.original.status === 'ok') {
                            this.retour = response.data.original.value;
                        }
                        this.getNbLike();
                    });
                } else {
                    this.retour = false;
                }
            },
            async is_already_liked() {
                if (this.userid) {
                    axios.post('/like/checkLikedRecipe/', {
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
                    axios.post('/like/nbLikeRecipe/', {recipeid: this.recipeid})
                        .then(response => {
                            this.nbLike = response.data;
                        });
                } else {
                    this.nbLike = false;
                }
            },
            closing() {
                this.clicked = false;
            }
        },
        mounted() {
            this.is_already_liked();
            this.getNbLike();
        },
        computed: {},
    }
</script>
