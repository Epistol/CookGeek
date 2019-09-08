<form action="{{route('search.post')}}" method="POST" role="search">
@csrf
<div class="field has-addons">
        <div class="control is-expanded">
            @if(isset($value))
                @if($value !== null)
                    <input class="input"  id="q" name="q"  type="text" placeholder="Chercher" value="{{strip_tags($value)}}">
                @elseif (!isset($value))
                    <input class="input"  id="q" name="q" type="text" placeholder="Chercher">
                @endif
            @else
                <input class="input"  id="q" name="q" type="text" placeholder="Chercher" value="{{strip_tags(old('value'))}}">
            @endif
        </div>
        <div class="control">
            <a type="submit" id="searchbutton" class="button is-info">
                <i aria-hidden="true" class="fas fa-search"></i>
            </a>
        </div>
    </div>
</form>
