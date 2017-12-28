<div class="card cdg">
    <div class="card-image">
        <figure class="image is-4by3">
           <img src="http://via.placeholder.com/300x200?text={{ucfirst($c->name)}}">
        </figure>
    </div>

    <div class="card-content indexrecipe">
        <div class="is-centered ">
            @if($c->name== 'tv')
                <div class="medail {{strtolower($c->name)}}" ></div>
            @else
                <div class="medail {{strtolower($c->name)}}"></div>
            @endif
        </div>
    </div>
</div>