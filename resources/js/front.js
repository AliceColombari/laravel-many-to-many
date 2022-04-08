window.Vue = require('vue');

import Vue from 'vue';
import App from './views/App';

const app = new App({
    el: '#root',
    render: h => h(App)
});