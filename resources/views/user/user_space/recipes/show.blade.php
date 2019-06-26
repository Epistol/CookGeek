@extends('layouts.app.app')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column " id="left_column">
                    @include('user.parts.menu')
                </div>
                <div class="column is-three-quarters ">
                    <div class="blockcontent" id="recipes_created">
                        <h2 class="title">
                            @lang('common.my_recipes')
                        </h2>
                        <table class="table is-hoverable">
                            <thead>
                            <tr>
                                <th>@lang('common.name')</th>
                                <th>@lang('common.image')</th>
                                <th><abbr title="@lang('common.image')">@lang('common.image')</abbr></th>
                                <th><abbr title="@lang('common.title')">@lang('common.title')</abbr></th>
                                <th><abbr title="@lang('recipe.diff')">@lang('recipe.diff')</abbr></th>
                                <th><abbr title="@lang('recipe.budget')">@lang('recipe.budget')</abbr></th>
                                <th><abbr title="@lang('recipe.time_needed')">@lang('recipe.time_needed')</abbr></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($user->recipes)
                                @foreach ($user->recipes()->paginate(25) as $recipe)
                                    @include('recipes.index.single_line')
                                @endforeach
                                {{$recipes->links()}}
                            @endif
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