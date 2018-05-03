<h1 class="title">
    Typographies
</h1>


<p>Les bonnes typos</p>

@php

    $fonts = array(
    array( "Font-size base","",  "", "14px"),
    array( "Title website",  "typotitle", "","Conviction"),
    array( "Title Content", "", "h1.title", "Avenir"),
    array( "Content",  "typocontent", "","Avenir (medium)"),
    array( "404 title", "", "", "Futura"),
    array( "404 content","",  "", "EurostileBQ"),
    );
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
                @if($key == 1  )
                    <td> <code>$<?= $c ?></code></td>
                @else
                    <td><?= $c ?></td>
                @endif
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
