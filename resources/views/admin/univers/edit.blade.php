@extends('layouts.app.admin')
@section('content')

    <div class="container">

        <form method="POST" action="{{route("admin.universe.update", $univers->id)}}">
            @csrf
            <input type="hidden" name="_method" value="PATCH">

            <div class="flex mb-4">
                <div class="flex-1">
                    <div class="field">
                        <label class="label">Nom de l'univers</label>
                        <p class="control">
                            <input class="input" name="name" type="text" value="{{$univers->name}}">
                        </p>
                    </div>

                    <div class="field">
                        <label class="label">Description</label>
                        <p class="control">
                    <textarea id="mytextarea" name="contenu" class="textarea"
                              placeholder="Textarea">{{$univers->content}}</textarea>
                        </p>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="field">
                        <label class="label">Miniature</label>
                    </div>


                    <div class="field" style="max-height: 5rem;">
                        <label class="label">Bannière</label>
                       {{-- <add-any-picture type="no-button" send="true" url="api/universe" prefilled="" height="200"
                                         width="200" anyid="{{$univers->id}}"
                                         user="{{Auth::user()->id}}"></add-any-picture>--}}
                    </div>
                    {{--<input type="file" name="banniere" id="banniere" />--}}
                </div>
            </div>


            <div class="field is-grouped">
                <p class="control">
                    <button class="button is-primary" type="submit">Envoyer</button>
                </p>
            </div>
        </form>
    </div>

@endsection
