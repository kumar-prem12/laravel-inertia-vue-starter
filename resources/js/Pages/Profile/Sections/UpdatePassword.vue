<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '../../../Components/TextInput.vue';
import PrimaryButton from '../../../Components/PrimaryButton.vue';

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('profile.password'), {
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
                    Update Password
                </h1>
                <p>Ensure you are using along, random password to stay secure.</p>
            </div>

            <!-- Form -->
            <form @submit.prevent="updatePassword" class="space-y-5">

                <TextInput label="Current Password" type="password" v-model="form.current_password" :error="form.errors.current_password" />
                <TextInput label="New Password" type="password" v-model="form.password" :error="form.errors.password" />
                <TextInput label="Confirm New Password" type="password" v-model="form.password_confirmation" :error="form.errors.password_confirmation" />
                
                <!-- Submit -->
                <PrimaryButton :loading="form.processing">
                    Save
                </PrimaryButton>
                
            </form>

        </div>
    </div>
</template>
