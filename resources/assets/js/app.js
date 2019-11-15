
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import moment from 'moment';

import store from './store';

import Buefy from 'buefy';
Vue.use(Buefy,{
    defaultIconPack: 'fa',
    defaultContainerElement: 'body',
    defaultDateFormatter: function(date){
        return moment(date).format("DD/MM/YYYY");
    },
    defaultDateParser: function(date){
        return moment(date).format();
    }
});

import VueProgressBar from 'vue-progressbar';
const options = {
    color: '#1b8aec',
    failedColor: '#ff3860',
    thickness: '3px'
}
Vue.use(VueProgressBar, options);


import VueCurrencyFilter from 'vue-currency-filter';
Vue.use(VueCurrencyFilter,
    {
        symbol : '₦',
        thousandsSeparator: ',',
        fractionCount: 2,
        fractionSeparator: '.',
        symbolPosition: 'front',
        symbolSpacing: false
    });

Vue.filter('formatDate', function(value,format='MMMM D, YYYY, h:mm a') {
    if (value) {
        return moment(String(value)).format(format)
    }
});

Vue.filter('formatTime', function(value) {
    if (value) {
        return moment(String(value)).format('hh:mm')
    }
});

Vue.mixin({
    methods: {
        route: route
    }
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*Vue.component('categories-home-list', require('./components/categories/CategoriesHomeList.vue'));
Vue.component('categories-list', require('./components/categories/CategoriesList.vue'));
Vue.component('artisans-list', require('./components/artisans/ArtisansList.vue'));
Vue.component('artisans-categories-button', require('./components/artisans/ArtisansCategoriesButton.vue'));
Vue.component('checkout-request', require('./components/checkout/CheckoutRequest.vue'));
Vue.component('request-button', require('./components/RequestButton.vue'));
Vue.component('testimonials-list', require('./components/testimonials/TestimonialsList.vue'));
Vue.component('how-it-works-section', require('./components/howitworks/HowItWorksSection.vue'));*/


const app = new Vue({
    el: '#app',
    store,
    beforeCreate(){
        this.$Progress.start();
    },
    mounted(){
        this.$Progress.finish();
        if(rootToastMsg) {
            this.$toast.open({
                duration: 5000,
                message: rootToastMsg,
                type: 'is-danger'
            })
        }
    },
    methods: {
        handleScroll (event) {
            // Any code to be executed
            // when the window is scrolled
        }
    },
});
