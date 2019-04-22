<template>
    <ais-index :search-store="searchStore" index-name="recipes" >
        <ais-input placeholder="Rechercher "></ais-input>
        <ais-results v-show="searchStore.query.length > 0">
            <template slot-scope="{ result }">
                <div>
                    <h1>@{{ result.title }}</h1>
                </div>
            </template>
        </ais-results>
    </ais-index>
</template>

<script>
    import { createFromAlgoliaCredentials } from 'vue-instantsearch';
    const searchStore = createFromAlgoliaCredentials('<appId>', '<apiKey>');
    export default {
        data() {
            return {
                searchStore
            };
        }
    }
</script>