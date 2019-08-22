@extends('layouts.app.app404')
@section('titrepage', "Erreur 404 : page introuvable")
@section('content')

    <div class="flex mb-4">
        <div class="flex-1 w-1/12 is-offset-2">
            <div class="err404">
                <span class="404">            </span>
            </div>
        </div>
        <div class="flex-1 w-2/12 ">
            <div class="err404">
                <p id="sorry">
                    @guest
                        I’m sorry, Dave.
                    @else
                        I’m sorry, {{ Auth::user()->name}}.
                    @endif
                </p>
            </div>
        </div>
        <div class="flex-1 w-3/12 ">
            <div class="err404">
                <p>
                    I’m afraid I can’t do that.
                </p>
            </div>
        </div>


    </div>
    <div class="big-bg-404">

    </div>
    <div class="big-404">
    <span class="full-404">
        404
    </span>
        <div style="display:flex;justify-content:center;align-items:flex-end;">
            <a class="button quatre" href="/">
                ACCUEIL
            </a>
            <a class="button quatre" href="{{ url()->previous() }}">
                RETOUR
            </a>
        </div>

    </div>

    <div class="eye eye_watching">
    </div>
@endsection