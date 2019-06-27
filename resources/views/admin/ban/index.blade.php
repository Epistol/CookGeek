@extends('layouts.app.admin')
@section('titrepage', 'Admin')
@section('content')
    <section class="section blockcontent">
        <div class="container">
            @include('admin.ban.banList')
        </div>
    </section>
    <section class="section blockcontent">

        <div class="container">
            <h1><i class="fas fa-band-aid"></i> IP whitelist </h1>

            <table class="table is-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>IP</th>
                    <th>Blanchi ?</th>
                    <th>Créé le</th>
                </tr>
                </thead>
                <tbody>
                @foreach($whitelist as $key => $r)
                    <tr>
                        <td>{{ $r->id }}</td>
                        <td>{{ $r->ip_address }}</td>
                        <td>{{ $r->whitelisted }}</td>
                        <td>{{ Carbon\Carbon::parse($r->created_at)->format('d/m/Y') }} </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </section>
    <section class="section blockcontent">

        <div class="container">
            <h1><i class="fas fa-users"></i> Toutes IP</h1>


            <table class="table is-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>IP</th>
                    <th>Blanchi ?</th>
                    <th>Créé le</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user_ip as $key => $r)
                    <tr>
                        <td>{{ $r->id }}</td>
                        <td>{{ $r->ip_address }}</td>
                        <td>{{ $r->whitelisted }}</td>
                        <td>{{ Carbon\Carbon::parse($r->created_at)->format('d/m/Y') }} </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </section>
@endsection
