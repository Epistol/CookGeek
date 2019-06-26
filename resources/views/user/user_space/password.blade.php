@extends('layouts.app.app')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column " id="left_column">
                    @include('user.user_space.parts.menu')
                </div>
                <div class="column is-three-quarters blockcontent">
                    @lang('account.my-account')
                    <form href="{{route('account.password.change')}}">
                        @include('user.user_space.switch.parts.password')
                        <button type="submit" class="button is-primary">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
