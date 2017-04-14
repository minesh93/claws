
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
// import listen from './listen';
import { quillEditor } from 'vue-quill-editor'

// Vue.component('alert', require('./components/alert.vue'));
// Vue.component('quill', require('./components/Quill.vue'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));
// Vue.component('task', require('./components/Task.vue'));
// Vue.component('app-header', require('./components/header.vue'));

Vue.component('post-create-edit', require('./components/post-create-edit.vue'));



const app = new Vue({
    el: '#app',
    components: {
        quillEditor
    },
    mounted(){
        console.log("woot");
    }
});
