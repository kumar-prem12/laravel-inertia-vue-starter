<script setup>

import Card from '../Components/Card.vue';
import PaginationLinks from '../Components/PaginationLinks.vue';
import TextInput from "../Components/TextInput.vue";
import { router, useForm } from "@inertiajs/vue3";

const params = route().params;

const props = defineProps({
    listings: Object,
    searchTerm: String,
});

const form = useForm({
    search: props.searchTerm,
});

const search = () => {
    router.get(route("home"), { search: form.search, user_id: params.user_id });
};

</script>

<template>

    <Head title="- Listings"></Head>
    <!-- <header>
        <p>This is a simple starter kit for Laravel 11, Inertia JS, and Vue JS, without authentication. Tailwind and ZiggyVue are installed.</p>
    </header> -->

    <div class="flex items-center justify-between mb-4">
        <div>Filters</div>

        <div class="w-1/4">
            <form @submit.prevent="search">
                <TextInput
                    type="search"
                    label=""
                    placeholder="Search..."
                    v-model="form.search"
                />
            </form>
        </div>
    </div>

    <div v-if="Object.keys(listings.data).length">
        <div class="grid grid-cols-3 gap-4">
            <div v-for="listing in listings.data" :key="listing.id">
                <Card :listing="listing" />
            </div>
        </div>
        <div class="mt-8">
            <PaginationLinks
                :links="listings.links"
                :from="listings.from"
                :to="listings.to"
                :total="listings.total"
            />
        </div>
    </div>
    <div v-else>There are no List</div>
</template>