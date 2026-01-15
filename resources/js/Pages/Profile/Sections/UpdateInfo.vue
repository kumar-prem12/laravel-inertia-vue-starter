<script setup>
import { router, useForm } from '@inertiajs/vue3';
import TextInput from '../../../Components/TextInput.vue';
import PrimaryButton from '../../../Components/PrimaryButton.vue';

const props = defineProps({
    user: Object,
});
const form = useForm({
    name: props.user.name,
    email: props.user.email,
});

const updateInfo = () => {
    form.patch(route('profile.info'), {
        onError: () => form.reset('email'),
    });
};

const resendEmail = (e) => {
    router.post(route('verification.send', {}, 
        {
            onStart: () => (e.target.disabled = true),
            onFinish: () => (e.target.disabled = false),
        }
    ));
}; 
</script>

<template>
    <div class="flex items-center justify-center
           bg-slate-100 dark:bg-slate-900 px-4">
        <div class="w-full max-w-xl bg-white dark:bg-slate-800
             rounded-2xl shadow-lg p-8">
            <!-- Header -->
            <div class="text-center mb-2">
                <h1 class="text-2xl font-bold text-slate-800 dark:text-white">
                    Update Information
                </h1>
                <p>Update your account profile's infromation amd email address.</p>
            </div>

            <!-- Form -->
            <form @submit.prevent="updateInfo" class="space-y-5">

                <TextInput label="Name" type="name" v-model="form.name" :error="form.errors.name" />
                <TextInput label="Email" type="email" v-model="form.email" :error="form.errors.email" />
                <div v-if="user.email_verified_at === null" class="flex items-center gap-2">
                    <p>Your email address is unverified.</p>
                    <button type="button"
                        @click="resendEmail" class="text-indigo-500 font-medium dark:text-indigo-400 disabled:text-slate-400 disabled:cursor-wait">
                        Click here to re-send email verifiaction email.
                    </button>
                </div>
                <!-- Submit -->
                <PrimaryButton :loading="form.processing">
                    Save
                </PrimaryButton>
                
            </form>

        </div>
    </div>
</template>
