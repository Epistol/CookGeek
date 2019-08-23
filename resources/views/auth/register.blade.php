@extends('layouts.app.app')
@section('titrepage', "Inscription")
@section('content')
    <section class="section">

        <div class="container">
            <div class="flex mb-4">
                <div class="flex-1 w-2/3 ">
                    <div class="left-register">
                        <img src="/img/chat_mascotte.png" alt="" class="chat-hover">
                    </div>

                </div>
                <div class="flex-1 w-2/5 ">
                    <H1 class="title">Inscription</H1>

                    <div class="blockcontent">
                        <form id="formulaire" class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            @include('auth.socials')

                            <div class="field {{ $errors->has('pseudo') ? ' has-error' : '' }}">
                                <label for="pseudo" class="label control-label">Pseudo</label>

                                <div class="control">
                                    <input id="pseudo" name="pseudo" type="text" class="form-control input "
                                           value="{{ old('pseudo') }}" required autofocus>

                                    @if ($errors->has('pseudo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pseudo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="field {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="label control-label">Adresse email </label>

                                <div class="control">
                                    <input id="email" type="email" class="form-control input " name="email"
                                           value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="field {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="label control-label">Mot de passe </label>

                                <div class="control">
                                    <input id="password" type="password" class="form-control input " name="password"
                                           required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="field ">
                                <label for="password-confirm" class="label control-label">Répétez votre mot de passe (au
                                    cas où)</label>

                                <div class="control">
                                    <input id="password-confirm" type="password" class="form-control input "
                                           name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="field ">
                                <div class="control is-centered">
                                    <validationform></validationform>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>

    @include("auth.donnes_perso")
@endsection
