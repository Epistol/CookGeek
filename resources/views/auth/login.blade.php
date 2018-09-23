@extends('layouts.app_captcha')
@section('titrepage', "Connexion")
@section('content')
    <section class="section">

        <div class="container">
            <div class="columns">
                <div class="column is-5 is-paddingless">
                    <div class="left_register">
                        <img src="{{asset('/img/chat_mascotte.png')}}" alt="" class="chat_hover">
                    </div>

                </div>
                <div class="column is-two-fifths is-paddingless">
                    <H1 class="title">Connexion</H1>

                    <div class="blockcontent">
                        <div class="columns">
                            <div class="column is-three-quarters is-offset-1">
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}


                                    {{--   <a href="fb.com" class="button">Facebook</a>
                                       <a href="fb.com" class="button">Google</a>
                                       <a href="fb.com" class="button">Twi</a>

                                       <div class="is-divider" data-content="OU"></div>--}}


                                    <div class=" field form-group{{ $errors->has('identity') ? ' has-error' : '' }}">
                                        <label for="identity" class="label col-md-4 control-label">Pseudo ou Email

                                        </label>
                                        <div class="control">
                                            <input id="identity" type="text" class="input form-control" name="identity"
                                                   value="{{ old('email') }}" required autofocus>
                                        </div>
                                        @if ($errors->has('identity'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('identity') }}</strong>
                                    </span>
                                        @endif
                                    </div>


                                    <div class="field form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-4 control-label">Mot de passe</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="input form-control"
                                                   name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <a class=" help"  @click="showModal = true">
                                        Mot de passe oublié ?
                                    </a>

                                    <div class="field is-grouped is-grouped-right">
                                        <p class="control">
                                            <button  class="button is-primary " data-sitekey="{{env("RECAPTCHA_SITE_KEY")}}" data-callback="SubmitFn">
                                                Connexion
                                            </button>
                                        </p>
                                        {{-- <p class="control">
                                             <a class="button is-light">
                                                 Cancel
                                             </a>
                                         </p>--}}
                                    </div>


                                </form>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </section>

    @include("auth.donnes_perso")


@include("auth.passwords.reinit_mdp")



@endsection
