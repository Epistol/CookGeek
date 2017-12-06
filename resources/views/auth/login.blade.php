@extends('layouts.app')

@section('content')
    <section class="section">

        <div class="container">
            <div class="columns">
                <div class="column is-5 is-offset-1 is-paddingless">
                    <div class="left_register">
                        <img src="/img/chat_mascotte.png" alt="">
                    </div>

                </div>
                <div class="column is-two-fifths is-paddingless">
                    <H1 class="title">Connexion</H1>

                    <div class="blockcontent">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

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
        </div>

    </section>

@endsection
