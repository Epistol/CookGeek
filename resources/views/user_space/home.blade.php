@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="container">


            <div class="columns">
                @include('user_space.parts.menu')
                <div class="column">
                    Second column
                </div>
            </div>

        </div>
    </div>
@endsection
