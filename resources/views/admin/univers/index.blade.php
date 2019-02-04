@extends('layouts.admin')


@section('content')

    <h1 class="title">Liste des univers</h1>

    <a href="{{route('page.create')}}" class="button is-primary">+ Ajouter un univers</a>

    <table class="table">
        <thead>
        <tr>
            <th><abbr title="Position">Id</abbr></th>
            <th>Nom</th>
            <th><abbr title="Won">Date</abbr></th>
            <th>Editer</th>
            <th>Supprimer</th>
            <th>Auteur</th>
        </tr>
        </thead>
        <tbody>
        @foreach($univers as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td><a href="{{route('univers.show', $value->name)}}">{{ strip_tags(clean($value->name)) }}</a></td>
                <td>{{ Carbon\Carbon::parse($value->created_at)->format('d-m-Y H:i:s ') }} </td>
                <td><a class="btn btn-small btn-info"
                       href="{{ route('admin.universe.edit',  $value->id ) }}">Editer</a>
                </td>
                <td>
                    <form method="POST" action="/admin/univers/{{$value->id}}">
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
