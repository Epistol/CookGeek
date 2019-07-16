<section class="section" style="word-break: break-all;">
    <ul>
        @foreach($ingredients as $ingredient)
            <li><a href="{{route('ingredient.show', $ingredient->name )}}"> {{$ingredient->name}}</a></li>
        @endforeach
    </ul>
    {{ $ingredients->links() }}
</section>
