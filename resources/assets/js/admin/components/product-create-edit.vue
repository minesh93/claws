<template>
    <main>
        <div class="title">
            Create Product
        </div>
        <form class="columns" v-on:submit="savePost">
            <div class="column is-10">
                <div class="field">
                    <label class="label">Name</label>
                    <p class="control">
                        <input class="input" type="text" placeholder="Some Unique T-Shirt" v-model="post.name">
                    </p>
                </div>

                <div class="field">
                    <label class="label">URL</label>
                    <p class="control">
                        <input class="input" type="text" placeholder="" v-model="post.slug">
                    </p>
                </div>

                <quill-editor v-model="post.content"></quill-editor>


            </div>
            <div class="column is-2">
                <div class="field is-grouped">
                    <p class="control">
                        <button class="button is-primary" type="submit">
                            Save
                        </button>
                    </p>
                </div>
            </div>
        </form>
    </main>
</template>

<script>
    export default {
        props:['post','type'],
        data(){
            return {

            }
        },
        mounted() {
        },
        methods:{
            savePost(e){
                e.preventDefault();
                let location = `/admin/content/${this.post.type}/add`;
                if(this.post.id != undefined){
                    location = `/admin/content/${this.post.type}/edit`;
                }
                axios.post(location,this.post).then((response)=>{

                }).catch((error)=>{

                });
            }
        }
    }
</script>
