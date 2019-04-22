<template>
    <ais-instant-search
            :search-client="searchClient"
            :index-name="indexProp"
    >
        <!-- Other search components go here -->
    </ais-instant-search>

</template>

<script>
    import algoliasearch from 'algoliasearch/lite';

    export default {
        props: {
            indexProp: String
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