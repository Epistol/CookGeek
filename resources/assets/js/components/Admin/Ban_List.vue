<template>
    <div>

        <div class="is-lateral" style="padding:1rem">
            <form @submit.prevent="submit">

                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label for="name">Pseudo</label>
                            <input type="text" class="input" name="name" id="name" v-model="champs.name"/>
                            <div v-if="erreurs && erreurs.name" class="text-danger">{{ erreurs.name[0] }}</div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label for="email">E-mail</label>
                            <input type="email" class="input" name="email" id="email" v-model="champs.email"/>
                            <div v-if="erreurs && erreurs.email" class="text-danger">{{ erreurs.email[0] }}</div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label for="ip">IP</label>
                            <input type="ip" class="input" name="ip" id="ip" v-model="champs.ip"/>
                            <div v-if="erreurs && erreurs.ip" class="text-danger">{{ erreurs.email[0] }}</div>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label for="days">Durée</label>
                            <div class="select">
                                <select v-model="champs.days" name="days" id="days">
                                    <option disabled value="Choisissez">Choisissez</option>
                                    <option value="0">Déban</option>
                                    <option value="1">1 jour</option>
                                    <option value="2">2 jours</option>
                                    <option value="3">3 jours</option>
                                    <option value="7">1 semaine</option>
                                    <option value="14">2 semaines</option>
                                    <option value="31">1 mois</option>
                                    <option value="90">3 mois</option>
                                    <option value="365">1 an</option>
                                    <option value="definitive">Définitif</option>
                                </select>
                            </div>
                            <div v-if="erreurs && erreurs.days" class="text-danger">{{ erreurs.days[0] }}</div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label for="ip">Raison</label>
                            <textarea class="textarea" name="reason" id="reason" v-model="champs.reason"></textarea>
                            <div v-if="erreurs && erreurs.reason" class="text-danger">{{ erreurs.reason[0] }}</div>
                        </div>
                    </div>
                </div>
                <template v-if="this.champs.days">
                    <button type="submit" class="button is-primary">Bannir</button>
                </template>
                <div v-if="success" class="alert alert-success mt-3">
                    <b>Utilisateur / IP banni!</b>
                </div>

                <div v-if="choix_multiple" class="alert alert-success mt-3">
                    <b>Oups, plusieurs entrées correspondent à cet IP, quel utilisateur voulez-vous ban ?</b>

                    Ou juste bloquer l'IP ?
                    <form @submit.prevent="submitip()">
                        <button type="submit">Bloquer IP</button>
                    </form>
                </div>

            </form>

        </div>

        <h1><i class="fas fa-ban" style="color:red"></i> Utilisateurs bannis </h1>


        <table class="table is-bordered">
            <thead>
            <tr>
                <th></th>
                <th>User ID</th>
                <th>Jours</th>
                <th>Definitif</th>
                <th>Créé le</th>
                <th>Par</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>

            <tr v-for="value in this.bans">
                <td>{{ value.id }}</td>
                <td>{{ value.user_id }}</td>
                <td>{{ value.days }}</td>
                <td>{{ value.definitive }}</td>
                <td>{{ value.created_at }}</td>
                <td>{{ value.admin_id }}</td>
                <template v-if="value.days !== 0">
                    <td>
                        <button class="button is-primary" type="submit">Déban</button>
                    </td>
                </template>
                <template v-else>
                    <td>
                        <button class="button is-primary" type="submit">Ban</button>
                    </td>
                </template>

            </tr>

            </tbody>
        </table>

        <h1><i class="fas fa-ban" style="color:red"></i> IP bannis </h1>

        <table class="table is-bordered">
            <thead>
            <tr>
                <th></th>
                <th>IP</th>
                <th>Blanchi ?</th>
                <th>Créé le</th>
            </tr>
            </thead>
            <tbody>

            <tr v-for="value in this.blacklist">
                <th>{{ value.id }}</th>
                <td>{{ value.ip_address }}</td>
                <td>{{ value.whitelisted }}</td>
                <td>{{ value.created_at }}</td>
            </tr>

            </tbody>
        </table>

    </div>
</template>

<script>
	export default {
		props: ['blacklist', 'bans'],
		data() {
			return {
				champs: {},
				erreurs: {},
				success: false,
				choix_multiple: false,
				retour: {},
				loaded: true,
				action: '',
			}
		},
		methods: {
			submit() {
				if(Object.keys(this.champs).length !== 0) {
					axios.post('/admin/ban/submit', this.champs).then(response => {
						if(response.data !== false) {
							if(response.data.length > 1) {
								this.success = false;
								this.choix_multiple = true;
							} else {
								this.success = true;
							}
							this.retour = response.data;
						}

					}).catch(error => {
						console.log(error.response.data);
						if(error.response.status === 422) {
							this.erreurs = error.response.data.errors || {};
						}
					});

				}

			},
			submitip() {
				console.log("ip");
			},
		}
	}
</script>

<style scoped>

</style>