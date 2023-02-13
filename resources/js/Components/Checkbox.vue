<script setup lang="ts">
import { computed } from "vue";

const props = withDefaults(defineProps<{
    checked: boolean,
    value?: null,
}>(), {
    checked: false,
    value: null
});

const emit = defineEmits<{
    (e: "update:checked", value: boolean): void
}>();

const proxyChecked = computed({
    get() {
        return props.checked;
    },

    set(value) {
        emit("update:checked", value);
    },
});
</script>

<template>
    <input
        v-model="proxyChecked"
        type="checkbox"
        :value="value"
        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
    />
</template>
