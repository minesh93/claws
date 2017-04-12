<template>
    <div>
        <div class="title">
            {{action.description}}
        </div>
        <div class="columns">
            <div class="column is-8">
                <div class="field">
                    <label class="label">Name</label>
                    <p class="control">
                        <input class="input" type="text" placeholder="Some Unique T-Shirt" v-model="product.name">
                    </p>
                </div>

                <div class="field">
                    <label class="label">Description</label>
                    <p class="control">
                        <quill-editor v-model="product.description" ref="product-description"></quill-editor>
                    </p>
                </div>

                <div class="field">
                    <label class="label">Price</label>
                    <p class="control">
                        <input class="input" type="text" placeholder="0.00" v-model="product.price">
                    </p>
                </div>

            </div>
            <div class="column is-4">
                    <p class="control">
                        <button v-on:click="saveProduct" class="button is-primary is-fullwidth">Save</button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    export default {

        data(){
            return {
                product:{
                    name:'',
                    description:'',
                    price:0.00
                }
            }
        },

        computed:{
            action(){
                return this.$store.state.currentAction
            }
        },
        methods:{
            saveProduct(){
                this.$store.commit('PUSH_PRODUCT',this.product)
            }
        },

        created() {
            this.$store.commit('GOTO',this.$route.meta.action);
            if(!this.$route.meta.new){
                this.$store.dispatch('GET_PRODUCTS',this.$route.params.id).then(() => {
                    this.product = this.$store.state.products.find((p) =>{ return p.id == this.$route.params.id});
                });
            }
        }
    }
</script>
