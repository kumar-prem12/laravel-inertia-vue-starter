<script setup>
const model = defineModel({
    type: null,
    required: true
});
defineProps({
  label: String,
//   modelValue: [String, Number],
  type: {
    type: String,
    default: 'text'
  },
  error: String,
  placeholder: String,
});

// defineEmits(['update:modelValue'])
</script>

<template>
  <div>
    <label class="form-label">
      {{ label }}
    </label>

    <input
      :type="type"
      v-model="model"
      class="form-input"
      :placeholder="placeholder",
    />

    <small v-if="error" class="form-error" :class="{'ring-red-500!' : error}">
      {{ error }}
    </small>
  </div>
</template>
