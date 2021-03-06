/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./jquery.pjax.min')
require('./layer')
require('./pjax')

window.onload = function () {
  window.Vue = require('vue').default;

// 此处需在引入 Vue 之后引入
  require('./components/SelectDistrict');
  require('./components/UserAddressesCreateAndEdit');
  const app = new Vue({
    el: '#app',
  });
}

