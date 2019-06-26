@extends('layouts.admin')
@section('titrepage', 'Admin')
@section('content')
    <div class="container">
        <h1>Espace administration </h1>
        {{--        TODO : be able to add a picture for an ingredient--}}
        {{--        NOTODO : see who added them on which recipe--}}
        @if($ingredients)
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Lang</th>
                    <th>Number of use</th>
                    <th>Picture</th>
{{--                    <th>Original author</th>--}}
                </tr>
                </thead>
                <tbody>

                @foreach($ingredients as $index => $ingredient)
                    <tr>
                    <th>{{$ingredient->name}}</th>
                    <td>{{$ingredient->lang}}</td>
                    <td>{{$ingredient->recipes->count()}}</td>
                        <td></td>
                    </tr>
                @endforeach
                {{$ingredients->links()}}
            </table>
        @endif
    </div>
@endsection
