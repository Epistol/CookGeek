@extends('layouts.app.app')

@section('content')
    <div class="container">
        <div class="flex mb-4">
            <div class="flex-1 w-full">
                <div class="blockcontent">
                    @include("recipes.index.trending")
                </div>
                <div class="blockcontent">
                    @include("recipes.index.all")
                    @include("univers.preview.preview")
                </div>
            </div>

        </div>
    </div>

    <script type="application/ld+json">
{
  "@context":"https://schema.org",
  "@type":"ItemList",
  "itemListElement":[

      @foreach($recipes as $nombre => $recipe)
            {
              "@type":"ListItem",
              "position":{{$nombre + 1}},
      "url":"{{route('recipe.show', strip_tags($recipe->slug))}}"
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
