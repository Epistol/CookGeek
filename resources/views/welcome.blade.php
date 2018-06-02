@extends('layouts.app')

@section('content')
    <div class="container">
        {{--TODO : Changer ça vite fait--}}

            <section class="section">
                @include("recipes.index.formulaire")

            </section>
            @include("recipes.index.partype")
            @include("recipes.index.favorise")

            {{--<img src="{{ asset('/img/tempo/img1.png')}}" style="margin-left: auto;--}}
	{{--margin-right: auto;--}}
	{{--display: block;">--}}

     <div>
         {{--<img src="{{ asset('/img/tempo/img2.png')}}" style="margin-left: auto;--}}
	{{--margin-right: auto;--}}
	{{--display: block;">--}}
     </div>

    </div>
@endsection
