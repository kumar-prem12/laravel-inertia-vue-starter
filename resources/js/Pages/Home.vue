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

const username = params.user_id ? props.listings.data.find(i => i.user_id === Number(params.user_id))?.user?.name ?? null : null;

const form = useForm({
    search: props.searchTerm,
});

const search = () => {
    router.get(route("home"), { search: form.search, user_id: params.user_id, tag: params.tag });
};

</script>

<template>

    <Head title="- Listings"></Head>
    <!-- <header>
        <p>This is a simple starter kit for Laravel 11, Inertia JS, and Vue JS, without authentication. Tailwind and ZiggyVue are installed.</p>
    </header> -->

    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-2">
            <Link
                class="px-2 py-1 rounded-md bg-indigo-500 text-white flex items-center gap-2"
                v-if="params.tag"
                :href="route('home', { ...params, tag: null, page: null })"
            >
                {{ params.tag }}
                <i class="fa-solid fa-xmark"></i>
            </Link>

            <Link
                class="px-2 py-1 rounded-md bg-indigo-500 text-white flex items-center gap-2"
                v-if="params.search"
                :href="route('home', { ...params, search: null, page: null })"
            >
                {{ params.search }}
                <i class="fa-solid fa-xmark"></i>
            </Link>

            <Link
                class="px-2 py-1 rounded-md bg-indigo-500 text-white flex items-center gap-2"
                v-if="username"
                :href="route('home', { ...params, user_id: null, page: null })"
            >
                {{ username }}
                <i class="fa-solid fa-xmark"></i>
            </Link>
        </div>

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