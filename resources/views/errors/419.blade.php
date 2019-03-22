@extends('layouts.app.app404')
@section('titrepage', "Erreur 404 : page introuvable")
@extends('errors::layout')
@section('title', 'Page Expired')
@section('message')
    La page a expiré à cause d'une trop longue inactivité.
    <br/><br/>
    Rafraichissez la page et essayez à nouveau.
@stop