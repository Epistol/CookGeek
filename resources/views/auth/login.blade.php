@extends('layouts.app.app_no_container')
@section('titrepage', "Connexion")
@section('content')

    <section class="section">
        <div class="flex">
            <div class="w-full sm:w-4/12 ">
                <div class="left-register h-full flex justify-center items-center flex-wrap flex-col">
                    <img src="{{asset('/img/chat_mascotte.png')}}" alt="" class="chat-hover">
                    <div>
                        <h2>Hello there !</h2>
                        <p>Rentrez vos identifiants et commencez votre journée gustative avec nous !</p>
                    </div>
                    <div>
                        <a href="{{url('/register')}}" class="button is-primary ">
                            @lang('common.register')
                        </a>
                    </div>

                </div>
            </div>
            <div class="w-full sm:w-8/12 ">
                <h1 class="title p-6 text-center">@lang('auth.log_to') {{config('app.long_name')}}</h1>
                <div class="blockcontent">
                    <div class="flex mb-4">
                        <div class="flex-1 w-10/12 is-offset-1">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                @include('auth.socials')
                                <p>@lang('auth.orlogviamail')</p>
                                <div class="field form-group{{ $errors->has('identity') ? ' has-error' : '' }}">
                                    <label for="identity"
                                           class="label col-md-4 control-label">@lang('common.name-or-mail')
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
                                    <label for="password"
                                           class="label col-md-4 control-label">@lang('common.password')</label>

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

                                <a class="help" href="{{url('/password/reset')}}">
                                    @lang('passwords.forgot')
                                </a>

                                <label class="checkbox" for="remember">
                                    <input class="checkbox form-check-input" type="checkbox" checked="login"
                                           name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    @lang('common.rememberme')
                                </label>


                                <div class="field is-grouped is-grouped-right">
                                    <p class="control">
                                        <button class="button is-primary "
                                                data-sitekey="{{env("RECAPTCHA_SITE_KEY")}}"
                                                data-callback="SubmitFn">
                                            @lang('common.login')
                                        </button>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @include("auth.donnes_perso")

            </div>
        </div>
    </section>
    @include("auth.passwords.reinit_mdp")
@endsection
