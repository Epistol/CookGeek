@extends('layouts.app')

@section('content')

    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-2 " id="left_column">
                    @include('user_space.parts.menu')
                </div>

                <div class="column is-three-quarters blockcontent" id="parameters">
                            @include("user_space.switch.parts.account.param")
                </div>
            </div>
        </div>
    </div>
@endsection