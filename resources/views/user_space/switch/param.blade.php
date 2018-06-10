@extends('layouts.app')

@section('content')

    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-2 "  id="left_column">
                    @include('user_space.parts.menu')
                </div>

                <div class="column is-three-quarters blockcontent">
                    <b-tabs position="is-centered" class="block">
                        <b-tab-item label="Paramètres">
                            @include("user_space.switch.parts.account.param")
                        </b-tab-item>
                        {{--<b-tab-item label="Mes informations">--}}
                            {{--@include("user_space.switch.parts.account.info")--}}
                        {{--</b-tab-item>--}}
                        {{--<b-tab-item label="Données">--}}
                            {{--@include("user_space.switch.parts.account.data")--}}
                        {{--</b-tab-item>--}}
                    </b-tabs>

                </div>
            </div>
        </div>
    </div>
@endsection
