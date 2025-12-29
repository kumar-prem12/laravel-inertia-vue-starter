<script setup>
import { useForm, Link } from '@inertiajs/vue3'

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
})

const submit = () => {
  form.post(route('register'))
}
</script>

<template>
  <div
    class="min-h-screen flex items-center justify-center
           bg-slate-100 dark:bg-slate-900 px-4"
  >
    <div
      class="w-full max-w-md bg-white dark:bg-slate-800
             rounded-2xl shadow-lg p-8"
    >
      <!-- Header -->
      <div class="text-center mb-6">
        <h1 class="text-2xl font-bold text-slate-800 dark:text-white">
          Create Account
        </h1>
        <p class="text-slate-500 text-sm">
          Sign up to get started
        </p>
      </div>

      <!-- Form -->
      <form @submit.prevent="submit" class="space-y-5">

        <!-- Name -->
        <div>
          <label class="form-label">Name</label>
          <input
            v-model="form.name"
            type="text"
            placeholder="John Doe"
            class="form-input"
          />
          <p v-if="form.errors.name" class="form-error">
            {{ form.errors.name }}
          </p>
        </div>

        <!-- Email -->
        <div>
          <label class="form-label">Email</label>
          <input
            v-model="form.email"
            type="email"
            placeholder="email@example.com"
            class="form-input"
          />
          <p v-if="form.errors.email" class="form-error">
            {{ form.errors.email }}
          </p>
        </div>

        <!-- Password -->
        <div>
          <label class="form-label">Password</label>
          <input
            v-model="form.password"
            type="password"
            placeholder="********"
            class="form-input"
          />
          <p v-if="form.errors.password" class="form-error">
            {{ form.errors.password }}
          </p>
        </div>

        <!-- Confirm Password -->
        <div>
          <label class="form-label">Confirm Password</label>
          <input
            v-model="form.password_confirmation"
            type="password"
            placeholder="********"
            class="form-input"
          />
        </div>

        <!-- Submit -->
        <button
          class="w-full py-2 rounded-lg font-semibold
                 bg-indigo-600 hover:bg-indigo-700
                 text-white transition
                 disabled:opacity-60"
          :disabled="form.processing"
        >
          {{ form.processing ? 'Creating account...' : 'Register' }}
        </button>
      </form>

      <!-- Footer -->
      <p class="text-center text-sm text-slate-500 mt-6">
        Already have an account?
        <Link
          :href="route('register')"
          class="text-indigo-600 hover:underline font-medium"
        >
          Login
        </Link>
      </p>
    </div>
  </div>
</template>
