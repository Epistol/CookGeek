<div class="field has-addons">
    <div class="control is-expanded">
        @if($value)

            <input class="input" type="text" placeholder="Chercher" value="{{$value}}">

        @else

            <input class="input" type="text" placeholder="Chercher" value="{{old('value')}}">

        @endif

    </div>
    <div class="control">
        <a class="button is-info">
            <i aria-hidden="true" class="fas fa-search"></i>
        </a>
    </div>
</div>