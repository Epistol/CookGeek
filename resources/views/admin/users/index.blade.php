@extends('layouts.app.admin')
@section('titrepage', 'Admin')
@section('content')
    <div class="container">
        <h1>Utilisateurs</h1>
        <div class="flex mb-4">
            <div class="flex-1">
                <div class="card">
                    <div class="card-content">
                        <span class="title w-5/12">Total utilisateurs</span>
                        <br />
                        <span class="title w-2/12">{{$users->count()}}</span>
                    </div>
                </div>
            </div>
            <div class="flex-1">
                <div class="card">
                    <div class="card-content">
                        <span class="title w-5/12">Nouveaux utilisateurs (ce mois-ci)</span>
{{--                        <br />--}}
{{--                        <span class="subtitle w-full">(durant le mois en cours)</span>--}}
                        <br />
                        <span class="title w-2/12">{{$users->where('created_at', '>=',
                         Carbon\Carbon::now()->subMonth()->format('d/m/Y'))->count()}}</span>
                    </div>
                </div>
            </div>
            <div class="flex-1">
                <div class="card">
                    <div class="card-content">
                        <span class="title w-5/12">Utilisateurs actifs</span>
<!--                        --><?php //dd($users);?>
{{--                        <line-chart :chartdata="{{$users}}"></line-chart>--}}
                    </div>
                </div>
            </div>
        </div>

        <a href="{{route('admin.page.create')}}" class="button is-primary">+ Ajouter un utilisateur </a>

        <section class="section">
            <table class="table is-striped is-bordered cursor-pointer ">
                <thead>
                <tr>
                    <th><abbr title="Position">Id</abbr></th>
                    <th>Pseudo</th>
                    <th><abbr title="Played">Email</abbr></th>
                    <th><abbr title="Won">Creation</abbr></th>
                    <th>Nb visites</th>
                    <th>Nb recettes</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $key => $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }} </td>
                        <td>
                            {{$user->nb_visites}}
                        </td>
                        <td>
                            <?php
                            $rec = DB::table('recipes')->where('id_user', $user->id)->count();
                            ?>
                            {{$rec}}
                        </td>
                        <td>
                            <a href="{{route("admin.user.show", $user->id)}}" class="button is-info"><i
                                        class="fas fa-eye"></i></a>
                            <a href="{{route("admin.user.edit", $user->id)}}" class="button is-info"><i
                                        class="fas fa-edit"></i></a>
                            <a href="{{route("admin.ban.create", $user->id)}}" class="button is-info"><i
                                        class="fas fa-ban"></i></a>
                            <a href="{{route("admin.user.destroy", $user->id)}}" class="button is-info"><i
                                        class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </section>
        {{ $users->links() }}

    </div>
@endsection
