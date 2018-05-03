@extends('layouts.app')

@section('content')
    {{--TODO : --}}
    <section class="">
        <div class="columns">

            <div class="column is-3 left-menu ">
                @include("design.menu")
            </div>
            <div class="column page  ">
                {{--@include("design.ariane", ['some' => 'data'])--}}
                {{--@include("design.content")--}}

                Hohoho
            </div>
        </div>
    </section>

@endsection
