import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import Notifications from 'vue3-vt-notifications'
import NotificationComponent from './components/global/Notifications'

// Init InertiaJs progressbar
InertiaProgress.init()

createInertiaApp({
    resolve: name => require(`./components/pages/${name}`),
    setup({ el, app, props, plugin }) {
        createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(Notifications)
            .component('Notification', NotificationComponent)
            .mount(el)
    }
})
