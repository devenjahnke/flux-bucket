<script setup lang="ts">
import { onMounted, ref } from "vue";

defineProps<{
    modelValue: string
}>();

defineEmits<{
    (e: "update:modelValue"): string
}>();

const input = ref<HTMLInputElement>();

onMounted(() => {
    if (input.value?.hasAttribute("autofocus")) {
        input.value?.focus();
    }
});

defineExpose({ focus: () => input.value?.focus() });
</script>

<template>
    <input
        ref="input"
        class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
    />
</template>
