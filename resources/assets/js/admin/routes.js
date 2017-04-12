import VueRouter from 'vue-router';

let routes = [

    {
        path:'/',
        component: require('./views/home')
    },
    {
        path:'/products',
        component: require('./views/product-list'),
        meta:{
            new:true,
            action:{
                group:'products',
                description:'Viewing Products'
            }
        }
    },
    {
        path:'/products/add',
        component: require('./views/product-create-edit'),
        meta:{
            new:true,
            action:{
                group:'products',
                description:'Create Product'
            }
        }
    },
    {
        path:'/products/:id',
        component: require('./views/product-create-edit'),
        meta:{
            new:false,
            action:{
                group:'products',
                description:'Edit Product'
            }
        }
    },
];


export default new VueRouter({
    routes
});