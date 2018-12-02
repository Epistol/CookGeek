{{--Recettes ayant dans le nom la recherche --}}

@foreach($univers->chunk(2)  as  $universchunk)


    <div class="columns" style="margin-top: 2rem; margin-bottom: 2rem;">

        @foreach ($universchunk as $univers)

			<?php
			/*$img = DB::table('recipe_imgs')->where('recipe_id', '=', $univers->id)->first();
			$first = $img;
			$starsget = (new \App\Search)->explode_star($univers->id);*/
//			$type = DB::table('type_recipes')->where('id', $univers->type)->first();

			?>

            <div class="column is-6 is-result">
                <div class="columns">
                    <div class="column is-4 to-hover is-paddingless is-marginless">
                        @if(isset($type))
                            <div class="hovered">
                                <a class="tag" style="margin:0.5rem"
                                   href="{{route("type.show", lcfirst($type->name))}}">{{$type->name}}</a>
                            </div>
                        @endif


                    </div>
                    <div class="column is-7">
                        <div class=" is-flex">
                            <a href="{{url('/recette/'.$univers->name)}}"><h2 class="title">
                                    @php echo str_limit($univers->name, 20, ' (...)'); @endphp
                                </h2></a>
                        </div>
                        <div class="liste_recettes">
                            {{-- Ingredients--}}

                        </div>

                    </div>
                    <div class="column is-1 ">
                        <div class="top">

                        </div>
                        <div class="middle">

                        </div>
                        <div class="bottom">
                            <like-recipe :recipeid="'{{$univers->id}}'" :userid="'{{ Auth::id() }}'"></like-recipe>
                        </div>

                    </div>
                </div>
            </div>


        @endforeach


    </div>


@endforeach
<span>
                 {{--{{ $univers->links() }}--}}
        </span>

