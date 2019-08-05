@auth
    {{--   @if(Auth::user()->role == )--}}
    @hasanyrole('super-admin|admin')
    {{--    If role is admin minimum--}}
    <p class="buttons">
    <form method="POST" action="{{route('admin.recipe.picture.validate')}}">
        {{ csrf_field() }}
        <input type="hidden" name="recipeId" value="{{$recipe->id}}"/>
        <input type="hidden" name="imgId" value="{{$picture->id}}"/>
        <input type="hidden" name="validate" value="true"/>
        <button type="submit" class="button validate">
    <span class="icon is-large rounded-full">
       <i class="far fa-check-circle"></i>
    </span>
        </button>
    </form>


    <a class="button invalidate">
    <span class="icon is-large rounded-full">
      <i class="far fa-times-circle"></i>
    </span>
    </a>
    </p>

    @endrole
@endauth
