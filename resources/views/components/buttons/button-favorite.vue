<script setup lang="ts">
import IconHeart from "@/views/components/icons/icon-heart.vue";

withDefaults(
    defineProps<{
        type?: "submit" | "button" | "reset";
        active: boolean | null;
    }>(),
    {
        type: "button",
        active: false,
    }
);
</script>

<template>
    <button
        :type="type"
        :class="[
            active
                ? 'border-transparent bg-red-600 text-white hover:bg-red-700 focus:ring-red-500 '
                : 'border-gray-200 bg-white text-gray-900 hover:bg-gray-50 focus:ring-gray-200',
        ]"
        class="inline-flex items-center rounded-md border px-3 py-2 text-sm font-medium leading-4 shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2"
    >
        <IconHeart
            class="h-6 w-6"
            aria-hidden="true"
        />
    </button>
</template>
