@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="section">
            <div style="    align-items: center;    justify-content: center; display: flex;">
                <h1 class="title ">Ajoutez votre recette</h1>
            </div>

            <hr>
        </section>


        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}


            <div class="columns">
                <div class="column is-marginless is-paddingless left_recipe_add is-two-fifths">
                    <div class="field">
                        <div class="file is-centered is-boxed has-name">

                            <label class="file-label">
                                {{-- Fichier input--}}




                                <input class="file-input" id="upload"  type="file" name="resume">
                                <span class="file-cta">
                                    <span class="file-icon">
                                      <i class="fa fa-upload"></i>
                                    </span>
                                    <span class="file-label">
                                      Ajouter une photo
                                    </span>
                                  </span>
                                {{-- Nom du fichier--}}
                                {{--           <input id="filename" class="file-name" disabled>--}}
                            </label>

                        </div>
                        <div class="image ajout_recette_img">
                            <img id="blah" src="#" alt="" />
                        </div>


                    </div>
                    <div class="field">

                        <div class="control">
                            <input class="input_modal" type="text" placeholder="Nom de la recette">
                        </div>
                    </div>


                </div>

                <div class="column">

                </div>





                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">Submit</button>
                    </div>
                    <div class="control">
                        <button class="button is-text">Cancel</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection
