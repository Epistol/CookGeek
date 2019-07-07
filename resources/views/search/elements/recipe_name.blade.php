{{--Recettes ayant dans le nom la recherche --}}
<div class="columns is-multiline" style="margin-top: 3rem; margin-bottom: 2rem;">
    @foreach ($result['recipe'] as $recipe)
        <?php
        $starsget = (new \App\Search)->explode_star($recipe->id);
        $type = DB::table('type_recipes')->select('name')->where('id', $recipe->id)->first();
        ?>

        <div class="column is-10 is-offset-1 is-result">
            <div class="columns">
                <div class="column is-4 to-hover is-paddingless is-marginless">
                    @if(isset($type))
                        <div class="hovered">
                            <a class="tag" style="margin-left: 0.5rem; margin-right:0.5rem"
                               href="/{{strtolower($type->name)}}">{{$type->name}}</a>
                        </div>
                    @endif
                    @include('recipes.elements.picture')
                </div>
                <div class="column is-7 is-paddingless is-marginless">
                    <div class="top is-flex">
                        <a href="{{route('recipe.show', $recipe->slug)}}">
                            <h2 class="title">
                                {{strip_tags(clean($recipe->title))}}
                            </h2>
                        </a>
                    </div>
                    <div class="middle">
                        {{-- Ingredients--}}
                        <?php
                        $ingredients = DB::table('recipes_ingredients')
                            ->where('id_recipe', $recipe->id)
                            ->get();
                        ?>
                        <p><b>@lang("recipe.ingredients") : </b>
                            @foreach($ingredients as $index=>$in)
                                <?php
                                $nom_in = DB::table('ingredients')
                                    ->where('id', $in->id_ingredient)
                                    ->value('name');
                                ?>
                                @if($loop->last)
                                    {{$nom_in}}
                                @else
                                    {{$nom_in}},
                                @endif
                            @endforeach
                        </p>
                    </div>
                    <div class="bottom">
                        <div class="is-flex">
                            @include("recipes.index.author")<br/>
                            @include('recipes.elements.note')
                        </div>
                    </div>

                </div>
                <div class="column is-1 is-marginless is-paddingless">
                    <div class="top">
                        <?php
                        $typeuniv = DB::table('categunivers')
                            ->where('id', $recipe->type_univers)
                            ->first();
                        ?>
                        @include("recipes.show.type_univers_no_tool")
                    </div>
                    <div class="middle">

                    </div>
                    <div class="bottom">
                        <a class="tag like
                                " id="{{$recipe->id}}" verif="{{ csrf_token() }}"><i
                                    class="material-icons">favorite</i></a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<span>
                 {{ $result['recipe']->links() }}
        </span>

