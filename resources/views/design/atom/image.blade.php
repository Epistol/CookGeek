<h1 class="title">
    Images
</h1>

<p>Les styles d'image sur le site</p>

@php

    $fonts = [

        ['image' =>
            ['type' => 'Avatar',
            'class' => 'user_picture',
            'code' => '
            <div class="user_picture">
                <img src="https://api.adorable.io/avatars/64/Epistol">
            </div>']],
        ['image' =>
            ['type' => "Recipe image",
            'class' => 'image',
            'code' => '
            <figure class="image">
                <img src="https://api.adorable.io/avatars/64/Recipes">
            </figure>']],
              ['image' =>
            ['type' => "Logo",
            'class' => '',
            'code' => '
            <img src="http://127.0.0.1/Private/cdg_reload/public/img/logoo_rond.png" alt="CDG : Cuisine De geek" style="
    max-height: fit-content;max-height: 100%;">']],

    ];


@endphp


<table class="table is-bordered">
    <thead>
    <tr>
        <th>
            Type
        </th>
        <th>Class</th>
        <th>Example</th>
        <th>Code</th>
    </tr>
    </thead>
    <tbody>


    @foreach($fonts as $font)
        <tr>
            @foreach($font as $key=> $c)

                <td>{{$c["type"]}}</td>
                <td>@if(!empty($c["class"]))<code class="css">${{$c["class"]}}</code>@endif</td>
                <td style="max-width: 64px;">{!!$c["code"]!!}</td>
                <td><pre><code class="html">{{$c["code"]}}</code></pre></td>



            @endforeach

        </tr>
    @endforeach

    </tbody>
</table>
