<h1 class="title">
    Icones
</h1>

<p>Nos bonnes icones</p>

@php

    function return_public_img_code($link)
{
	$img = asset($link);

	return '<div class="user_picture">
                    <img src="' . $img . '">
                </div>';

}

	$pictos = [

		['image' =>
		    ['Nom' => 'Anime',
		    'Fichiers' => '/img/pictos/svg/anime.svg; art, cartes, comics, games, livres, song, tv',
		    'code' => return_public_img_code('/img/pictos/svg/anime.svg')]],

];



@endphp

<h2 class="title is-size-4">
    Type d'univers
</h2>

<table class="table is-bordered">
    <thead>
    <tr>
        <th>Type</th>
        <th>Class</th>
        <th>Example</th>
        <th>Code</th>
    </tr>
    </thead>
    <tbody>


    @foreach($pictos as $font)
        <tr>
            @foreach($font as $key=> $c)

                <td>{{$c["Nom"]}}</td>
                <td>@if(!empty($c["Fichiers"]))<code class="css">{{$c["Fichiers"]}}</code>@endif</td>
                <td style="max-width: 64px;">{!!$c["code"]!!}</td>
                <td>
                    <pre><code class="html">{{$c["code"]}}</code></pre>
                </td>
            @endforeach

        </tr>
    @endforeach

    </tbody>
</table>
