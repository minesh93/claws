<template>
	<div v-bind:class="[{'notification':true,'is-hidden':!n.visible},n.type]">
		<button class="delete" v-on:click="hide"></button>
		{{n.text}}
	</div>
</template>

<script>
    export default {
    	props:['n'],
    	data(){
    		return{

    		}
    	},
        mounted() {
            
        },
        methods:{
        	hide(){
        		this.$parent.$emit('close-notification');
        	}
        }
    }
</script>
