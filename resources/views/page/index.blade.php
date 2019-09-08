@extends('layouts.app.admin')


@section('content')

    <h1 class="title">Liste des pages</h1>

    <a href="{{route('admin.page.create')}}" class="button is-primary">+ Ajouter une page</a>

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
                <td><a href="{{route('page.show', $value->id)}}">{{ $value->name }}</a></td>
                <td>{{ strip_tags($value->slug) }}</td>
                <td>{{ Carbon\Carbon::parse($value->created_at)->format('d-m-Y H:i:s ') }} </td>
                <td><a class="btn btn-small btn-info"
                       href="{{ route('page.edit',  $value->id ) }}">Editer</a>
                </td>
                <td>
                    <form method="POST" action="/admin/page/{{$value->id}}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="caution">
                            <button class="button is-danger" @click="showModal = true">Supprimer</button>
                        </div>
                    </form>


                </td>
            </tr>
        @endforeach

        </tbody>
    </table>



@endsection
