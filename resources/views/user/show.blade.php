@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="container">


            <div class="columns">
                <div class="column " id="left_column">
                    @include('user.show.menu')

                </div>
                <div class="column is-three-quarters ">
                    <div class="blockcontent" id="recipes_created">
                        <h2 class="title">
                            Recettes créées
                        </h2>

                        <table class="table is-hoverable">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th><abbr title="Media">Media</abbr></th>
                                <th><abbr title="Titre">Titre</abbr></th>
                                <th><abbr title="Difficulté">Difficulté</abbr></th>
                                <th><abbr title="Budget">Budget</abbr></th>
                                <th><abbr title="Temps nécessaire">Temps</abbr></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($recettes as $recette)
                                @include('recipes.index.single_line')
                            @endforeach
                            {{ $recettes->links() }}
                            </tbody>
                        </table>
                    </div>
                       {{-- <div class="blockcontent" id="comments">
                            <h2 class="title">
                                Commentaires
                            </h2>
                        </div>--}}

                    </div>

                </div>

            </div>
        </div>



@endsection
