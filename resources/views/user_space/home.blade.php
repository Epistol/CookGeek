@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="container">


            <div class="columns">
                <div class="column " id="left_column">
                    @include('user_space.parts.menu')
                </div>
                <div class="column is-three-quarters blockcontent">
               ACCUEIL
                </div>
            </div>

        </div>
    </div>
@endsection
