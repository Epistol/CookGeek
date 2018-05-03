<h1 class="title">
    Color
</h1>

<p>Most elements and components have color variations thanks to modifiers with syntax .is-$color,
    like is-primary or is-dark.
    This is thanks to the $colors Sass map, through which Bulma cycles to grab all the colors and
    their inverts.</p>

@php

    $colors = array(
    array( "Primary", "brand-primary", "violet", "#7f5fbf"),
    array( "Secondary", "accentsecondary", "pink", "#fe688e"),
    array( "Accent", "accent", "accent", "#4c6ee6"),
    );

$shade = array(
    array( "White", "white", "white", "#ffffff"),
    array( "Body background", "body-bg", "body_bg", "#ebeaf5"),
    array( "Blanc Casse", "blanc_casse", "blanc_casse", "rgba(183, 173, 153, 1)"),
    array( "Gris", "gris", "gris", "#898989"),
    array( "Gris granite", "gris_granite", "gris_granite", "#524d55"),
    array( "Eree black", "eerieblck", "blck", "rgba(3, 3, 1, 1)"),
    );
@endphp
<table class="table is-bordered">
    <thead>
    <tr>
        <th>
            Color
        </th>
        <th>Variable</th>
        <th>Value</th>
        <th>Hex</th>
    </tr>
    </thead>
    <tbody>
    @foreach($colors as $color)
        <tr>

            @foreach($color as $key=> $c)
                @if($key == 1  || $key == 2 )
                    <td> <code>$<?= $c ?></code></td>
                @else
                    <td><?= $c ?></td>
                @endif
            @endforeach
            <td><span class="box-color" style="background-color:<?= $color[3] ?>"></span></td>
        </tr>
    @endforeach
    </tbody>
</table>


Black shades

<table class="table is-bordered">
    <thead>
    <tr>
        <th>
            Color
        </th>
        <th>Variable</th>
        <th>Value</th>
        <th>Hex</th>
    </tr>
    </thead>
    <tbody>
    @foreach($shade as $color)
        <tr>

            @foreach($color as $key=> $c)
                @if($key == 1  || $key == 2 )
                    <td> <code>$<?= $c ?></code></td>
                @else
                    <td><?= $c ?></td>
                @endif
            @endforeach
            <td><span class="box-color" style="background-color:<?= $color[3] ?>"></span></td>
        </tr>
    @endforeach
    </tbody>
</table>

