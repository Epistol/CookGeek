@extends('layouts.app.app')
@section('titrepage', "Mot de passe oublié")
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
                    <H1 class="title">Changement de mot de passe </H1>

                    <div class="blockcontent">

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                       @csrf
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="input form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Envoyer le lien de reset
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
