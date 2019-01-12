@extends('layouts.app')

@section('content')
    <div class="container blockcontent is-paddingless">
        <div class="is-flex-center">
            <h1 class="title-website">Cuisine De Geek</h1>
            {{--Petite description--}}
        </div>
        {{--Most viewed universes--}}
        {{--Last recipes--}}
        @include("recipes.index.all")
        {{--@include("index.networks")--}}
        @include("univers.preview.preview")

        {{--Most viewed universes with recipes--}}
        {{--@include("recipes.index.partype")--}}
        {{--Meals--}}
        {{--@include("recipes.index.favorise")--}}

    </div>

    <script type="application/ld+json">
{
  "@context":"https://schema.org",
  "@type":"ItemList",
  "itemListElement":[

      @foreach($recipes as $nombre => $recette)
            {
              "@type":"ListItem",
              "position":{{$nombre + 1}},
      "url":"{{route('recipe.show', strip_tags(clean($recette->slug)))}}"
      @if($loop->last)
                }
            @else
                },
             @endif
        @endforeach

        ]
      }

    </script>


@endsection
