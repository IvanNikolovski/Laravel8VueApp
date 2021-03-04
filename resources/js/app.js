require('./bootstrap');

require('alpinejs');

import Vue from 'vue'
import doctors from './vue/doctors.vue'
import editDoctor from './vue/editDoctor.vue'
import showDoctor from './vue/showDoctor.vue'

// // const _ = import('lodash');
// // window.trans = (string) => _.get(window.i18n, string);
import _ from 'lodash';
Vue.prototype.trans = string => _.get(window.i18n, string);
// window.Vue.prototype.trans = string => _.get(window.i18n, string);
// // window.trans = (string) => _.get(window.i18n, string);

const app = new Vue ({
    el: '#app',
    components: { doctors, editDoctor, showDoctor }
});
