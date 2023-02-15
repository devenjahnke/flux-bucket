<script setup lang="ts">
defineProps<{
    order: App.Data.OrderData;
}>();
</script>

<template>
    <article class="overflow-hidden rounded border border-gray-200 bg-white shadow-sm">
        <header class="border-b border-gray-200 p-4 sm:p-6">
            <dl class="grid grid-cols-2 gap-6 text-sm sm:grid-cols-4">
                <div>
                    <dt class="font-medium text-gray-900">Order number</dt>

                    <dd class="mt-1 text-gray-500">{{ order.reference_number }}</dd>
                </div>

                <div v-if="order.created_at">
                    <dt class="font-medium text-gray-900">Date placed</dt>

                    <dd class="mt-1 text-gray-500">
                        <p>{{ new Date(order.created_at).toLocaleString() }}</p>
                    </dd>
                </div>

                <div>
                    <dt class="font-medium text-gray-900">Total amount</dt>

                    <dd class="mt-1 font-medium text-gray-900">${{ order.product?.price.dollars }}</dd>
                </div>

                <div>
                    <dt class="font-medium text-gray-900">Status</dt>

                    <dd class="mt-1">
                        <span
                            class="inline-flex items-center rounded-full bg-indigo-100 px-3 py-0.5 text-sm font-medium uppercase text-indigo-800"
                        >
                            {{ order.status }}
                        </span>
                    </dd>
                </div>
            </dl>
        </header>

        <ul
            role="list"
            class="divide-y divide-gray-200"
        >
            <li class="p-4 sm:p-6">
                <div class="flex items-center sm:items-start">
                    <div class="h-20 w-20 flex-shrink-0 overflow-hidden rounded-lg bg-gray-200 sm:h-40 sm:w-40">
                        <img
                            :src="order.product?.image"
                            :alt="'Picture of the ' + order.product?.name"
                            class="h-full w-full object-cover object-center"
                        />
                    </div>

                    <div class="ml-6 flex-1 text-sm">
                        <div class="space-y-2">
                            <h3 class="text-sm font-medium text-gray-900">
                                {{ order.product?.name }}
                            </h3>

                            <p class="text-sm text-gray-500">{{ order.product?.description }}</p>

                            <p class="text-sm font-medium text-gray-900">${{ order.product?.price.dollars }}</p>
                        </div>
                    </div>
                </div>
            </li>

            <div class="">
                <div class="flex flex-col p-4">
                    <p class="text-sm font-medium text-gray-900">Notes</p>

                    <p class="text-base text-gray-500">{{ order.notes }}</p>
                </div>
            </div>
        </ul>
    </article>
</template>
