<script setup>
import { useForm, Link } from '@inertiajs/vue3'
import TextInput from '../../Components/TextInput.vue';
import PrimaryButton from '../../Components/PrimaryButton.vue';

const form = useForm({
    password: null,
})

const confirmPassword = () => {
    form.post(route('password.confirm'), {
        onFinish: () => form.reset(),
    });
}
</script>

<template>
    <Head title="- Confirmation Password"></Head>
    <div class="flex items-center justify-center
           bg-slate-100 dark:bg-slate-900 px-4">
        <div class="w-full max-w-md bg-white dark:bg-slate-800
             rounded-2xl shadow-lg p-8">
            <!-- Header -->
            <div class="text-center mb-2">
                <p class="text-2xl font-bold text-slate-800 dark:text-white">
                    Please confirm your password before continuing.
                </p>
            </div>

            <!-- Form -->
            <form @submit.prevent="confirmPassword" class="space-y-5">
                <TextInput label="Password" type="password" v-model="form.password" :error="form.errors.password" />
                <PrimaryButton :loading="form.processing">
                    Confirm Password
                </PrimaryButton>
            </form>
        </div>
    </div>
</template>
