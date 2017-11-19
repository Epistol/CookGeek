@extends('layouts.app')

@section('content')
    <div class="recipeaddbg">
        <div class="container">
            <section class="section ">

                <nav class="breadcrumb" aria-label="breadcrumbs">
                    <ul>
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#">Recettes</a></li>
                        <li><a href="#">{{$recette->getType()}}</a></li>
                        <li class="is-active"><a href="#" aria-current="page">{{$recette->title}}</a></li>
                    </ul>
                </nav>
                <div style="    align-items: center;    justify-content: center; display: flex;">
                    <h1 class="title">{{$recette->title}}</h1>

                </div>
                <hr>
            </section>



        </div>
    </div>

@endsection
