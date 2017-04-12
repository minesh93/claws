<template>
    <div>
        <div class="title">
            {{action.description}}
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <tr v-for="product in products">
                <td>{{product.name}}</td>
                <td>
                    <router-link :to="{ path: `products/${product.id}` }">Edit</router-link>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {

        data(){
            return {
                action:this.$store.state.currentAction,
            }
        },

        computed:{
            products(){
                return this.$store.getters.allProducts
            }
        },

        methods:{

        },

        mounted() {
            console.log(this.$store);
        },

        created() {
            this.$store.commit('GOTO',this.$route.meta.action);
            this.$store.dispatch('GET_PRODUCTS');
        }

    }
</script>
