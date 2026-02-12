<script setup>
import { useForm, Link } from '@inertiajs/vue3'
import TextInput from '../../Components/TextInput.vue';
import PrimaryButton from '../../Components/PrimaryButton.vue';

const form = useForm({
  name: null,
  email: null,
  password: null,
  password_confirmation: null,
})

const submit = () => {
  form.post(route('register'), {
    onFinish: () => form.reset("password", "password_confirmation"),
  });
};
</script>

<template>
  <Head title="- Register"></Head>
  <div class="flex items-center justify-center
           bg-slate-100 dark:bg-slate-900 px-4">
    <div class="w-full max-w-md bg-white dark:bg-slate-800
             rounded-2xl shadow-lg p-8">
      <!-- Header -->
      <div class="text-center mb-2">
        <h1 class="text-2xl font-bold text-slate-800 dark:text-white">
          Create Account
        </h1>
        <p class="text-slate-500 text-sm">
          Sign up to get started
        </p>
      </div>

      <!-- Form -->
      <form @submit.prevent="submit" class="space-y-5">

        <TextInput label="Name" v-model="form.name" :error="form.errors.name" />
        <TextInput label="Email" type="email" v-model="form.email" :error="form.errors.email" />
        <TextInput label="Password" type="password" v-model="form.password" :error="form.errors.password" />
        <TextInput label="Confirm Password" type="password" v-model="form.password_confirmation" />
        <!-- Submit -->
      
        <PrimaryButton :loading="form.processing">
          {{ form.processing ? 'Creating account...' : 'Register' }}
        </PrimaryButton>

      </form>

      <!-- Footer -->
      <p class="text-center text-sm text-slate-500 mt-6">
        Already have an account?
        <Link :href="route('login')" class="text-indigo-600 hover:underline font-medium">
          Login
        </Link>
      </p>
    </div>
  </div>
</template>
