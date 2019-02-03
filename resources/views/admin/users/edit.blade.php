@extends('layouts.admin')
@section('titrepage', 'Admin')
@section('content')
    <div class="container">
        <h1>Edit l'utilisateur : {{str_limit(strip_tags(clean($user->name)), 20, '...')}}</h1>

        <section class="section">

            @foreach($user->getAttributes() as $key => $r)
                @if($key !== "password" && $key !== "remember_token")
                <div class="field">
                    <label class="label">{{$key}}</label>
                    <div class="control">
                        <input class="input" value="{{strip_tags(clean($r)) }}">
                    </div>
                </div>
                @endif
            @endforeach
        </section>


    </div>
@endsection