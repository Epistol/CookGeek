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


@foreach($pictos as $font)

    @foreach($font as $key=> $c)
        <h2 class="title"><a href="#{{$c["Nom"]}}">{{$c["Nom"]}}</a></h2>
    @endforeach


    <b-tabs v-model="activeTab">
        @foreach($font as $key=> $c)

            <b-tab-item label="Preview">
                <div style="max-width:64px">{!!$c["code"]!!}</div>
            </b-tab-item>

            <b-tab-item label="Path">    <pre>{{$c["Path"]}} </pre>  </b-tab-item>
            <b-tab-item label="Markup">    <pre><code class="html">{{$c["code"]}}</code></pre>   </b-tab-item>

        @endforeach



    </b-tabs>
@endforeach
