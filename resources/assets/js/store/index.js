import Vue from 'vue';
import Vuex from 'vuex';
import checkout from './modules/checkout';
import location from './modules/location';
import categories from './modules/categories';
import orders from './modules/orders';
import misc from './modules/misc';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        checkout,location,categories,misc,orders
    }
})
