import "@/css/app.css";

import { createApp, DefineComponent, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { trail } from "momentum-trail";
import routes from "./routes/routes.json";

const appName = window.document.getElementsByTagName("title")[0]?.innerText || "Flux Bucket";

createInertiaApp({
    title: (title: string) => `${title} - ${appName}`,
    resolve: (name: string) =>
        resolvePageComponent(
            `../views/pages/${name}.vue`,
            import.meta.glob("../views/pages/**/*.vue")
        ) as Promise<DefineComponent>,
    setup({ el, App, props, plugin }) {
        // eslint-disable-next-line vue/component-api-style
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(trail, { routes })
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
