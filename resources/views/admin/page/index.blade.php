@extends('layouts.admin')


@section('content')

    <a href="{{route('page.create')}}" class="button is-primary">+ Ajouter une page</a>

    <table class="table">
        <thead>
        <tr>
            <th><abbr title="Position">Id</abbr></th>
            <th>Nom</th>
            <th><abbr title="Played">Slug</abbr></th>
            <th><abbr title="Won">Date</abbr></th>
            <th>Editer</th>
            <th>Supprimer</th>
            <th>Auteur</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pages as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->slug }}</td>
                <td>{{ Carbon\Carbon::parse($value->created_at)->format('d-m-Y H:i:s ') }} </td>
                <td><a class="btn btn-small btn-info"
                       href="{{ URL::to('admin/page/' . $value->id . '/edit') }}">Editer</a>
                </td>
                <td>
                    <form method="POST" action="/admin/page/{{$value->id}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="caution">
                            <modal v-if="showModal" @close="showModal = false">
                                <p>Yo</p>
                            </modal>
                            <button class="button is-danger" @click="showModal = true">Supprimer</button>
                        </div>
                    </form>


                </td>
            </tr>
        @endforeach

        </tbody>
    </table>



@endsection
