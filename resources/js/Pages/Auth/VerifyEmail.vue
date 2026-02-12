<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import PrimaryButton from '../../Components/PrimaryButton.vue';

const form = useForm({})

const submit = () => {
  form.post(route('verification.send'))
}

</script>

<template>

    <Head title="- Email Verification" />

    <div class="min-h-screen flex justify-center">
        <div class="w-full max-w-md text-center">
            <p class="mb-6 text-slate-200">
                Thanks for signing up! Before getting started, could
                you verify your email address by clicking on the link
                we just emailed you? If you didn't receive the email,
                we will gladly send you another.
            </p>

            <form @submit.prevent="submit">
                <PrimaryButton :loading="form.processing">
                    Resend Verification Email
                </PrimaryButton>
            </form>
        </div>
    </div>
</template>

