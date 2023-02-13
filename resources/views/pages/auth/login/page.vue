<script setup lang="ts">
import InputCheckbox from "@/views/components/inputs/input-checkbox.vue";
import LayoutGuest from "@/views/layouts/guest/layout-guest.vue";
import InputError from "@/views/components/inputs/input-error.vue";
import InputLabel from "@/views/components/inputs/input-label.vue";
import ButtonPrimary from "@/views/components/buttons/button-primary.vue";
import InputText from "@/views/components/inputs/input-text.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { route } from "momentum-trail";

defineProps<{
    canResetPassword: boolean;
    status: string | null;
}>();

const form = useForm<{
    email: string;
    password: string;
    remember: boolean;
}>({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <LayoutGuest>
        <Head title="Log in" />

        <div
            v-if="status"
            class="mb-4 text-sm font-medium text-green-600"
        >
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel
                    for="email"
                    value="Email"
                />

                <InputText
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.email"
                />
            </div>

            <div class="mt-4">
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
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.password"
                />
            </div>

            <div class="mt-4 block">
                <label class="flex items-center">
                    <InputCheckbox
                        v-model:checked="form.remember"
                        name="remember"
                    />

                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="mt-4 flex items-center justify-end">
                <ButtonPrimary
                    class="ml-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Log in
                </ButtonPrimary>
            </div>
        </form>
    </LayoutGuest>
</template>
