@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-12">
                <div class="blockcontent is-paddingless">
                    <div class="is-flex-center">
                        <h1 class="title-website"><?= env('APP_LONG_NAME');?></h1>
                    </div>
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
