@extends('layouts.app')

@section('content')
    {{--TODO : --}}
    <section class="section">
        <div class="columns">
            <div class="column is-one-quarter">
                @include("design.menu")
            </div>
            <div class="column">
                {{--@include("design.ariane", ['some' => 'data'])--}}
                {{--@include("design.content")--}}

                Hohoho
            </div>
        </div>
    </section>

@endsection
