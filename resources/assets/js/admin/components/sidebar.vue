<template>
    <div class="sidebar">
        <h2>Claws Admin</h2>
        <aside class="menu">
            <p class="category-split">
                <i class="fa fa-tachometer" aria-hidden="true"></i> General
            </p>
            <ul class="menu-list">
                <li><a>Dashboard</a></li>
            </ul>
            <p class="category-split">
                <i class="fa fa-file-text" aria-hidden="true"></i> Content
            </p>
            <ul class="content-menu" v-show="content.fetched">
                <li v-for="type in content.types">
                    <button class="category-split" v-on:click="activeMenu = type.name"><i v-bind:class="['fa',type.icon]" aria-hidden="true"></i> {{type.listName}}</button>
                    <ul class="content-actions" v-show="activeMenu == type.name">
                        <li><router-link to="foo">{{type.createText}}</router-link>
                        <li><router-link to="foo">{{type.listTitle}}</router-link>
                    </ul>
                </li>
            </ul>
            <div class="loading" v-show="!content.fetched">
                Loading Content
            </div>
            <p class="category-split">
                Site
            </p>
            <ul class="menu-list">
                <li><a href="/admin/theme/">Theme</a></li>
            </ul>

            <p class="category-split">
                <i class="fa fa-cogs" aria-hidden="true"></i> Settings
            </p>
            <ul class="menu-list">
                <li><a href="/admin/settings/">General</a></li>
            </ul>

        </aside>
    </div>
</template>

<script>
    export default {
        data:function(){
            return {
                renderMeta:false,
                post:{},
                type:{},
                activeMenu:'',
                content:{
                    fetched:false,
                    types:[],
                }
            }
        },
        mounted() {
            console.log("Loaded - Fetching Content Types");
            this.fetchContentTypes();
        },
        methods:{
            fetchContentTypes (){
                axios.get('/admin/content-types').then((response)=>{
                    this.content.types = response.data;
                    this.content.fetched = true;
                });
            },
            savePost(e){
                e.preventDefault();
                let location = `/admin/content/${this.post.type}/add`;
                let newPost = true;
                if(this.post.id != undefined){
                    newPost = false;
                    location = `/admin/content/${this.post.type}/${this.post.id}`;
                }
                axios.post(location,this.post).then((response)=>{
                    this.$parent.$emit('make-notification',{text:'Post Saved!',type:'is-success'});
                    this.post = response.data;
                    if(newPost){
                       window.location = `/admin/content/${this.post.type}/${this.post.id}`; 
                    }
                }).catch((error)=>{
                    this.$parent.$emit('make-notification',{text:'Something Just Broke...',type:'is-danger'});
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
