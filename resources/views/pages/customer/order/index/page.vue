<script setup lang="ts">
import LayoutAuthenticated from "@/views/layouts/authenticated/layout-authenticated.vue";
import { Head } from "@inertiajs/vue3";
import OrderCard from "@/views/pages/customer/order/index/partials/order-card.vue";
import IconShoppingCart from "@/views/components/icons/icon-shopping-cart.vue";

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

            <div
                v-if="orders.length"
                class="grid grid-cols-1 gap-y-4 sm:gap-x-6 sm:gap-y-10 lg:gap-x-8"
            >
                <OrderCard
                    v-for="(order, key) in orders"
                    :key="key"
                    :order="order"
                />
            </div>

            <article
                v-else
                class="flex h-full overflow-hidden rounded border border-gray-200 bg-white shadow-sm sm:flex-row"
            >
                <div class="flex w-full flex-col items-center space-y-2 p-4">
                    <IconShoppingCart class="h-12 w-12 text-gray-300" />

                    <h3 class="text-sm font-medium text-gray-900">No Order History</h3>

                    <p class="text-center text-sm text-gray-500">You haven't placed an order yet.</p>
                </div>
            </article>
        </div>
    </LayoutAuthenticated>
</template>
