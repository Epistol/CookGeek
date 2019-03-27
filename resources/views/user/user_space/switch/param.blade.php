<?php
use Illuminate\Support\Facades\Auth;
?>
@extends('layouts.app.app')

@section('content')

    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-2 " id="left_column">
                    @include('user.user_space.parts.menu')
                </div>
                <?= Auth::user()->getAllPermissions();?>

                <div class="column is-three-quarters blockcontent" id="parameters">
                            @include("user.user_space.switch.parts.account.param")
                </div>
            </div>
        </div>
    </div>
@endsection
