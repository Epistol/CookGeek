<form action="{{route('search.post')}}" method="POST" role="search">
    {{ csrf_field() }}


    <div class="field has-addons">
        <div class="control">
            <input class="input" type="text" name="q" placeholder="Find a repository">
        </div>
        <div class="control">
            <button type="submit" class="button is-info">
                Search
            </button>
        </div>
    </div>

</form>