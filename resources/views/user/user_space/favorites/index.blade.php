@extends('layouts.app.app')

@section('content')

    <div class="section">
        <div class="container">
            <div class="flex mb-4">
                <div class="flex-1 w-2/12 " id="left_column">
                    @include('user.user_space.parts.menu')
                </div>
                <div class="flex-1 is-three-quarters blockcontent">
                    <h1>@lang('account.fav.title') </h1>
                    <h2 class="subtitle"> @lang('account.fav.subtitle')</h2>
                    @include("user.user_space.recipes.double_list_small_recipe")
                </div>
            </div>
        </div>
    </div>
@endsection
