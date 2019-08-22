<?php
use Illuminate\Support\Facades\Auth;
?>
@extends('layouts.app.app')
@section('content')
    <div class="section">
        <div class="container">
            <div class="flex mb-4">
                <div class="flex-1 w-2/12 is-hidden-mobile" id="left_column">
                    @include('user.user_space.parts.menu')
                </div>

                <div class="flex-1 w-3/4 is-full-mobile blockcontent" id="parameters">
                    @include("user.user_space.switch.parts.param")
                    <pre>
                <?= Auth::user()->getAllPermissions();
                        ?>
                    </pre>
                    <pre>
                <?= Auth::user()->getRoleNames();?>
                    </pre>
                </div>
            </div>
        </div>
    </div>
@endsection
