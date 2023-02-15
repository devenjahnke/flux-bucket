<script setup lang="ts">
import { ref } from "vue";
import ApplicationLogo from "@/views/components/application-logo.vue";
import NavigationDropdown from "@/views/components/navigations/navigation-dropdown.vue";
import NavigationDropdownLink from "@/views/components/navigations/navigation-dropdown-link.vue";
import NavLink from "@/views/components/navigations/navigation-link.vue";
import ResponsiveNavLink from "@/views/components/navigations/navigation-link-responsive.vue";
import { Link, usePage } from "@inertiajs/vue3";
import { route } from "momentum-trail";
import CartPopover from "@/views/layouts/authenticated/partials/cart-popover.vue";

const showingNavigationDropdown = ref<boolean>(false);
const page = usePage();
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <nav class="border-b border-gray-100 bg-white">
                <!-- Primary Navigation Menu -->
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 justify-between">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex shrink-0 items-center">
                                <Link :href="route('dashboard')">
                                    <ApplicationLogo class="block h-9 w-auto fill-current text-gray-800" />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <NavLink
                                    :href="route('menu')"
                                    :active="route().current('menu')"
                                >
                                    Menu
                                </NavLink>

                                <NavLink
                                    :href="route('order.index')"
                                    :active="route().current('order.index')"
                                >
                                    Orders
                                </NavLink>
                            </div>
                        </div>

                        <div class="hidden sm:ml-6 sm:flex sm:items-center">
                            <!-- Settings Dropdown -->
                            <div class="relative ml-3">
                                <NavigationDropdown
                                    align="right"
                                    width="48"
                                >
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none"
                                            >
                                                {{ page.props.user.name }}

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <NavigationDropdownLink :href="route('profile.edit')">
                                            Profile
                                        </NavigationDropdownLink>

                                        <NavigationDropdownLink
                                            :href="route('logout')"
                                            method="post"
                                            as="button"
                                        >
                                            Log Out
                                        </NavigationDropdownLink>
                                    </template>
                                </NavigationDropdown>
                            </div>

                            <CartPopover class="ml-3" />
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center space-x-4 sm:hidden">
                            <CartPopover class="sm:hidden" />

                            <button
                                class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none"
                                @click="showingNavigationDropdown = !showingNavigationDropdown"
                            >
                                <svg
                                    class="h-6 w-6"
                                    stroke="currentColor"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex': !showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />

                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex': showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div
                    :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                    class="sm:hidden"
                >
                    <div class="space-y-1 pt-2 pb-3">
                        <ResponsiveNavLink
                            :href="route('menu')"
                            :active="route().current('menu')"
                        >
                            Menu
                        </ResponsiveNavLink>

                        <ResponsiveNavLink
                            :href="route('order.index')"
                            :active="route().current('order.index')"
                        >
                            Orders
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="border-t border-gray-200 pt-4 pb-1">
                        <div class="px-4">
                            <div class="text-base font-medium text-gray-800">
                                {{ page.props.user.name }}
                            </div>

                            <div class="text-sm font-medium text-gray-500">{{ page.props.user.email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>

                            <ResponsiveNavLink
                                :href="route('logout')"
                                method="post"
                                as="button"
                            >
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header
                v-if="$slots.header"
                class="bg-white shadow"
            >
                <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main class="mx-auto max-w-7xl px-4 pb-12 pt-6 sm:px-6 sm:pb-16 sm:pt-8 lg:px-8">
                <slot />
            </main>
        </div>
    </div>
</template>
