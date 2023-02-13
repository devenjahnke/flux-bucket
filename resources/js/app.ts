import "./bootstrap";
import "../css/app.css";

import { createApp, DefineComponent, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import { Ziggy } from "./ziggy";

const appName = window.document.getElementsByTagName("title")[0]?.innerText || "Flux Bucket";

createInertiaApp({
    title: (title: string) => `${title} - ${appName}`,
    resolve: (name: string) =>
        resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob("./Pages/**/*.vue")) as Promise<DefineComponent>,
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
