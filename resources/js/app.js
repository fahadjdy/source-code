import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import BaseLayout from './Layouts/User/BaseLayout.vue'
import AdminLayout from './Layouts/Admin/BaseLayout.vue'
import { ZiggyVue } from 'ziggy-js'


// Import Bootstrap
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap'


// Font Awesome
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faEnvelope, faLock ,faUser , faHome} from '@fortawesome/free-solid-svg-icons'

// Add icons to library
library.add(faEnvelope, faLock,faUser,faHome)

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    const page = pages[`./Pages/${name}.vue`]
    const noLayoutPages = ['Auth/Login', 'Auth/Register']

    if (name.startsWith('Admin/')) {
      page.default.layout = AdminLayout
    } else if (!noLayoutPages.includes(name)) {
      page.default.layout = page.default.layout || BaseLayout
    }

    return page
  },

  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) })

    app.use(plugin)
    app.use(ZiggyVue)
    app.component('font-awesome-icon', FontAwesomeIcon)

    app.mount(el)
  }
})
