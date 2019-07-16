@extends('layouts.app.app')

@section('content')
    <div class="recipeaddbg">
        <div class="container">
            <section class="section blockcontent">

                @include("media.index.bread")


                    <div class="columns">
                        <div class="column">
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
