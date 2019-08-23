<template>
    <ais-instant-search
            :search-client="searchClient"
            :index-name="indexProp"
    >
        <ais-autocomplete>
            <div slot-scope="{ currentRefinement, indices, refine }">
                <div class="field dropdown-item">
                    <div class="control has-icons-left relative mr-6 my-2">
                        <input type="search" :value="currentRefinement" @input="refine($event.currentTarget.value)"
                               placeholder="Rechercher"
                               class="rounded bg-white focus:outline-0 focus:shadow-outline border border-gray-300
                                rounded-lg py-2 px-4 pr-10 block w-full appearance-none leading-normal relative">
                        <span class="pointer-events-none absolute inset-y-0 right-0 pr-4 flex items-center text-gray-500">
            <i class="fa fa-search"></i>
          </span>
                        <ais-voice-search :search-as-you-speak="true"/>
                    </div>
<!--                    <div class="dropdown-menu" id="dropdown-menu" style="display:block">
                        <div class="dropdown-content" v-if="currentRefinement" v-for="index in indices"
                             :key="index.label">
                            <div class="dropdown-item" v-for="hit in index.hits" :key="hit.objectID">
                                <ais-highlight attribute="name" :hit="hit"/>
                            </div>
                            <ais-powered-by/>

                        </div>
                    </div>-->
                </div>
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
        name : 'big-search',
        data() {
            return {
                searchClient: algoliasearch(
                    process.env.MIX_ALGOLIA_APP_ID,
                    process.env.MIX_ALGOLIA_SEARCH
                ),
            };
        },
        methods: {
            searching() {
                console.log("jhdsjs");
            }
        }
    }
</script>

<style scoped>

</style>