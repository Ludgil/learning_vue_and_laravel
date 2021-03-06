/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('vue-multiselect/dist/vue-multiselect.min.css');
import VModal from 'vue-js-modal'
import Turbolinks from 'turbolinks';
import TurbolinksAdapter from 'vue-turbolinks';

Turbolinks.start();

window.Vue = require('vue');




/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))



Vue.use(VModal);  // plugin modal 



Vue.component('menu-container', require('./components/menu/MenuContainer.vue').default);
Vue.component('card-component', require('./components/Card.vue').default);
Vue.component('menu-add-form', require('./components/menu/MenuAddForm.vue').default);
Vue.component('resto-group', require('./components/restos/RestoGroup.vue').default);
Vue.component('resto-add-form', require('./components/restos/RestoAddForm.vue').default);
Vue.component('order-group', require('./components/orders/OrderGroup.vue').default);
Vue.component('order-form', require('./components/orders/OrderForm.vue').default);
Vue.component('order-menu-items', require('./components/orders/OrderMenuItems.vue').default);
Vue.component('manage-orders', require('./components/orders/ManageOrders.vue').default);
Vue.component('order-items', require('./components/OrderItems.vue').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


window.eventBus = new Vue({});

document.addEventListener('turbolinks:load', () => {
    var element = document.getElementById("app");
    if (element != null) {
        
        const app = new Vue({
            el: element,
        });
}});
 

