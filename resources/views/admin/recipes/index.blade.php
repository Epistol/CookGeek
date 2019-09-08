@extends('layouts.app.admin')
@section('titrepage', 'Admin')
@section('content')
    <div class="container">
        <h1>Recettes</h1>

        <a href="{{route('recipe.create')}}" class="button is-primary">+ Ajouter une recette</a>

        <section class="section">
            <table class="table is-striped  is-bordered cursor-pointer">
                <thead>
                <tr>
                    <th><input type="checkbox"/></th>
                    <th>Id</th>
                    <th>Titre</th>
                    <th>Difficulty</th>
                    <th>Type de recette</th>
                    <th>Cost</th>
                    <th>@lang('recipe.univers')</th>
                    <th>Média</th>
                    <th>Création</th>
                    <th>Vues</th>
                    <th>Validée</th>
                    <th style="max-width: 10%;width: 10%;">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($recipes as $key => $r)
                    <tr>
                        <td><input type="checkbox"/></td>
                        <td>{{strip_tags($r->id) }}</td>
                        <td>{{strip_tags( $r->title )}}</td>
                        <td>{{ strip_tags($r->difficulty) }}</td>
                        <td>
                            {{strip_tags($r->types->name)}}
                        </td>
                        <td>
                            {{strip_tags($r->cost)}}
                        </td>
                        <td>
                            @if($r->universes->count() > 0)
                            @foreach($r->universes as $universe)
                                    <a href="{{route('univers.show', $universe->id)}}">
                                        {{strip_tags($universe->name)}}
                                    </a>
                                @endforeach
                            @endif
                        </td>
                        <td>
                                {{strip_tags($r->typeuniverse->name)}}
                        </td>

                        <td>{{ Carbon\Carbon::parse($r->created_at)->format('d/m/Y') }} </td>
                        <td>
                            {{strip_tags($r->nb_views)}}
                        </td>
                        @if($r->validated === 1)
                            <td class="valid" style="background:green">
                                Oui
                        @else
                            <td class="unvalid">
                                Non
                                @endif
                            </td>
                            <td class="is-flex">
                                @can('delete', $r)
                                    <form action="{{route('admin.recipe.destroy', $r->id)}}"
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
                                <a href="{{route("admin.recipe.edit", strip_tags($r->id))}}"
                                   class="button is-info"><i class="fas fa-edit"></i></a>
                            </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>
        {{ $recipes->links() }}
    </div>
@endsection
