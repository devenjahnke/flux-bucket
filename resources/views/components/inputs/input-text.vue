<script setup lang="ts">
import { onMounted, ref } from "vue";

defineProps<{
    modelValue: string;
    placeholder?: string;
}>();

const emit = defineEmits<{
    (e: "update:modelValue", value: string): string;
}>();

const input = ref<HTMLInputElement>();

const updateValue = (e: Event) => {
    emit("update:modelValue", (e.target as HTMLInputElement).value);
};

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
        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm"
        :value="modelValue"
        :placeholder="placeholder"
        @input="updateValue"
    />
</template>
