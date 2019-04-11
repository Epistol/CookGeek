<ais-index app-id="{{ config('scout.algolia.id') }}"
           api-key="{{ Algolia\ScoutExtended\Facades\Algolia::searchKey(App\Article::class) }}"
           index-name="{{ (new App\Article)->searchableAs() }}">

    <ais-input placeholder="Search articles..."></ais-input>

    <ais-results>
        <template scope="{ result }">
            <div>
                <h1>@{{ result.title }}</h1>
                <h4>@{{ result.summary }}</h4>
            </div>
        </template>
    </ais-results>
</ais-index>