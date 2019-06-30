<template>
    <ais-instant-search
            :search-client="searchClient"
            :index-name="indexProp"
    >
        <ais-autocomplete>
            <div slot-scope="{ currentRefinement, indices, refine }">
                <input
                        type="search"
                        :value="currentRefinement"
                        placeholder="Search for a product"
                        @input="refine($event.currentTarget.value)"
                >
                <ul v-if="currentRefinement" v-for="index in indices" :key="index.label">
                    <li>
                        <h3>{{ index.label }}</h3>
                        <ul>
                            <li v-for="hit in index.hits" :key="hit.objectID">
                                <ais-highlight attribute="name" :hit="hit"/>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </ais-autocomplete>
    </ais-instant-search>

</template>

<script>
    import algoliasearch from 'algoliasearch/lite';

    export default {
        props: {
            indexProp: String,
            default: 'big_search'
        },

        data() {
            return {
                searchClient: algoliasearch(
                    process.env.MIX_ALGOLIA_APP_ID,
                    process.env.MIX_ALGOLIA_SEARCH
                ),
            };
        },
    }
</script>

<style scoped>

</style>