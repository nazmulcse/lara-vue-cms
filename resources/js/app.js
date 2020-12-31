
require('moment');

import Vue from 'vue';
import VueMeta from 'vue-meta'

import { InertiaApp } from '@inertiajs/inertia-vue';
import { InertiaForm } from 'laravel-jetstream';
import PortalVue from 'portal-vue';
import BootstrapVue from 'bootstrap-vue/dist/bootstrap-vue.esm'
import { InertiaProgress } from '@inertiajs/progress'
import {
  ValidationObserver,
  ValidationProvider,
  extend,
  localize
} from "vee-validate";
import 'bootstrap-vue/dist/bootstrap-vue.css'
import en from "vee-validate/dist/locale/en.json";
import * as rules from "vee-validate/dist/rules";
// Install VeeValidate rules and localization
Object.keys(rules).forEach(rule => {
  extend(rule, rules[rule]);
});

localize("en", en);

// Install VeeValidate components globally
Vue.component("ValidationObserver", ValidationObserver);
Vue.component("ValidationProvider", ValidationProvider);


Vue.mixin({ methods: { route } });
Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);
Vue.use(VueMeta)
Vue.use(BootstrapVue)

InertiaProgress.init()

let app = document.getElementById('app')

new Vue({
  metaInfo: {
    titleTemplate: (title) => title ? `${title} - LaraVueCMS` : 'LaraVueCMS'
  },
  render: h => h(InertiaApp, {
    props: {
      initialPage: JSON.parse(app.dataset.page),
      resolveComponent: name => import(`@/Pages/${name}`).then(module => module.default),
    },
  }),
}).$mount(app)
