
require('moment');

import Vue from 'vue';
import VueMeta from 'vue-meta'

import { InertiaApp } from '@inertiajs/inertia-vue';
import { InertiaForm } from 'laravel-jetstream';
import { InertiaProgress } from '@inertiajs/progress/src'
import PortalVue from 'portal-vue';
import BootstrapVue from 'bootstrap-vue/dist/bootstrap-vue.esm'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.mixin({ methods: { route } });
Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);
Vue.use(VueMeta)
Vue.use(BootstrapVue)

InertiaProgress.init()

const app = document.getElementById('app');

new Vue({
    metaInfo: {
        titleTemplate: (title) => title ? `${title} - LaraVue CMS` : 'LaraVue CMS'
      },
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);
