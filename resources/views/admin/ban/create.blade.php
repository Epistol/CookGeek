@extends('layouts.app.admin')
@section('titrepage', 'Admin')
@section('content')

    <section class="section blockcontent">

        <div class="container">
            <form method="POST" action="{{route('admin.ban.store')}}">
                @csrf
                <h1><i class="fas fa-ban"></i>Bannir utilisateur </h1>
                <input name="user_id" type="hidden" value="{{strip_tags($user->id)}}">
                <div class="field">
                    <label class="label">Pseudo</label>
                    <div class="control">
                        <input disabled="yes" class="input" type="text" name="username"
                               placeholder="{{strip_tags($user->name)}}">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input disabled="yes" class="input" type="text" name="usermail"
                               placeholder="{{strip_tags($user->email)}}">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Raison</label>
                    <div class="control">
                        <textarea class="textarea" placeholder="Spam, comportement abusif, etc ... "
                                  name="raison"></textarea>

                    </div>
                </div>

                <datepicker :highlighted="highlighted" name="datechoisie" input-class="input"></datepicker>

                <div class="field">
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox" name="permaban">
                            Permanent ?
                        </label>
                    </div>
                </div>

                <button type="submit" class="button is-primary">Bannir</button>
            </form>

        </div>
    </section>
@endsection
