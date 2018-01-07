@extends('layouts.admin')
@section('titrepage', 'Admin')
@section('content')
    <div class="container">
        <h1>Utilisateurs</h1>

        <a href="{{route('page.create')}}" class="button is-primary">+ Ajouter un membre </a>




        <table class="table">
            <thead>
            <tr>
                <th><abbr title="Position">Id</abbr></th>
                <th>Pseudo</th>
                <th><abbr title="Played">Email</abbr></th>
                <th><abbr title="Won">Creation</abbr></th>
                <th>Actions</th>
                <th>Nb visites</th>
                <th>Nb recettes</th>
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
                                <a href="{{route("admin.user.edit", $user->id)}}" class="button is-info">Voir plus</a>


                    {{--    <form method="POST" action="/admin/page/{{$user->id}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="caution">
                                <modal v-if="showModal" @close="showModal = false">
                                    <p>Yo</p>
                                </modal>
                                <button class="button is-warning" @click="showModal = true">Alerte</button>
                            </div>
                        </form>
--}}

                    </td>
                    <td>
                        {{$user->nb_visites}}
                    </td>
                    <td>
                        <?php
                        $rec = DB::table('recipes')->where('id_user', '=', $user->id)->count();
                        ?>
                        {{$rec}}
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        {{ $users->links() }}

    </div>
@endsection
