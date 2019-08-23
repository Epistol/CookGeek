@extends('layouts.app.app')
@section('titrepage', "Mot de passe oublié")
@section('content')


    <section class="section">

        <div class="container">
            <div class="flex mb-4">
                <div class="flex-1 w-5/12 ">
                    <div class="left-register">
                        <img src="/img/chat_mascotte.png" alt="" class="chat-hover">
                    </div>

                </div>
                <div class="flex-1 w-2/5 ">
                    <h1 class="title">Changement de mot de passe </h1>

                    <div class="blockcontent">

                        <form  class="form-horizontal"  method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">@lang('auth.mail_adress')</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">@lang('auth.password') </label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="input form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">@lang('auth.password_confirm')  </label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="input form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4" style="margin-top: 5%;">
                                    <button type="submit" class="button is-link btn btn-primary">
                                        Sauvegarder
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
