@extends('layouts.app.admin')
@section('titrepage', 'Admin')
@section('content')

    <section class="section blockcontent">

        <div class="container">
            <form method="POST" action="{{route('admin.unban.store')}}">
                @csrf
                <h1><i class="fas fa-ban"></i>Débannir utilisateur </h1>
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

                <button type="submit" class="button is-primary">Déban</button>
            </form>

        </div>
    </section>
@endsection
