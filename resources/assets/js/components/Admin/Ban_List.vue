<template>
    <div>
        <h1><i class="fas fa-ban" style="color:red"></i> Utilisateurs bannis </h1>

        <table class="table is-bordered">
            <thead>
            <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>Bani le</th>
                <th>Ban créé le</th>
                <th>Ban expire le</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="value in this.bans">
                <td>{{ value.id }}</td>
                <td>{{ value.name }}</td>
                <td>{{ value.banned_at }}</td>
                <td>{{ value.created_at }}</td>
                <td>{{ value.expired_at }}</td>
                       <td> <a  class="button is-primary"  :href="'/admin/'+value.id+'/unban'">Déban</a></td>
            </tr>
            </tbody>
        </table>

        <h1>IP bannis </h1>

        <div class="is-lateral" style="padding:1rem">
            <form @submit.prevent="submit">
                <div class="columns">

                    <div class="column">
                        <div class="field">
                            <label for="ip">IP</label>
                            <input type="ip" class="input" name="ip" id="ip" v-model="champs.ip"/>
                            <div v-if="erreurs && erreurs.ip" class="text-danger">{{ erreurs.email[0] }}</div>
                        </div>
                    </div>
                </div>

            </form>

        </div>


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
				user_names: {},
				success: false,
				choix_multiple: false,
				retour: {},
				ipChoixBan: [],
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
			async get_name(user_id) {
				var that = this;

				return axios.post('/api/user/getName', {
					user_id: user_id
				}).then(response => {
					// console.log(response);
					that.user_names.push(response.data);

				}).catch(error => {
				});
			}
		},
	}
</script>
