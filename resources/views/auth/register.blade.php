@extends('layouts.app')
@section('titrepage', "Inscription")
@section('content')
    <section class="section">

        <div class="container">
                <div class="columns">
                    <div class="column is-5 is-paddingless">
                        <div class="left_register">
                            <img src="/img/chat_mascotte.png" alt="" class="chat_hover">
                        </div>

                    </div>
                    <div class="column is-two-fifths is-paddingless">
                            <H1 class="title">Inscription</H1>

                            <div class="blockcontent">
                                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                    {{ csrf_field() }}

                                    <div class="field {{ $errors->has('pseudo') ? ' has-error' : '' }}">
                                        <label for="pseudo" class="label control-label">Pseudo</label>

                                        <div class="control">
                                            <input id="pseudo" name="pseudo" type="text" class="form-control input " value="{{ old('pseudo') }}" required autofocus>

                                            @if ($errors->has('pseudo'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('pseudo') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="field {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="label control-label">E-Mail Address</label>

                                        <div class="control">
                                            <input id="email" type="email" class="form-control input " name="email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="field {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="label control-label">Password</label>

                                        <div class="control">
                                            <input id="password" type="password" class="form-control input " name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="field ">
                                        <label for="password-confirm" class="label control-label">Confirm Password</label>

                                        <div class="control">
                                            <input id="password-confirm" type="password" class="form-control input " name="password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="field ">
                                        <div class="control is-centered">
                                            <button type="submit" class="button is-primary  is-large">
                                                Inscription
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>

    </section>

@endsection
