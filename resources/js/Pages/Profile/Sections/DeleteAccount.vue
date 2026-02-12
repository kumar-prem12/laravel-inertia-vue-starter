<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '../../../Components/TextInput.vue';
import PrimaryButton from '../../../Components/PrimaryButton.vue';
import { ref } from 'vue';

const showConfirmPassword = ref(false);
const form = useForm({
    password: '',
});

const deleteAccount = () => {
    form.delete(route('profile.delete'), {
        onError: () => form.reset(),
        onSuccess: () => form.reset(),
        preserveScroll: true,  
    });
};

</script>

<template>
    <div class="flex items-center justify-center
           bg-slate-100 dark:bg-slate-900 px-4 mt-4">
        <div class="w-full max-w-xl bg-white dark:bg-slate-800
             rounded-2xl shadow-lg p-8">
            <!-- Header -->
            <div class="text-center mb-2">
                <h1 class="text-2xl font-bold text-slate-800 dark:text-white">
                    Delete Account
                </h1>
                <p>Once your account is deleted, all of its resources data wiil be permanently deleted.
                    This action cannot be undone.
                </p>
            </div>

            <!-- Form -->
            <div v-if="showConfirmPassword">
                <form @submit.prevent="deleteAccount" class="space-y-5">

                    <TextInput label="Confirm Password" type="password" v-model="form.password" :error="form.errors.password" />
                    <!-- Submit -->
                    <PrimaryButton :loading="form.processing"> Confirm </PrimaryButton>
                    <button  @click="showConfirmPassword = false"
                    class="text-indigo-500 dark:text-indigo-500 font-medium"
                    >Cancel</button>
                    
                </form>
            </div>
            <button
            v-if="!showConfirmPassword"
            @click="showConfirmPassword = true"
            class="px-4 py-2 rounded-lg bg-red-500 text-white">
                <i class="fa-solid fa-triangle-exclamation mr-1"></i>
                Delete Account
            </button>

        </div>
    </div>
</template>
