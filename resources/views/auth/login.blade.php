@extends('layouts.app')

@section('content')

  {{--  A faire : <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i></span>
    <input class="form-control" type="text" placeholder="Email address">
    </div>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
        <input class="form-control" type="password" placeholder="Password">--}}

    <div class="onboard_login">
        <div class="columns is-marginless	">
            <div class="column is-two-fifths left_login_side">
                <img id="chat_horizontal" src="img/chat_mascotte.png">
            </div>
            <div class="column right_login_side">
                <div class=" roundwhite">

                    <div class="panel-heading">Connexion</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">



                            <div class=" field form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="label col-md-4 control-label">Pseudo ou Email.

                                </label>
                                <div class="control">
                                    <input id="email" type="email" class="input form-control" name="email" value="{{ old('email') }}" required autofocus>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="field form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="input form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="button is-primary">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection