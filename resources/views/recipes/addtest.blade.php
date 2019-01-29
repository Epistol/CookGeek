@extends('layouts.app_captcha')

@section('titrepage', "Ajouter une recette")

@section('content')


    <form class="form-horizontal recipe-add" enctype="multipart/form-data" method="POST"
          action="{{ route('recipe.store') }}">
        {{ csrf_field() }}
<add_recipe_form ></add_recipe_form>
    </form>



@endsection
