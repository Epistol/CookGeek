@extends('layouts.admin')
@section('titrepage', 'Admin')
@section('content')
    <div class="container">
        <h1>Utilisateurs</h1>

        <a href="{{route('page.create')}}" class="button is-primary">+ Ajouter un membre </a>

        <section class="section">
            <table class="table is-striped is-bordered is-hoverable ">
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
                        {{--<td> <a class="btn btn-small btn-info" href="{{ URL::to('admin/page/' . $value->id . '/edit') }}">Editer</a>--}}
                        {{--</td>--}}

                        <td>
                            {{$user->nb_visites}}
                        </td>
                        <td>
							<?php
							$rec = DB::table('recipes')->where('id_user', '=', $user->id)->count();
							?>
                            {{$rec}}
                        </td>
                        <td>
                            <a href="{{route("user.show", $user->name)}}" class="button is-info"><i class="fas fa-eye"></i></a>
                            <a href="{{route("admin.user.edit", $user->id)}}" class="button is-info"><i class="fas fa-edit"></i></a>
                            <a href="{{route("admin.ban.create", $user->id)}}" class="button is-info"><i class="fas fa-ban"></i></a>
                            <a href="{{route("admin.user.destroy", $user->id)}}" class="button is-info"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </section>
        {{ $users->links() }}

    </div>
@endsection
