<script setup>
const model = defineModel();
defineProps({
    label: String,
    error: String,
    placeholder: String,
});
</script>

<template>
    <div>
        <label
            :for="label"
            class="block text-sm font-medium text-slate-700 dark:text-slate-300"
        >
            {{ label }}
        </label>

        <div class="relative mt-1 rounded-md">
            <textarea
                rows="6"
                :name="label"
                :placeholder="placeholder"
                v-model="model"
                class="block w-full rounded-md pr-3 pl-9 text-sm dark:text-slate-900 border-slate-300 outline-0 focus:ring-1 focus:ring-inset focus:ring-indigo-400 focus:border-indigo-400 placeholder:text-slate-400"
            ></textarea>
            <small v-if="error" class="form-error" :class="{'ring-red-500!' : error}">
                {{ error }}
            </small>
        </div>
    </div>
</template>