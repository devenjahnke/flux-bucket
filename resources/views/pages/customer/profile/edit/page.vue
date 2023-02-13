<script setup lang="ts">
import LayoutAuthenticated from "@/views/layouts/authenticated/layout-authenticated.vue";
import UpdatePasswordForm from "@/views/pages/customer/profile/edit/partials/update-password-form.vue";
import UpdateProfileInformationForm from "@/views/pages/customer/profile/edit/partials/update-profile-information-form.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Profile" />

    <LayoutAuthenticated>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Profile</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                    <UpdateProfileInformationForm class="max-w-xl" />
                </div>

                <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                    <UpdatePasswordForm class="max-w-xl" />
                </div>
            </div>
        </div>
    </LayoutAuthenticated>
</template>
