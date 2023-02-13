<script setup lang="ts">
import LayoutGuest from "@/views/layouts/guest/layout-guest.vue";
import InputError from "@/views/components/inputs/input-error.vue";
import InputLabel from "@/views/components/inputs/input-label.vue";
import ButtonPrimary from "@/views/components/buttons/button-primary.vue";
import InputText from "@/views/components/inputs/input-text.vue";
import { Head, useForm } from "@inertiajs/vue3";

const form = useForm({
    password: "",
});

const submit = () => {
    form.post(route("password.confirm"), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <LayoutGuest>
        <Head title="Confirm Password" />

        <div class="mb-4 text-sm text-gray-600">
            This is a secure area of the application. Please confirm your password before continuing.
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel
                    for="password"
                    value="Password"
                />

                <InputText
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="current-password"
                    autofocus
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.password"
                />
            </div>

            <div class="mt-4 flex justify-end">
                <ButtonPrimary
                    class="ml-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Confirm
                </ButtonPrimary>
            </div>
        </form>
    </LayoutGuest>
</template>
