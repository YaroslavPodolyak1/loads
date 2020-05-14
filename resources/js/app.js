require('./bootstrap');

window.Vue = require('vue');

import LoadsComponent from './components/LoadsComponent'

Vue.component('loads-list', LoadsComponent)


const app = new Vue({
    el: '#app',
});
