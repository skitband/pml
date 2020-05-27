import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

require('./bootstrap');

window.Vue = require('vue');

Vue.component('navbar-component', require('./components/NavbarComponent.vue').default);
Vue.component('drawer-component', require('./components/DrawerComponent.vue').default);
Vue.component('order-component', require('./components/OrderComponent.vue').default);
Vue.component('table-component', require('./components/TableComponent.vue').default);


const app = new Vue({
    el: '#app'
});
