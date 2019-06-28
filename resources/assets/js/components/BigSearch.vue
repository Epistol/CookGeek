<template>
    <ais-instant-search
            :search-client="searchClient"
            :index-name="indexProp"
    >
        <ais-search-box
                placeholder="Search"
                submit-title="string"
                reset-title="string"
                :autofocus="false"
                :show-loading-indicator="true"
        />
        <ais-hits>
            <template slot="item" slot-scope="{ item }">
                <div>
                    <h1>@{{ item.title }}</h1>
                </div>
            </template>
        </ais-hits>
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