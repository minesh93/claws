
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
// import listen from './listen';
import { quillEditor } from 'vue-quill-editor'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('post-create-edit', require('./components/post-create-edit.vue'));
Vue.component('notification', require('./components/notification.vue'));
Vue.component('settings-general', require('./components/settings-general.vue'));


const app = new Vue({
    el: '#app',
    components: {
        quillEditor
    },
    data(){
    	return{
    		rendered:false,
            notification:{
                visible:false,
                text:'',
                type:'',
            },
    		meta:{},
    	}
    },
    mounted(){
        console.log("rendered");
        if(this.$el.dataset.meta !== undefined){
        	this.meta = JSON.parse(this.$el.dataset.meta);
        }
        this.rendered = true;

        this.$on('close-notification',()=>{
            this.closeNotification()
        });

        this.$on('make-notification',(payload)=>{
            this.makeNotification(payload.text,payload.type);
        });

    },
     events: {
        test: function (argument) {
            console.log("derp");
        },
    },
    methods:{
        incrementTotal(){
            console.log('inc derp');
        },
        makeNotification(text,type = 'is-primary'){
            this.notification.text = text;
            this.notification.type = type;
            this.notification.visible = true;
        },
        closeNotification(){
            this.notification.visible = false;
        }
    }
});
