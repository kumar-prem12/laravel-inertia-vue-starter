<script setup>
import { useForm, Link } from '@inertiajs/vue3'
import TextInput from '../../Components/TextInput.vue';
import PrimaryButton from '../../Components/PrimaryButton.vue';

const propos = defineProps({
    email: String,
    token: String
})

const form = useForm({
  token: propos.token,
  email: propos.email,
  password: null,
  password_confirmation: null,
})

const updatePassword = () => {
  form.post(route('password.update'), {
    onFinish: () => form.reset("password", "password_confirmation"),
  });
};
</script>

<template>
  <Head title="- Reset Password"></Head>
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
      <form @submit.prevent="updatePassword" class="space-y-5">
        
        <TextInput label="Email" type="email" v-model="form.email" :error="form.errors.email" />
        <TextInput label="Password" type="password" v-model="form.password" :error="form.errors.password" />
        <TextInput label="Confirm Password" type="password" v-model="form.password_confirmation" />
      
        <PrimaryButton :loading="form.processing">Reset Password</PrimaryButton>

      </form>
    </div>
  </div>
</template>
