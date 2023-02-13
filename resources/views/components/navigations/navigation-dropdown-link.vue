<script setup lang="ts">
import { Link } from "@inertiajs/vue3";

const props = defineProps<{
    href: string;
}>();
</script>

<template>
    <Link
        class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 transition duration-150 ease-in-out hover:bg-gray-100 focus:bg-gray-100 focus:outline-none"
        :href="props.href"
    >
        <slot />
    </Link>
</template>
