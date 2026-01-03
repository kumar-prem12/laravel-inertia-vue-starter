<script setup>
defineProps({
    loading: {
        type: Boolean,
        default: false,
    },
    disabled: {
        type: Boolean,
        default: false,
    },
})
</script>

<template>
    <button class="w-full py-2 rounded-lg font-semibold
               bg-indigo-600 hover:bg-indigo-700
               text-white transition
               disabled:opacity-60 disabled:cursor-not-allowed" :disabled="loading || disabled">
        <slot />
    </button>
</template>
