@extends('layouts.app_design')

@section('content')
    {{--TODO : --}}
        <div class="columns">

            <div class="column is-3 left-menu ">
                @include("design.menu")
            </div>
            <div class="column page">
                <div class="container">
                <section class="section">
                    @include('design.atom.color')
                </section>
                <section class="section">
                    @include('design.atom.typo')
                </section>
                <section class="section">
                    {{--@include('design.atom.image')--}}
                </section>
                <section class="section">
                    @include('design.atom.icones')
                </section>
                </div>
            </div>
        </div>
@endsection
