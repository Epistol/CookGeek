@extends('layouts.app')

@section('content')
    {{--TODO : --}}
    <section class="">
        <div class="columns">

            <div class="column is-3 left-menu ">
                @include("design.menu")
            </div>
            <div class="column page">
                <section class="color">
                    @include('design.atom.color')
                    @include('design.atom.typo')

                </section>
            </div>
        </div>
    </section>

@endsection
