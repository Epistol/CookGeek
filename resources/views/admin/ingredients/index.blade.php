@extends('layouts.app.admin')
@section('titrepage', 'Ingrédients - Admin')
@section('content')
    <div class="container">
        <h1>Ingrédients</h1>
        {{--        TODO : be able to add a picture for an ingredient--}}

        <form action="{{route('admin.ingredient.deletedup')}}"
              accept-charset="UTF-8"
              method="POST"
              onsubmit="return confirm('You sure ?')">
            @csrf
        <button class="button is-primary"  type="submit">Delete duplicates</button>
        </form>
        @if($ingredients)
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Lang</th>
                    <th>Number of use</th>
                    <th>Picture</th>
                    <th style="max-width: 10%;width: 10%;">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ingredients as $index => $ingredient)
                    <tr>
                    <th>{{$ingredient->name}}</th>
                    <td>{{$ingredient->lang}}</td>
                    <td>{{$ingredient->recipes->count()}}</td>
                        <td></td>
                        <td class="is-flex">
                            @can('delete', $ingredient)
                                <form action="{{route('admin.ingredient.destroy', $ingredient->id)}}"
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
                            <a href="{{route("admin.ingredient.edit", strip_tags($ingredient->id))}}"
                               class="button is-info"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{$ingredients->links()}}

        @endif
    </div>
@endsection
