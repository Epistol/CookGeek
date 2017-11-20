<div class="card">
    <div class="card-image">
        <figure class="image is-4by3">
           <img src="http://via.placeholder.com/300x200?text={{ucfirst($c->name)}}">


        </figure>
    </div>
    <div class="card-content">
        <div class="media">
            <div class="media-content">
              {{--  <p class="title is-4"><a href="{{route('recipe.show', $r->slug)}}"> {{$r->title}}</a></p>--}}
                @if($c->name== 'tv')
                    <div class="icones {{strtolower($c->name)}}" ></div>
                @else
                    <div class="icones {{strtolower($c->name)}}"></div>
                @endif
            </div>
        </div>

        <div class="content">
        </div>
    </div>
</div>