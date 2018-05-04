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
		    ['Nom' => 'Universe type',
		    'Path' => '/img/pictos/svg/',
		    'Fichiers' => 'anime, art, cartes, comics, games, livres, song, tv',
		    'code' => return_public_img_code('/img/pictos/svg/anime.svg')]],
['image' =>
		    ['Nom' => 'Design icons (for this page)',
		     'Path' => '/img/admin/design/example/icon/',
		    'Fichiers' => 'atom1, molec, organism, page, template',
		    'code' => return_public_img_code('/img/admin/design/example/icon/atom1.svg')]],


['image' =>
		    ['Nom' => 'Rating ',
		     'Path' => '/img/rating/',
		    'Fichiers' => 'muf_full.png, muf_half.png',
		    'code' => return_public_img_code('/img/rating/muf_full.png')]],
];


@endphp


<table class="table is-bordered">
    <thead>
    <tr>
        <th>Nom</th>
        <th>Path</th>
        <th>Fichiers</th>

    </tr>
    </thead>
    <tbody>

    @foreach($pictos as $font)
        <tr>
            @foreach($font as $key=> $c)

                <td>{{$c["Nom"]}}</td>
                <td>{{$c["Path"]}}</td>
                <td>@if(!empty($c["Fichiers"]))<code class="css">{{$c["Fichiers"]}}</code>@endif</td>
        </tr><tr><td width="64px">{!!$c["code"]!!}</td>
            <td >
                <pre><code class="html">{{$c["code"]}}</code></pre>
            </td>
            @endforeach

        </tr>
    @endforeach

    </tbody>
</table>
