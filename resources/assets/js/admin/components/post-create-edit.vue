<template>
    <main>
        <div class="title">
            {{type.createText}}
        </div>
        <form class="columns" v-on:submit="savePost">
            <div class="column is-10">

                <div class="field">
                    <label class="label">Name</label>
                    <p class="control">
                        <input class="input" type="text" placeholder="Some Unique T-Shirt" v-model="post.name" v-on:change="generateSlug">
                    </p>
                </div>

                <div class="field">
                    <label class="label">URL</label>
                    <p class="control">
                        <input class="input is-small" type="text" placeholder="" v-model="post.slug">
                    </p>
                </div>

                <quill-editor v-model="post.content"></quill-editor>

                <div class="meta-section" v-if="renderMeta">
                    <slot></slot>
                </div>

            </div>
            <div class="column is-2">
                <div class="columns is-multiline">
                    <div class="column is-12">
                        <div class="box">
                            <button class="button is-primary is-fullwidth" v-on:click="addImage">Add Image</button>
                        </div>
                    </div>
                    <div class="column is-12">
                        <div class="box">
                            <button class="button is-primary is-fullwidth" v-on:click="savePost">Save</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </main>
</template>

<script>
    export default {
        props:['mount-p','mount-t','mount-m'],
        data:function(){
            return {
                renderMeta:false,
                post:{},
                type:{},
            }
        },
        mounted() {
            console.log("MOUNTED");
            this.post = this.$options.propsData.mountP;
            this.type = this.$options.propsData.mountT;
            this.post.meta = this.$options.propsData.mountM;
            this.renderMeta = true;

        },
        methods:{
            savePost(e){
                e.preventDefault();
                let location = `/admin/content/${this.post.type}/add`;
                if(this.post.id != undefined){
                    location = `/admin/content/${this.post.type}/${this.post.id}`;
                }
                axios.post(location,this.post).then((response)=>{

                }).catch((error)=>{

                });
            },

            addImage(){

            },

            generateSlug(e){
                if(this.post.slug != ''){
                    return;
                }
                axios.post('/admin/slug',this.post).then((response)=>{
                    this.post.slug = response.data;
                    console.log("done");
                    console.log(response.data);
                }).catch((error)=>{

                });
            },
        }
    }
</script>
