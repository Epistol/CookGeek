@extends('layouts.admin')
@section('titrepage', 'Admin')
@section('content')
    <div class="container">
        <h1>Recettes</h1>

        <a href="{{route('page.create')}}" class="button is-primary">+ Ajouter une recette</a>




        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Difficulty</th>
                <th>Type de recette</th>
                <th>Cost</th>
                <th>Univers</th>
                <th>Média</th>
                <th>Création</th>
                <th>Vues</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($recipes as $key => $r)
                <tr>
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->title }}</td>
                    <td>{{ $r->difficulty }}</td>
                    <td>
                        <?php $type = DB::table("type_recipes")->where('id', $r->type)->first();?>
                       {{$type->name}}
                    </td>
                    <td>
                        {{$r->cost}}
                    </td>
                    <td>
                        <?php $univ = DB::table("univers")->where('id', $r->univers)->first();?>
                            {{$univ->name}}
                    </td>
                    <td>
                        <?php $media = DB::table("categunivers")->where('id', $r->type_univers)->first();?>
                        {{$media->name}}
                    </td>


                    <td>{{ Carbon\Carbon::parse($r->created_at)->format('d/m/Y') }} </td>
                    <td>
                        {{$r->nb_views}}
                    </td>
                    <td>
                                <a href="{{route("admin.user.edit", $r->id)}}" class="button is-info">EDIT</a>
                    </td>


                </tr>
            @endforeach

            </tbody>
        </table>

        {{ $recipes->links() }}


    </div>
@endsection
