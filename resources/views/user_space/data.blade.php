@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="container">


            <div class="columns">
                <div class="column round_bg" id="left_column">
                    @include('user_space.parts.menu')
                </div>
                <div class="column is-three-quarters round_bg">
                 @include("user_space.parts.account.data")
                </div>
            </div>

        </div>
    </div>
@endsection
