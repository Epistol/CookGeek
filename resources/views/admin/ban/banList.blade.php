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
        @foreach($bans as $index => $ban)
            <tr>
                <td>{{ $ban->id }}</td>
                <td>{{ $ban->name }}</td>
                <td>{{ $ban->banned_at }}</td>
                <td>{{ $ban->created_at }}</td>
                <td>{{ $ban->expired_at }}</td>
                <td><a class="button is-primary" :href="'/admin/'+$ban->id+'/unban'">Déban</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h1>IP bannis </h1>

    <div class="is-lateral" style="padding:1rem">
        <form @submit.prevent="submit">
            <div class="flex mb-4">

                <div class="flex-1">
                    <div class="field">
                        <label for="ip">IP</label>
                        <input type="ip" class="input" name="ip" id="ip" v-model="champs.ip"/>
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
        @foreach($blacklist as $index => $bl)
            <tr>
                <th>{{ $bl->id }}</th>
                <td>{{ $bl->ip_address }}</td>
                <td>{{ $bl->whitelisted }}</td>
                <td>{{ $bl->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>