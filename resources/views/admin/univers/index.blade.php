@extends('layouts.app.admin')
@section('content')

    <h1 class="title">Liste des univers</h1>
    <a href="{{route('admin.page.create')}}" class="button is-primary">+ Ajouter un univers</a>
    <table class="table">
        <thead>
        <tr>
            <th><abbr title="Position">Id</abbr></th>
            <th>Nom</th>
            <th><abbr title="Won">Date</abbr></th>
            <th>Auteur</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($univers as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td><a href="{{route('univers.show', $value->name)}}">{{ strip_tags($value->name) }}</a></td>
                <td>{{ Carbon\Carbon::parse($value->created_at)->format('d/m/Y H:i:s ') }} </td>
                <td> {{ $value->first_creator }}
                </td>
                <td class="is-flex">
                    @can('delete', $value)
                        <form action="{{route('admin.universe.destroy', $value->id)}}"
                              accept-charset="UTF-8"
                              method="POST"
                              onsubmit="return confirm('You sure ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="button is-danger
                                                       has-icon-text btn-left-align full-width">
                                <i class="fas fa-trash-alt" aria-hidden="true"></i>
                            </button>
                        </form>
                    @endcan
                    <a href="{{route("admin.universe.edit", strip_tags($value->id))}}"
                       class="button is-info"><i class="fas fa-edit"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
