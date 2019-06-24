<?php
use Illuminate\Support\Facades\Auth;
?>
@extends('layouts.app.app')
@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-2-desktop is-hidden-mobile is-4-tablet " id="left_column">
                    @include('user.user_space.parts.menu')
                </div>

                <div class="column is-three-quarters-desktop is-full-mobile blockcontent" id="parameters">
                    @include("user.user_space.switch.parts.param")
                    <pre>
                <?= Auth::user()->getAllPermissions();?>
                    </pre>
                    <pre>
                <?= Auth::user()->getRoleNames();?>
                    </pre>
                </div>
            </div>
        </div>
    </div>
@endsection
