@extends('layouts.app.app')

@section('content')
    <div class="pt-4">
        <div class="container">
            <section class="section blockcontent">

                @include("media.index.bread")


                    <div class="flex mb-4">
                        <div class="flex-1">
                            <section class="hero">
                                <div class="hero-body">
                                    <div class="container">
                                        <h1 class="title">
                                            Tous les médias
                                        </h1>
                                        <h2 class="subtitle">

                                        </h2>
                                    </div>
                                </div>
                            </section>
                            @include("media.index.list")
                        </div>
                    </div>
            </section>
        </div>
    </div>

@endsection
