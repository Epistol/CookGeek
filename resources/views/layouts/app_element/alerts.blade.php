@if (session('errors'))
    <div class="notification alert alert-danger">
        <ul>
            @foreach (session('errors')->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('status'))
    <Notif class="notification is-success" v-if="seen" @close="seen = false">
        <span slot="text"> {{ session('status') }}</span>
    </Notif>
@endif

@if (session('alert'))
    @foreach(session('alert') as $alert)
        <Notif class="notification is-alert" v-if="seen" @close="seen = false">
            <span slot="text"> {{ $alert }}</span>
        </Notif>
    @endforeach
@endif