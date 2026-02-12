<script setup>
import { useForm } from '@inertiajs/vue3'
import TextInput from '../../Components/TextInput.vue';
import PrimaryButton from '../../Components/PrimaryButton.vue';

const form = useForm({
    email: null,
})


const resetPassword = () => {
    form.post(route('password.email'));
}
</script>

<template>
    <Head title="- Forgot Password"></Head>
    <div class="flex items-center justify-center
           bg-slate-100 dark:bg-slate-900 px-4">
        <div class="w-full max-w-md bg-white dark:bg-slate-800
             rounded-2xl shadow-lg p-8">
            <!-- Header -->
            <div class="text-center mb-2">
                <h1 class="text-2xl font-bold text-slate-800 dark:text-white">
                    Reset Password
                </h1>
            </div>

            <!-- Form -->
            <form @submit.prevent="resetPassword" class="space-y-5">

                <TextInput label="Email" type="email" v-model="form.email" :error="form.errors.email" />
                <!-- Submit -->
                <PrimaryButton :loading="form.processing">
                    Send Password Reset Link
                </PrimaryButton>
            </form>
        </div>
    </div>
</template>
