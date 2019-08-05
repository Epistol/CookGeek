@extends('layouts.app.app')

@section('content')
    <div class="section">
        <div class="container">
            <div class="flex mb-4">
                <div class="flex-1 " id="left_column">
                    @include('user.user_space.parts.menu')
                </div>
                <div class="flex-1 is-three-quarters blockcontent">
                    @lang('account.my-account')
                </div>
            </div>
        </div>
    </div>
@endsection
