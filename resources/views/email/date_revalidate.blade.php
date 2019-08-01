@extends('layouts.emails')

@section('title')
    La date du routage a été modifiée
@stop

@section('content')
    Bonjour,
    <br/>
    @if(isset($routage->send_wish))
        <br/>Le routage {{ $routage->name }} est désormais prévu pour le {{ $routage->send_wish->format('d/m/Y H:i') }}.
    @else
        <br/>Le routage {{ $routage->name }} est déprogrammé.
    @endif
    <br/>
    <br/>Merci
@stop
