<template>
    <div>
        <span class="tag" @click="showModal = true" style="cursor:pointer">
            <span class="icon has-text-warning" style="padding-right: 0.5rem">
                <i class="fas fa-exclamation-triangle"></i>
            </span>
            Signaler
        </span>


        <transition name="modal" v-if="showModal">
            <div class="modal is-active">
                <div class="modal-background" @click="showModal = false">
                </div>
                <div class="modal-content" @click.stop>
                    <div class="boxmodal is-marginless">

                        <div class="modal-container">

                            <header class="modal-header modal-card-head">
                                <slot name="header">
                                    <p class="modal-card-title">Un problème avec la recette ? </p>
                                </slot>
                                <button class="delete" aria-label="close" @click="reset()"></button>
                            </header>
                        </div>

                        <section class="modal-card-body">
                            <template v-if="!next">
                                <div class="control">
                                    <div class="radio-vertical" v-for="item in items">
                                        <input type="radio" :id="item.type" name="choix" :value="item.type"
                                               v-model="option"/>
                                        <label class="radio" :for="item.type">{{ item.message }}</label>
                                    </div>
                                </div>
                            </template>

                            <template v-if="next">
                                <template v-if="option === 'ortho'">
                                    <p>Nous prenons note de votre signalement et allons vérifier cela !</p>
                                </template>
                                <!--<template v-if="option === 'interest'">
                                    <p>Nous masquerons cette recette pour vous désormais !</p>
                                </template>-->
                                <template v-if="option === 'spam'">
                                    <p>Nous prenons note de votre signalement et allons vérifier cela !</p>
                                </template>

                                <template v-if="option === 'image' || option === 'propos' ">
                                    <p>Nous prenons note de votre signalement et allons vérifier cela !</p>
                                </template>
                                <template v-if="option === 'autre' && step === 1 ">
                                    <textarea class="textarea" v-model="alert_txt"
                                              placeholder="Par exemple : cette recette est une blague de mauvais goût"></textarea>
                                </template>
                                <template v-if="option === 'autre' && step === 2">
                                    <p>Nous prenons note de votre signalement et allons vérifier cela !</p>
                                </template>
                            </template>
                        </section>
                        <section class="conduite">
                            <p><a href=""> Notre code de conduite</a> | <a href="">Signalement des infractions à nos
                                règles</a></p>

                        </section>
                        <template v-if="!finished">
                            <footer class="modal-card-foot">
                                <slot name="footer">

                                </slot>
                                <div class="columns">
                                    <div class="column">
                                        <template v-if="next && !finished">
                                            <button class="button" @click="backwardform()">Precedent</button>
                                        </template>
                                    </div>
                                    <div class="column">
                                        <template v-if="!finished ">
                                            <button class="button is-primary" @click="continueform()">Suivant</button>
                                        </template>
                                    </div>
                                </div>

                            </footer>
                        </template>
                    </div>
                </div>

                <button class="modal-close is-large" aria-label="close" @click="reset()"></button>
            </div>
        </transition>

    </div>

</template>

<script>
	export default {
		props: ["recipeid", "user_id"],
        name : "signalrecipe",
		data() {
			return {
				componentshow: false,
				showModal: false,
				next: false,
				step: 0,
				option: false,
				alert_txt: "",
				retour: "",
				items: [
					{message: 'Elle comporte des fautes d\'orthographe', type: 'ortho'},
					// {message: 'Elle ne m\'intéresse pas', type: 'interest'},
					{message: 'Elle est suspecte ou contient du spam', type: 'spam'},
					{message: 'L\'image en avant n\'est pas appropriée / sensible', type: 'image'},
					{message: 'Les propos sont inappropriés ou dangereux', type: 'propos'},
					{message: 'Autre', type: 'autre'},
				]
			}
		},

		methods: {
			sendAlert() {
				axios.post('/api/recipe/alerte/', {
					recipeid: this.recipeid,
					userid: this.user_id,
					type_alerte: this.option,
					user_content: this.alert_txt,
				}).then(response => {
					this.retour = response.data;
				});
			},
			reset() {
				this.showModal = false;
				this.next = false;
				this.option = false;
				this.alert_txt = '';
				this.retour = "";
				this.step = 0;
			},
			continueform() {
				this.step++;
				this.next = true;
			},
			backwardform() {
				this.step--;
				this.next = false;
			}
		},
		computed: {
			finished: function() {
				if(this.next) {
					if(this.option !== 'autre') {
						this.sendAlert();
						return true;
					} else {
						if(this.step === 2) {
							this.sendAlert();
							return true;
						}
					}
				}
				return false;
			}
		}

	}
</script>

<style scoped>

</style>