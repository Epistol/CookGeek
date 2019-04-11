@extends('layouts.admin')
@section('titrepage', 'Admin')
@section('content')
    <div class="container">
        <h1>Recettes</h1>

        <a href="{{route('recipe.create')}}" class="button is-primary">+ Ajouter une recette</a>

        <section class="section">
            <table class="table is-striped  is-bordered is-hoverable">
                <thead>
                <tr>
                    <th><input type="checkbox"/></th>
                    <th>Id</th>
                    <th>Titre</th>
                    <th>Difficulty</th>
                    <th>Type de recette</th>
                    <th>Cost</th>
                    <th>Univers</th>
                    <th>Média</th>
                    <th>Création</th>
                    <th>Vues</th>
                    <th>Validée</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($recipes as $key => $r)
                    <tr>
                        <td><input type="checkbox"/></td>
                        <td>{{strip_tags(clean($r->id)) }}</td>
                        <td>{{strip_tags(clean( $r->title ))}}</td>
                        <td>{{ strip_tags(clean($r->difficulty)) }}</td>
                        <td>
                            <?php $type = DB::table("type_recipes")->where('id', $r->type)->first();?>
                            {{strip_tags(clean($type->name))}}
                        </td>
                        <td>
                            {{strip_tags(clean($r->cost))}}
                        </td>
                        <td>
                            <?php $univ = DB::table("univers")->where('id', $r->univers)->first();?>
                            @if($univ)
                                {{strip_tags(clean($univ->name))}}
                            @endif
                        </td>
                        <td>
                            <?php $media = DB::table("categunivers")->where('id', $r->type_univers)->first();?>
                            @if($media)
                                {{strip_tags(clean($media->name))}}
                            @endif
                        </td>

                        <td>{{ Carbon\Carbon::parse($r->created_at)->format('d/m/Y') }} </td>
                        <td>
                            {{strip_tags(clean($r->nb_views))}}
                        </td>
                        @if($r->validated === 1)
                            <td style="background:green">
                                Oui
                        @else
                            <td style="background:red">
                                Non
                                @endif
                            </td>
                            <td>
                                <a href="{{route("admin.recipe.edit", strip_tags(clean($r->id)))}}"
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
