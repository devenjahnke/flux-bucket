<script setup lang="ts">
import LayoutAuthenticated from "@/views/layouts/authenticated/layout-authenticated.vue";
import { Head } from "@inertiajs/vue3";
import OrderCard from "@/views/pages/customer/order/index/partials/order-card.vue";

defineProps<{
    orders: Array<App.Data.OrderData>;
}>();
</script>

<template>
    <Head title="Orders" />

    <LayoutAuthenticated>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Orders</h2>
        </template>

        <div class="space-y-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Your Orders</h3>

            <div class="grid grid-cols-1 gap-y-4 sm:gap-x-6 sm:gap-y-10 lg:gap-x-8">
                <OrderCard
                    v-for="order in orders"
                    :key="order.id"
                    :order="order"
                />
            </div>
        </div>
    </LayoutAuthenticated>
</template>
