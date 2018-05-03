@extends('layouts.app')

@section('content')
    {{--TODO : --}}
    <section class="">
        <div class="columns">

            <div class="column is-3 left-menu ">
                @include("design.menu")
            </div>
            <div class="column page">
                <section class="color">
                    <h1 class="title">
                        Color
                    </h1>

                   <p>Most elements and components have color variations thanks to modifiers with syntax .is-$color, like is-primary or is-dark.
                       This is thanks to the $colors Sass map, through which Bulma cycles to grab all the colors and their inverts.</p>

                    @php

                    $colors = array(
                    "Primary" => array( "brand-primary", "violet", "#7f5fbf"),
                    "Secondary" => array( "accentsecondary", "pink", "#fe688e"),

                    )
                    @endphp
                    <table class="table is-bordered">
                        <thead>
                        <tr>
                            <th>
                                Color
                            </th>
                            <th>Variable</th>
                            <th>Value</th>
                            <th>Color</th>
                        </tr>
                        </thead>
                        <tbody>

                          @foreach($colors as $color)
                              <tr>
                              @foreach($color as $c)
                                <td><?= $c ?></td>
                            @endforeach
                                  <td><span class="box-color" style="background-color:<?= $color[2] ?>"></span></td>
                              </tr>
                            @endforeach

                        </tbody>
                    </table>

                </section>
            </div>
        </div>
    </section>

@endsection
