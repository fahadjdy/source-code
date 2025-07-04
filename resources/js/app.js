import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import BaseLayout from './Layouts/BaseLayout.vue'
import { ZiggyVue } from 'ziggy-js'

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    let page = pages[`./Pages/${name}.vue`]
    // If the page doesn't have a layout, set the default layout
    page.default.layout = page.default.layout || BaseLayout
    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue) 
      .mount(el)
  },
})
