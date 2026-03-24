<script setup>
import TextArea from "../../Components/TextArea.vue";
import ImageUpload from "../../Components/ImageUpload.vue";
import TextInput from '../../Components/TextInput.vue';
import PrimaryButton from '../../Components/PrimaryButton.vue';
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    title: null,
    description: null,
    tags: null,
    email: null,
    link: null,
    image: null,
});
</script>

<template>
    <Head title="- New Listing" />

    <div class="mb-6">
        <Title>Create a new listing</Title>
    </div>

    <form  @submit.prevent="form.post(route('listing.store'))" class="grid grid-cols-2 gap-6">
        <div class="space-y-6">
            <TextInput
                label="Title"
                v-model="form.title"
                :error="form.errors.title"
            />

            <TextInput
                label="Tags (separate with comma)"
                v-model="form.tags"
                :error="form.errors.tags"
            />

            <TextArea
                label="Description"
                v-model="form.description"
                :error="form.errors.description"
            />
        </div>

        <div class="space-y-6">
            <TextInput
                label="Email"
                type="email"
                v-model="form.email"
                :error="form.errors.email"
            />

            <TextInput
                label="External Link"
                v-model="form.link"
                :error="form.errors.link"
            />

            <ImageUpload @image="(e) => (form.image = e)" />
        </div>
        <div>
            <PrimaryButton :loading="form.processing">
                {{ form.processing ? 'Create' : 'Create' }}
            </PrimaryButton>
        </div>
    </form>
</template>