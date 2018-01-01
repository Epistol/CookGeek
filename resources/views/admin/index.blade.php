@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Espace administration </h1>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        Hello


    </div>
@endsection
