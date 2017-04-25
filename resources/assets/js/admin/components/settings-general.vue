<template>
    <main>
        <div class="title">
            General Settings
        </div>
        <form>
            <div class="subtitle">
                Homepage
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-paddingless">
                    <label class="label">Use custom homepage</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                        <label class="checkbox">
                            <input type="checkbox" v-model="settings.use_custom_home">
                            (Check to use post)
                        </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal" v-show="settings.use_custom_home">
                <div class="field-label is-normal">
                    <label class="label">Select Post</label>
                </div>
                <div class="field-body">
                    <div class="field is-narrow">
                        <div class="control">
                            <div class="select is-fullwidth">
                            <select v-model="settings.custom_home_id">
                                <option v-for="post in posts" v-bind:value="post.id">
                                    {{ post.name }}
                                </option>
                            </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field">
                <p class="control">
                    <button class="button is-primary" v-on:click="saveSettings">Save</button>
                </p>
            </div>
        </form>
    </main>
</template>

<script>
    export default {
        props:['posts','mount-s'],
        data:function(){
            return {
                settings:{},
            }
        },
        mounted() {
            this.settings = this.$options.propsData.mountS;
        },
        methods:{
            saveSettings(e){
                e.preventDefault();
                axios.post('/admin/settings',this.settings).then((response)=>{

                }).catch((error)=>{

                });
            },

            addImage(){

            },
        }
    }
</script>
