@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="container">


            <div class="columns">
                <div class="column " id="left_column">
                    @include('user.show.menu')

                </div>
                <div class="column is-three-quarters ">
                    <div class="blockcontent">
                        <h2 class="title">
                            Recettes créées
                        </h2>
                    </div>
                    <div class="blockcontent">
                        <h2 class="title">
                            Commentaires
                        </h2>
                    </div>

                </div>

            </div>

        </div>
    </div>



@endsection
