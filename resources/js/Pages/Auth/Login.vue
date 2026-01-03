<script setup>
import { useForm, Link } from '@inertiajs/vue3'
import TextInput from '../../Components/TextInput.vue';
import PrimaryButton from '../../Components/PrimaryButton.vue';

const form = useForm({
    email: null,
    password: null,
    remember: null,
})


const login = () => {
    form.post(route('login'), {
        onError: () => form.reset('password'),
    });
}
</script>

<template>
    <Head title="- Login"></Head>
    <div class="flex items-center justify-center
           bg-slate-100 dark:bg-slate-900 px-4">
        <div class="w-full max-w-md bg-white dark:bg-slate-800
             rounded-2xl shadow-lg p-8">
            <!-- Header -->
            <div class="text-center mb-2">
                <h1 class="text-2xl font-bold text-slate-800 dark:text-white">
                    Login Account
                </h1>
            </div>

            <!-- Form -->
            <form @submit.prevent="login" class="space-y-5">

                <TextInput label="Email" type="email" v-model="form.email" :error="form.errors.email" />

                <TextInput label="Password" type="password" v-model="form.password" :error="form.errors.password" />

                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-300">
                        <input type="checkbox" v-model="form.remember"
                            class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500" />
                        Remember me
                    </label>
                </div>

                <!-- Submit -->
                <PrimaryButton :loading="form.processing">
                    Login
                </PrimaryButton>
            </form>

            <!-- Footer -->
            <p class="text-center text-sm text-slate-500 mt-6">
                Create a new user?
                <Link :href="route('register')" class="text-indigo-600 hover:underline font-medium">
                    Register
                </Link>
            </p>
        </div>
    </div>
</template>
