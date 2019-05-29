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
<!--                --><?//= Auth::user()->getRoleNames();?>
                <div class="column is-three-quarters blockcontent" id="parameters">
                    @include("user.user_space.switch.parts.param")
                </div>
            </div>
        </div>
    </div>
@endsection
