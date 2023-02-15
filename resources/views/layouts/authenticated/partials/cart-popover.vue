<script setup lang="ts">
import IconShoppingCart from "@/views/components/icons/icon-shopping-cart.vue";
import { router, useForm, usePage } from "@inertiajs/vue3";
import ButtonPrimary from "@/views/components/buttons/button-primary.vue";
import { Popover, PopoverButton, PopoverPanel } from "@headlessui/vue";
import { route } from "momentum-trail";
import InputText from "@/views/components/inputs/input-text.vue";
import InputLabel from "@/views/components/inputs/input-label.vue";

const cartContents = usePage().props.cart as App.Data.ProductData;

const form = useForm({
    product_id: cartContents?.id,
    notes: "",
});
const placeOrder = () => {
    form.post(route("order.store"), {
        onSuccess: () => {
            clearCart();
        },
    });
};
const clearCart = () => {
    router.delete(route("cart.delete"), {
        preserveState: false,
    });
};
</script>

<template>
    <Popover class="ml-4 flow-root text-sm lg:relative lg:ml-8">
        <PopoverButton class="focus:outline-none">
            <ButtonPrimary class="flex items-center space-x-2">
                <IconShoppingCart class="-ml-1 h-6 w-6 text-gray-50" />

                <p class="text-sm font-medium text-white">{{ cartContents ? 1 : 0 }}</p>
            </ButtonPrimary>
        </PopoverButton>

        <transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="opacity-0"
            enter-to-class="opacity-100"
            leave-active-class="transition ease-in duration-150"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <PopoverPanel
                class="absolute inset-x-0 top-16 mt-px bg-white pb-6 shadow-lg sm:px-2 lg:top-full lg:left-auto lg:right-0 lg:mt-3 lg:-mr-1.5 lg:w-80 lg:rounded-lg lg:ring-1 lg:ring-black lg:ring-opacity-5"
            >
                <h2 class="sr-only">Shopping Cart</h2>

                <div
                    v-if="cartContents"
                    class="mx-auto max-w-2xl px-4"
                >
                    <ul
                        role="list"
                        class="divide-y divide-gray-200"
                    >
                        <li class="flex items-center py-6">
                            <img
                                :src="cartContents.image"
                                :alt="'Image of the ' + cartContents.name"
                                class="h-16 w-16 flex-none rounded-md border border-gray-200 object-cover"
                            />

                            <div class="ml-4 flex-auto">
                                <h3 class="font-medium text-gray-900">
                                    {{ cartContents.name }}
                                </h3>

                                <p class="text-gray-500">${{ cartContents.price.dollars }}</p>
                            </div>
                        </li>
                    </ul>

                    <div class="space-y-1">
                        <InputLabel
                            value="Notes"
                            for="notes"
                        />

                        <InputText
                            id="notes"
                            v-model="form.notes"
                            type="text"
                            class="mt-1 block w-full"
                            placeholder="Order notes"
                        />
                    </div>

                    <button
                        type="button"
                        class="mt-6 w-full rounded-md border border-transparent bg-gray-800 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-700 focus:ring-offset-2 focus:ring-offset-gray-50"
                        @click="placeOrder"
                    >
                        Place Order
                    </button>

                    <p class="mt-6 text-center">
                        <a
                            href="#"
                            class="text-sm font-medium text-gray-600 hover:text-gray-500"
                            @click.prevent="clearCart"
                        >
                            Clear the Cart
                        </a>
                    </p>
                </div>

                <div
                    v-else
                    class="mx-auto max-w-2xl p-4"
                >
                    <div class="flex w-full flex-col items-center space-y-2">
                        <IconShoppingCart class="h-12 w-12 text-gray-300" />

                        <h3 class="text-sm font-medium text-gray-900">Your Cart Is Empty</h3>

                        <p class="text-center text-sm text-gray-500">Add a product to the cart to order it.</p>
                    </div>
                </div>
            </PopoverPanel>
        </transition>
    </Popover>
</template>
