<h1 class="title">
    Typographies
</h1>


<p>Les bonnes typos</p>

@php

    $fonts = [

        ['font' => ['function' => 'Font-size base', 'variable' => '', 'class' => 'p', 'value' => '14px']],
        ['font' => ['function' => "Title website", 'variable' => 'typotitle', 'class' => 'navbar-brand logo', 'value' => 'Conviction']],
        ['font' => ['function' => "Title Content", 'variable' => '', 'class' => 'title', 'value' => 'Avenir']],
        ['font' => ['function' => "Content", 'variable' => 'typocontent', 'class' => 'p', 'value' => 'Avenir (medium)']],
        ['font' => ['function' => "404 title", 'variable' => '', 'class' => 'full-404', 'value' => 'Michroma']],
        ['font' => ['function' => "404 content", 'variable' => 'typocontent', 'class' => 'err404', 'value' => 'EurostileBQ']],
    ];


@endphp


<table class="table is-bordered">
    <thead>
    <tr>
        <th>
            Nom
        </th>
        <th>Variable</th>
        <th>Class</th>
        <th>Value</th>
    </tr>
    </thead>
    <tbody>


    @foreach($fonts as $font)
        <tr>
            @foreach($font as $key=> $c)

                <td @if($c["class"] == "full-404") style="background:#898989;" @endif><p style="font-size:1rem; padding:0px;" class="{{$c["class"]}}">{{$c["function"]}}</p></td>
                <td>@if(!empty($c["variable"]))<code>${{$c["variable"]}}</code>@endif</td>
                <td><code>{{$c["class"]}}</code></td>
                <td>{{$c["value"]}}</td>

            @endforeach

        </tr>
    @endforeach

    </tbody>
</table>
